<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;


$this->title = 'Remainders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reminder-index">

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        'toolbar' =>  [
             ['content'=>    
                  Html::a('Add Remainder', ['create'], ['class' => 'btn btn-success']),
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
    'panel' => [
        'heading'=>'<h3 class="panel-title "><i class="glyphicon glyphicon-globe"></i>Users</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
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
                'label'=>'Vehicle',
            ],
            'date',
            'message:ntext',

            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'width'=>'10%',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                       return Html::a('<span><i class="fa fa-car"></i> <b>View</b></span>', ['view','id' => $model->id], ['class' => 'btn btn-primary']);
                },
            ],
        ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
