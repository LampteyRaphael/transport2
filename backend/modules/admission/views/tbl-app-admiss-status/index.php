<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admission\models\TblAppAdmissStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admission Status';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-app-admiss-status-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'beforeHeader'=>[
            [
                'columns'=>[
                    ['content'=>'Status', 'options'=>['colspan'=>5, 'class'=>'text-center warning']], 
                ],
                
            ]
        ],

        'toolbar' =>  [
            ['content'=>
                Html::a('Create', ['create'], ['class' => 'btn btn-success']),
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
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Admission</h3>',
        'type' => GridView::TYPE_PRIMARY,

    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'name',
            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view} {delete} ',
            'width'=>100,
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( '<span class="btn btn-success" aria-hidden="true"><i class="fa fa-edit"></i></span> ', ['view', 'id' => $model->id] );
                },

                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="btn btn-danger" aria-hidden="true"><i class="fa fa-remove"></i></span>',$url,['data-confirm' => 'Are you sure you want to deny this request?', 'data-method' =>'POST']);
                },
                
            ],
        ], 

            // ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
