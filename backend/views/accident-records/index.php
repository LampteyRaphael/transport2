<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccidentRecordsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accident Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accident-records-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary'=>true,
         'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        'toolbar' =>  [
             ['content'=>    
                  Html::a('Add Car Accident', ['create'], ['class' => 'btn btn-success']),
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
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Accident Vehicles</h3>',
        'type' => GridView::TYPE_PRIMARY,
        // 'footer'=>true

    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'file', 
                'label'=>'Photo',
                'format'=>'raw', 
                'value'=>function($model){
                    return  Html::img('images/'.$model->vehicle->file??'',['height'=>'50px','width'=>'50px'])??'';
                },
            ],
            [
                'attribute'=>'vehicle_id',
                'value'=>'vehicle.make',
                'label'=>'Vehicle'
            ],
            'dateOfIncident',
            [
                'attribute'=>'driver_id',
                'value'=>'driver.name',
                'label'=>'Driver'
            ],
            'remedy',
            'created_at:date',
            ['class' => 'kartik\grid\ActionColumn',
            'width'=>'10%',
            'template' => '{view}',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                       return Html::a('<span><i class="fa fa-car"></i> <b>View</b></span>', ['view','id' => $model->id], ['class' => 'btn btn-success']);
                },
            ],
        ],
        ],
    ]); ?>


</div>
