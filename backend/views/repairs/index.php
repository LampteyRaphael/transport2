<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RepairsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Repairs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repairs-index">
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary'=>true,
        //  'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],

        'toolbar' =>  [
             ['content'=>    
                  Html::a('Add Repair', ['create'], ['class' => 'btn btn-success']),
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
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Repairs</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            // [  
            //     'class' =>'kartik\grid\ExpandRowColumn',  
            //     'value'=>function ($model, $key, $index,$column) {  
            //               return GridView::ROW_COLLAPSED;  
            //      }, 
            //      'detailUrl'=> Url::to('view'), 
            //   ],
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
            ],
            [
                'attribute'=>'driver_id',
                'value'=>'driver.name',
            ],
    
            'description',
            [
                'label'=>'Amount(GHS)',
                'attribute'=>'amount',
                'value'=>function($model){

                    if(!empty($model->amount)){
                        return $model->amount;
                    }
                },
              'pageSummary'=>true,
            ],
            'garageName',
            'datePresented',

            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view} {update}',
            'width'=>'20%',
            'buttons' => [
                'view'=>function($url, $model,$key){
                    return Html::a ('<span><i class="fa fa-car"></i> <b>View</b></span>',['view','id'=>$model->id],['class'=>'btn btn-primary']);
                },
                'update' => function ($url, $model, $key) {
                    if($model->dateReturned==null){
                      return   Html::a('<span class="btn btn-danger" aria-hidden="true"><i class="fa fa-car"> <b>End Repair</b></i></span>', ['repairs', 'id' => $model->id], [
                            'data' => [
                                'confirm' => 'Are you sure you want to end '.$model->vehicle->make . ' Repairs ? ',
                                'method' => 'post',
                            ],
                        ]);
                    }else{
                        return Html::a ( ' End Repairs',[''],['class'=>'btn btn-primary disabled'] );
                    }
                },
             
            ],
        ],  
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
