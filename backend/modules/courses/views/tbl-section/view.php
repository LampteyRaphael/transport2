<?php

use common\models\TblSemester;
use kartik\detail\DetailView;
use yii\helpers\Url;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-section-view">

<div class="box">
    <div class="box-body">
    <?php
  $attributes = [
    [
        'group'=>true,
        'label'=>'SECTION 1:',
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
            'footer' => '<div class="text-center text-muted">Levels</div>'
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
</div>

</div>
