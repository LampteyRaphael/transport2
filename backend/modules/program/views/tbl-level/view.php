<?php



/* @var $this yii\web\View */
/* @var $model common\models\TblLevel */

use kartik\detail\DetailView;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => 'Levels', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-level-view">
    <?php
  $attributes = [
    [
        'group'=>true,
        'label'=>'SECTION 1: Level',
        'rowOptions'=>['class'=>'table-info']
    ],
  
    [
        'columns' => [
            [
                'attribute'=>'level_name', 
                'label'=>'Level Name',
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            // [
            //     'attribute'=>'user_id', 
            //     'label'=>'User Adminn',
            //     'value'=>
            //     'format'=>'raw', 
            //     'displayOnly'=>true,
            //     'type'=>DetailView::INPUT_SELECT2, 
            //     'valueColOptions'=>['style'=>'width:30%'], 
            // ],
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
            'heading'=>$model->level_name,
             'type'=>DetailView::TYPE_PRIMARY,
            'footer' => '<div class="text-center text-muted">Levels</div>'
        ],
        'deleteOptions'=>[ // your ajax delete parameters
            'params' => ['id' => $model->id, 'kvdelete'=>true],
            'url'=>['/program/tbl-level/delete','id'=>$model->id,'kvdelete'=>true]
        ],
        'container' => ['id'=>'kv-demo'],
        'formOptions' => ['action' => Url::current(['update','id' => $model->id,'updating'=>true])]  // your action to delete
    
    ]);
    ?>

</div>
