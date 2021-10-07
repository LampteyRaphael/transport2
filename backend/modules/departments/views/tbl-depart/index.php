<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\departments\models\TblDepartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-depart-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary'=>true,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        'beforeHeader'=>[
            [
                'columns'=>[
                    ['content'=>'Departments', 'options'=>['colspan'=>5, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                ],
                 'options'=>['class'=>'skip-export'] // remove this row from export
            ]
        ],

        'toolbar' =>  [
        [
            'content'=> Html::a('Create',['create'],['class'=>'btn btn-success']),
         ],
            '{export}',
            '{toggleData}'
        ],

    'pjax'=>true,
    'bordered' => true,
    'striped' => true,
    'condensed' => false,
    'responsive' => true,
    'bootstrap'=>true,
    'hover' => true,
    'floatHeader' => false,
    'showPageSummary' => true,
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>Departments</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'department_name',
            'department_code',
            'department_phone_number',
            'department_office',

            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view} {delete} ',
            'width'=>100,
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( '<span class="btn btn-success" aria-hidden="true"><i class="fa fa-edit"></i></span> ', ['/departments/tbl-depart/update', 'id' => $model->id] );
                },

                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="btn btn-danger" aria-hidden="true"><i class="fa fa-trash"></i></span>',$url,['data-confirm' => 'Are you sure you want to deny this request?', 'data-method' =>'POST']);
                },
                
            ],
        ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
