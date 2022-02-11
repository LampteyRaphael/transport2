<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ServicingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicings-index">

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
                    ['content'=>'UPSA Vehicles Servicing', 'options'=>['colspan'=>5, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
                    ['content'=>'', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
                ],
                 'options'=>['class'=>'skip-export'] // remove this row from export
            ]
        ],

        'toolbar' =>  [
             ['content'=>    
                  Html::a('Add Servicing', ['create'], ['class' => 'btn btn-success']),
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
        'heading'=>'<h3 class="panel-title "><i class="glyphicon glyphicon-globe"></i> Vehicles Servicing</h3>',
        'type' => GridView::TYPE_PRIMARY,
        // 'footer'=>true

    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            
            // [  
            //     'class' =>'kartik\grid\ExpandRowColumn',  
            //     'value'=>function ($model, $key, $index,$column) {  
            //               return GridView::ROW_COLLAPSED;  
            //      }, 
            //      'detailUrl'=> Yii::$app->request->getBaseUrl().'/operations/view', 
            // ],
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
            
            'garageName',
            'description',
            [
                'attribute'=>'amount',
                'label'=>'Amount(GHS)',
                'value'=>'amount',
                'pageSummary'=>true,
            ],
            [
                'attribute'=>'driver_id',
                'value'=>'driver.name',
            ],
            [
                'attribute'=>'user_id',
                'value'=>'user.username',
            ],
            'datePresented',
          
            'dateReturned',
            //'updated_at',

            
            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'width'=>'15%',
            'buttons' => [
                'view'=>function($url, $model,$key){
                    return Html::a ('<span><i class="fa fa-car"></i> <b>View</b></span>',['view','id'=>$model->id],['class'=>'btn btn-primary']);
                },
                // 'update' => function ($url, $model, $key) {
                //     if($model->dateReturned==null){
                //       return   Html::a('<span class="btn btn-danger" aria-hidden="true"><i class="fa fa-car"> <b>End Servicing</b></i></span>', ['serviced', 'id' => $model->id], [
                //             'data' => [
                //                 'confirm' => 'Are you sure you want to end '.$model->vehicle->make . ' Servicing ? ',
                //                 'method' => 'post',
                //             ],
                //         ]);
                //     }else{
                //         return Html::a ( ' End Services',['#'],['class'=>'btn btn-primary disabled'] );
                //     }
                // },
            ],
        ],  
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
