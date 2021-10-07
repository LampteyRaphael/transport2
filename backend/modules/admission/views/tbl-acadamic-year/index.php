<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admission\models\TblAcadamicYearSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title='Academic Year';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-acadamic-year-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary'=>true,
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        'beforeHeader'=>[
            [
                'columns'=>[
                    ['content'=>'Academic Year', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>4, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
                ],
                 'options'=>['class'=>'skip-export'] // remove this row from export
            ]
        ],

        'toolbar' =>  [
            // ['content'=>
            //     Html::a('Import Excel', ['Create'], ['class' => 'btn btn-success']),
            // ],
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
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>Academic Year</h3>',
        'type' => GridView::TYPE_PRIMARY,
        // 'footer'=>true

    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'date_of_admission',
            'doa',
            'doc',
            [
                'attribute'=>'status',
                'value'=>'status0.name'
            ],
            

            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view} {delete} ',
            'width'=>100,
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( '<span class="btn btn-success" aria-hidden="true"><i class="fa fa-edit"></i></span> ', ['/admission/tbl-acadamic-year/update', 'id' => $model->id] );
                },

                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="btn btn-danger" aria-hidden="true"><i class="fa fa-trash"></i></span>',$url,['data-confirm' => 'Are you sure you want to deny this request?', 'data-method' =>'POST']);
                },
                
            ],
        ],
        ],
    ]); ?>


</div>
