<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;


$this->title = 'Vehicle Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-group-index">

        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'headerRowOptions'=>['class'=>'kartik-sheet-style'],
            'filterRowOptions'=>['class'=>'kartik-sheet-style'],
            'containerOptions' => ['style'=>'overflow: auto'],
    
            'toolbar' =>  [
                 ['content'=>    
                      Html::a('Add Vehicle Group', ['create'], ['class' => 'btn btn-success']),
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
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Groups</h3>',
            'type' => GridView::TYPE_PRIMARY,
        ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',

                ['class' => 'kartik\grid\ActionColumn',
                'template' => '{view}',
                'width'=>'10%',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a ( '<span><i class="fa fa-car"></i> <b>View</b></span>', ['update', 'id' => $model->id],['class'=>'btn btn-primary'] );
                    },
                ],
            ],
            ],
        ]); ?>
    
        <?php Pjax::end(); ?>
  
</div>
