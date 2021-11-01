<?php

use common\models\User;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-payment-view">

<?php
  $attributes = [
    [
        'group'=>true,
        'label'=>'SECTION :Courses',
        'rowOptions'=>['class'=>'table-info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'amount', 
                'label'=>'Amount',
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            [
                'attribute'=>'receipt_no', 
                'label'=>'Receipt o',
                'format'=>'raw', 
                'displayOnly'=>true,
                'type'=>DetailView::INPUT_TEXT, 
                'valueColOptions'=>['style'=>'width:30%'], 
            ],
        ],
    ],

    [
        'columns' => [
            [
                'attribute'=>'balance', 
                'label'=>'Balance',
                'value'=>$model->balance,
                'format'=>'raw',
                'displayOnly'=>true,
                'type'=>DetailView::INPUT_TEXT, 
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            [
                'attribute'=>'user_id', 
                'label'=>'System Admin',
                'format'=>'raw', 
                'value'=>$model->user->username??'',
                'displayOnly'=>true,
                'type'=>DetailView::INPUT_TEXT, 
                'widgetOptions'=>[
                    'data'=>ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                    'options' => ['placeholder' => 'Select ...'],
                    'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                ],
                'valueColOptions'=>['style'=>'width:30%'], 
            ],
        ],
    ],

    [
        'columns' => [
            [
                'attribute'=>'admission_id', 
                'label'=>'Admission',
                'value'=>$model->admission->application->personalDetails->title0->name .' '. $model->admission->application->personalDetails->first_name .' '. $model->admission->application->personalDetails->middle_name .' ' . $model->admission->application->personalDetails->last_name,
                'format'=>'raw',
                'displayOnly'=>true,
                'type'=>DetailView::INPUT_TEXT, 
                'valueColOptions'=>['style'=>'width:30%'],
            ],

            // [
            //     'attribute'=>'program_id', 
            //     'label'=>'Programs',
            //     'displayOnly'=>true,
            //     'value'=>$model->program->program_name,
            //     'format'=>'raw',
            //     'type'=>DetailView::INPUT_TEXT, 
            //     'valueColOptions'=>['style'=>'width:30%'],
            // ]
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'dates', 
                'label'=>'Date',
                'format'=>'raw', 
                'displayOnly'=>true,
                'type'=>DetailView::INPUT_DATE, 
                'valueColOptions'=>['style'=>'width:30%'], 
            ],
        ],
    ],

    



    
    
];
?>

<?=
     DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
        'mode' => 'view',
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        
        'vAlign'=>true,
        'fadeDelay'=>true,
        'panel' => [
            'heading'=>$model->admission->application->personalDetails->title0->name .' '. $model->admission->application->personalDetails->first_name .' '. $model->admission->application->personalDetails->middle_name,
             'type'=>DetailView::TYPE_PRIMARY,
            'footer' => '<div class="text-center text-muted"></div>'
        ],
        'deleteOptions'=>[ // your ajax delete parameters
            'params' => ['id' => 1000, 'kvdelete'=>true],
            'url'=>['delete','id'=>$model->id,'kvdelete'=>true]
        ],
        'container' => ['id'=>'kv-demo'],
        'formOptions' => ['action' => Url::current(['view','id' => $model->id,'view'=>true])]  // your action to delete
    ]);
    ?>

</div>
