<?php

use common\models\TblProgramType;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = 'Program';
$this->params['breadcrumbs'][] = ['label' => 'Programs', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-program-view">
<?php
  $attributes = [
    [
        'group'=>true,
        'label'=>'SECTION:Programs',
        'rowOptions'=>['class'=>'table-info']
    ],
  
    [
        'columns' => [
            [
                'attribute'=>'program_name', 
                'label'=>'Program Name',
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            [
                'attribute'=>'program_code', 
                'label'=>'Program Code',
                'format'=>'raw', 
                'valueColOptions'=>['style'=>'width:30%'], 
            ],
        ],
    ],

    [
        'columns' => [
            [
                'attribute'=>'amount', 
                'label'=>'Amount',
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            [
                'attribute'=>'program_category_id', 
                'label'=>'Program',
                'value'=>$model->programCategory->name,
                'format'=>'raw', 
                'type'=>DetailView::INPUT_SELECT2, 
                'widgetOptions'=>[
                    'data'=>ArrayHelper::map(TblProgramType::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
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
                'attribute'=>'created_at', 
                'label'=>'Created',
                'format'=>'raw',
                'displayOnly'=>true,
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
            'heading'=>$model->program_name,
             'type'=>DetailView::TYPE_PRIMARY,
            'footer' => '<div class="text-center text-muted">Levels</div>'
        ],
        'deleteOptions'=>[
            'params' => ['id' => $model->id, 'kvdelete'=>true],
            'url'=>['delete','id'=>$model->id,'kvdelete'=>true]
        ],
        'container' => ['id'=>'kv-demo'],
        'formOptions' => ['action' => Url::current(['update','id' => $model->id,'updating'=>true])]  // your action to delete
    
    ]);
    ?>

</div>
