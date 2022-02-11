<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ScrabSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scrabs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scrab-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
          //  'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
          'headerRowOptions'=>['class'=>'kartik-sheet-style'],
          'filterRowOptions'=>['class'=>'kartik-sheet-style'],
          'containerOptions' => ['style'=>'overflow: auto'],
  
          'toolbar' =>  [
               ['content'=>    
                    Html::a('Add Scrab', ['create'], ['class' => 'btn btn-success']),
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
          'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Scrab</h3>',
          'type' => GridView::TYPE_PRIMARY,
      ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                'attribute'=>'vehicle_id',
                'value'=>'vehicle.make',
            ],
            [
                'attribute'=>'user_id',
                'value'=>'user.username',
            ],
            'amount',
            'balance',
            'company',

            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'width'=>'10%',
            'buttons' => [
                'view'=>function($url, $model,$key){
                    return Html::a ('<span><i class="fa fa-car"></i> <b>View</b></span>',['view','id'=>$model->id],['class'=>'btn btn-primary']);
                },
              ]
            ]
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
