<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OperationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operations-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'showPageSummary'=>true,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        // 'beforeHeader'=>[
        //     [
        //          'options'=>['class'=>'skip-export'] 
        //     ]
        // ],

        'toolbar' =>  [
             ['content'=>    
                  Html::a('Add Booking', ['create'], ['class' => 'btn btn-success']),
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
    // 'showPageSummary' => true,
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>Bookings</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            // [  
            //     'class' =>'kartik\grid\ExpandRowColumn',  
            //     'value'=>function ($model, $key, $index,$column) {  
            //               return GridView::ROW_COLLAPSED;  
            //      }, 
            //      'detailUrl'=> Url::to(['view']), 
            //   ],
            'created_at:datetime',
            [
                'attribute'=>'vehicle_id',
                'value'=>'vehicle.make',
            ],
            [
                'attribute'=>'driver_id',
                'value'=>'driver.username',
            ],

            [
                'attribute'=>'trip_type',
                'value'=>'tripType.name',
                'label'=>'Trip Type'
            ],
           
            'trip_start_location',
            'start_date',
            'end_date',
            //'departureMileage',
            //'officerAssigned',
            //'assignmentCompletionTime',
            //'arrivalMileage',
            //'created_at',
            //'updated_at',

            [
                'attribute'=>'officerAssigned',
                'value'=>'officerAssigned0.username',
            ],


            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'width'=>'10%',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    
                    // if( strtolower($model->trip->name) == "yet to start"){

                         return Html::a($model->trip->name,['view','id'=>$model->id],['class'=>'btn btn-primary']);

                    // }else{
                    //     return Html::a ( '<span class="btn btn-primary disabled" aria-hidden="true"><i class="fa fa-car"> <b>Stoped</b></i></span>');

                    // }

                },
            ],
        ],  
         

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
