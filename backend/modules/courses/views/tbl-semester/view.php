<?php

use kartik\detail\DetailView;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$this->title = 'Semesters';
$this->params['breadcrumbs'][] = ['label' => 'Semesters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-semester-view">
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
                'attribute'=>'name', 
                'label'=>'Section Name',
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
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
        // 'hAlign'=>true,
        'vAlign'=>true,
        'fadeDelay'=>true,
        'panel' => [
            'heading'=>$model->name,
             'type'=>DetailView::TYPE_PRIMARY,
            'footer' => '<div class="text-center text-muted"></div>'
        ],
        'deleteOptions'=>[ // your ajax delete parameters
            'params' => ['id' => $model->id, 'kvdelete'=>true],
            'url'=>['delete','id'=>$model->id,'kvdelete'=>true]
        ],
        'container' => ['id'=>'kv-demo'],
        'formOptions' => ['action' => Url::current(['update','id' => $model->id,'updating'=>true])]  // your action to delete
    ]);
    ?>
</div>
