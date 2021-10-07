<?php

use common\models\TblAcadamicYear;
use common\models\TblStatusCategory;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acadamic Year', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-acadamic-year-view">
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
                'attribute'=>'date_of_admission', 
                'label'=>'Date Of Admission',
                'format'=>'raw',
                'type'=>DetailView::INPUT_DATE, 
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            [
                'attribute'=>'doa', 
                'label'=>'Date Of Application',
                'format'=>'raw', 
                'valueColOptions'=>['style'=>'width:30%'], 
            ],
        ],
    ],

    [
        'columns' => [
            [
                'attribute'=>'doc', 
                'label'=>'Date Of Completion',
                'format'=>'raw',
                'type'=>DetailView::INPUT_DATE, 
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            [
                'attribute'=>'status', 
                'label'=>'Status',
                'format'=>'raw', 
                'type'=>DetailView::INPUT_SELECT2, 
                'widgetOptions'=>[
                    'data'=>ArrayHelper::map(TblStatusCategory::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select ...'],
                    'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                ],
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
            'heading'=>$model->id,
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
