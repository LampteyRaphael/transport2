<?php

use common\models\TblAppQualiStatus;
use common\models\TblLevel;
use common\models\TblSection;
use common\models\TblSemester;
use common\models\TblStudAcadamicYear;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TblCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-course-index">
<?= Html::beginForm(['/student/tbl-course/index'], 'post'); ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    // 'filterModel' => $searchModel,
    // 'tableOptions' => [
	// 	'id' => 'table-documents',
	// 	'class' => 'table table-bordered table-striped table-success kv-grid-table kv-table-wrap',
	// ],
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'containerOptions' => ['style'=>'overflow: auto'], 
    'tableOptions' => ['class' => 'table table-sm  table-striped table-hover table-condensed text-left'],

    'toolbar' =>  [

        ['content'=>
           Html::dropDownList('level_id','levels', ArrayHelper::map(TblLevel::find()->asArray()->all(),'id','level_name'),['class' => 'form-control mr-5'])
        ],

        // ['content'=>
        //   Html::dropDownList('semester','', ArrayHelper::map(TblSemester::find()->asArray()->all(),'id','name'),['class' => 'form-control mr-5'])
        // ],

        // ['content'=>
        //   Html::dropDownList('section','', ArrayHelper::map(TblSection::find()->asArray()->all(),'id','name'),['class' => 'form-control mr-5'])
        // ],

        // ['content'=>
        //   Html::dropDownList('acadamic_year','', ArrayHelper::map(TblStudAcadamicYear::find()->asArray()->all(),'id','name'),['class' => 'form-control mr-5'])
        // ],

        ['content'=>
        Html::submitButton('Search', ['class' => 'btn btn-primary mr-5'])
        ],
        
        // '{export}',
        // '{toggleData}'
    ],

'pjax'=>true,
'bordered' => true,
'striped' => true,
'condensed' => false,
'responsive' => true,
'responsiveWrap' => false,
'bootstrap'=>true,
'hover' => true,
'floatHeader' => false,
'panel' => [
    'heading'=>'<h3 class="panel-title">Courses</h3>',
    'type' => GridView::TYPE_PRIMARY,
],
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        [
            'attribute'=>'courseName',
            'label'=>'Course Name',
            'value'=>'courseName',
        ],
        [
            'attribute'=>'course_number',
            'label'=>'Course Code',
            'value'=>'course_number',
        ],

        [
            'attribute'=>'level_ids',
            'label'=>'Level',
            'value'=>'level.level_name',
        ],

        [
            'attribute'=>'semester',
            'label'=>'Semester',
            'value'=>'semester0.name',
        ],

        [
            'attribute'=>'section',
            'label'=>'Section',
            'value'=>'section.name',
        ],
     
        [
            'class' => 'kartik\grid\CheckboxColumn',
            'checkboxOptions' => function ($model, $key, $index, $column) {
                return ['value' => $model->id,'onchange'=>'this.form.submit()'];
            }
        ],      
    ],
]); ?>
<?= Html::endForm(); ?>

<br>
<br>

<?php if(!empty($dataCount)):?>

<?= Html::beginForm(['/student/tbl-course/approved'], 'post'); ?>
<?= GridView::widget([
    'dataProvider' => $data,
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'containerOptions' => ['style'=>'overflow: auto'], 
    'tableOptions' => ['class' => 'table table-sm  table-striped table-hover table-condensed text-left'],
    'toolbar' =>  [
        ['content'=>
        Html::submitButton('Sumbit', ['class' => 'btn btn-primary mr-5'])
     ],
    ],
'pjax'=>true,
'bordered' => true,
'striped' => true,
'condensed' => false,
'responsive' => true,
'responsiveWrap' => false,
'bootstrap'=>true,
'hover' => true,
'floatHeader' => false,
'panel' => [
    'heading'=>'<h3 class="panel-title">Selected Courses For Registration</h3>',
    'type' => GridView::TYPE_PRIMARY,
],
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        [
            'attribute'=>'courese_id',
            'label'=>'Course Name',
            'value'=>'courese.courseName',
        ],
        [
            'attribute'=>'courese_id',
            'label'=>'Course Code',
            'value'=>'courese.course_number',
        ],

        [
            'attribute'=>'level_id',
            'label'=>'Level',
            'value'=>'level.level_name',
        ],

        [
            'attribute'=>'semester',
            'label'=>'Semester',
            'value'=>'semester0.name',
        ], 
        [
            'attribute'=>'section.name',
            'label'=>'Section',
            'value'=>'section.name',
        ],
        ['class' => 'kartik\grid\CheckboxColumn',
            'checkboxOptions' => function ($data, $key, $index, $column) {
                if($data->status==1){
                    return ['checked' => $data->id,'onchange'=>'this.form.submit()'];
                }
                
            }
        ],
        ['class' => 'kartik\grid\ActionColumn',
         'template' => '{delete}',
        ],
    ],
]); ?>
<?= Html::endForm(); ?>

<?php else:?>
    <h4>No Course Selected</h4>

<?php endif; ?>
</div>