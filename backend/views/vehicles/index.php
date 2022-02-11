<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiclesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicles-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'showPageSummary'=>true,
        //  'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        // 'beforeHeader'=>[
        //     [
        //         // 'columns'=>[
        //         //     ['content'=>'UPSA Vehicles', 'options'=>['colspan'=>4, 'class'=>'text-center warning']], 
        //         //     ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
        //         //     ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
        //         //     ['content'=>'', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
        //         // ],
        //          'options'=>['class'=>'skip-export'] // remove this row from export
        //     ]
        // ],

        'toolbar' =>  [
             ['content'=>    
                  Html::a('Add Vehicle', ['create'], ['class' => 'btn btn-success']),
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
        'heading'=>'<h3 class=""><i class="glyphicon glyphicon-globe"></i>Vehicle\'s Management</h3>',
        'type' => GridView::TYPE_PRIMARY,

    ],
       
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            // [  
            //     'class' =>'kartik\grid\ExpandRowColumn',  
            //     'value'=>function ($model, $key, $index,$column) {  
            //               return GridView::ROW_COLLAPSED;  
            //      }, 
            //      'detailUrl'=> Yii::$app->request->getBaseUrl().'/vehicles/view', 
            //   ], 
            [
                'attribute'=>'file', 
                'label'=>'Photo',
                'format'=>'raw', 
                'value'=>function($model){
                    return  Html::img('images/'.$model->file,['height'=>'50px','width'=>'50px'])??'';
                },
            ],
            
            [
                'attribute'=>'make',
                'value'=>'make',
                'label'=>'Vehicle'
            ],
            'regNo',
            'chasisNo',
            'yearMade',
            'purchaseDate',
            [
                'attribute'=>'status',
                'value'=>'status0.name',
                'label'=>'Status',
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['style' =>'font-weight:bold; color:'.($model->status0->name === 'new' ? 'green' : 'green')];
                },
            ],
            [
                'attribute'=>'colour',
                'value'=>function ($model, $key, $index, $widget) {
                    return "<span class='badge p-4' style='background-color: {$model->colour}'> </span>  <code>" . 
                        $model->colour . '</code>';
                },
                'filterType'=>GridView::FILTER_COLOR,
                'vAlign'=>'middle',
                'format'=>'raw',
                'width'=>'150px',
                'noWrap'=>true
            ],
            //'countryOfOrigin',
            //'cubicCentimeter',
            //'fuel',
            //'created_at',
            //'updated_at',

            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'width'=>'10%',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( '<span class="btn btn-primary" aria-hidden="true"><i class="fa fa-car"> <b>View</b></i></span> ', ['view', 'id' => $model->id] );
                },
            ],
        ],   
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
