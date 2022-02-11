<?php

use kartik\grid\GridView;
use kartik\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Insurance';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insurance-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary'=>true,
        //  'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        'beforeHeader'=>[
            [
                'columns'=>[
                    ['content'=>'Insurance', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
                ],
                 'options'=>['class'=>'skip-export'] 
            ]
        ],

        'toolbar' =>  [
             ['content'=>    
                  Html::a('Add Insurance', ['create'], ['class' => 'btn btn-success']),
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
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Insurance Vehicles</h3>',
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
                    return  Html::img('images/'.$model->vehicle->file,['height'=>'50px','width'=>'50px'])??'';
                },
            ],
            [
                'attribute'=>'vehicle_id',
                'value'=>'vehicle.make',
                'label'=>'Vehicle'
            ],
            'renewalDate:date',
            'expiringDate:date',
            [
                'attribute'=>'amount',
                'label'=>'Amount(GHS)',
                'value'=>'amount',
                'pageSummary'=>true,
            ],
            [
                'label'=>'Insurance Status',
                'attribute'=>'expiringDate',
                'value'=>function($model){
                    if($model->expiringDate < date('Y-m-d')): return "Expired"; endif;
                    
                    if($model->expiringDate >= date('Y-m-d')): return "Active"; endif;
                }
            ],
            
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
