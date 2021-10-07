<?php

use common\models\TblLevel;
use common\models\TblProgram;
use common\models\TblSection;
use common\models\TblSemester;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = 'Course';
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-course-view">
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
                'attribute'=>'courseName', 
                'label'=>'Course Name',
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            [
                'attribute'=>'course_number', 
                'label'=>'Course Code',
                'format'=>'raw', 
                'type'=>DetailView::INPUT_TEXT, 
                'valueColOptions'=>['style'=>'width:30%'], 
            ],
        ],
    ],

    [
        'columns' => [
            [
                'attribute'=>'program_id', 
                'label'=>'Program Name',
                'value'=>$model->program->program_name,
                'format'=>'raw',
                'type'=>DetailView::INPUT_SELECT2, 
                'widgetOptions'=>[
                    'data'=>ArrayHelper::map(TblProgram::find()->orderBy('program_name')->asArray()->all(), 'id', 'program_name'),
                    'options' => ['placeholder' => 'Select ...'],
                    'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                ],
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            [
                'attribute'=>'section_id', 
                'label'=>'Section',
                'format'=>'raw', 
                'value'=>$model->section->name??'',
                'type'=>DetailView::INPUT_SELECT2, 
                'widgetOptions'=>[
                    'data'=>ArrayHelper::map(TblSection::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
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
                'attribute'=>'level_id', 
                'label'=>'Level',
                'value'=>$model->id,
                'format'=>'raw',
                'value'=>$model->level->level_name??'',
                'type'=>DetailView::INPUT_SELECT2, 
                'widgetOptions'=>[
                    'data'=>ArrayHelper::map(TblLevel::find()->orderBy('level_name')->asArray()->all(), 'id', 'level_name'),
                    'options' => ['placeholder' => 'Select ...'],
                    'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                ],
                'valueColOptions'=>['style'=>'width:30%'],
            ],

            [
                'attribute'=>'semester', 
                'label'=>'semester',
                'value'=>$model->id,
                'format'=>'raw',
                'value'=>$model->semester0->name??'',
                'type'=>DetailView::INPUT_SELECT2, 
                'widgetOptions'=>[
                    'data'=>ArrayHelper::map(TblSemester::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select ...'],
                    'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                ],
                'valueColOptions'=>['style'=>'width:30%'],
            ]
        ],
    ],

    [
        'columns' => [
     
            [
                'attribute'=>'required_courses', 
                'label'=>'Required Courses',
                'value'=>$model->required_courses,
                'format'=>'raw', 
                'type'=>DetailView::INPUT_SELECT2, 
                'widgetOptions'=>[
                    'data'=>[1=>'Required',2=>'Not Required'],
                    'options' => ['placeholder' => 'Select ...'],
                    'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                ],
                'valueColOptions'=>['style'=>'width:30%'], 
            ],
            [
                'attribute'=>'course_description', 
                'label'=>'Course Description',
                'format'=>'raw', 
                'type'=>DetailView::INPUT_TEXTAREA, 
                'valueColOptions'=>['style'=>'width:30%'], 
            ],
        ],
    ],

    [
        'columns' => [
     
        
            [
                'attribute'=>'date', 
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
        // 'hAlign'=>true,
        'vAlign'=>true,
        'fadeDelay'=>true,
        'panel' => [
            'heading'=>'Update Course Registered',
             'type'=>DetailView::TYPE_PRIMARY,
            'footer' => '<div class="text-center text-muted"></div>'
        ],
        'deleteOptions'=>[ // your ajax delete parameters
            'params' => ['id' => 1000, 'kvdelete'=>true],
            'url'=>['delete','id'=>$model->id,'kvdelete'=>true]
        ],
        'container' => ['id'=>'kv-demo'],
        'formOptions' => ['action' => Url::current(['update','id' => $model->id,'updating'=>true])]  // your action to delete
    ]);
    ?>
</div>
