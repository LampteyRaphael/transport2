<?php

use kartik\grid\GridView;
use kartik\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'],
        'toolbar' =>  [
             ['content'=>    
                  Html::a('Add Users', ['create'], ['class' => 'btn btn-success']),
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
                'attribute'=>'photo', 
                'label'=>'Photo',
                'format'=>'raw', 
                'value'=>function($model){
                    return  Html::img('images/'.$model->photo,['height'=>'50px','width'=>'50px'])??'';
                },
            ],
            'username',
            'email:email',
            'tel',
            'activeStatus.name',
            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'width'=>'10%',
            'buttons' => [
                'view'=>function($url, $model,$key){
                    return Html::a ('<span><i class="fa fa-user"></i> <b>View</b></span>',['update','id'=>$model->id],['class'=>'btn btn-primary']);
                }
            ],
        ], 
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>
