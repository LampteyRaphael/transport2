<?php

use kartik\grid\GridView;
$this->title = 'Student Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-studs-result-index">
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
       'filterModel' => $searchModel,
       'headerRowOptions'=>['class'=>'kartik-sheet-style'],
       'filterRowOptions'=>['class'=>'kartik-sheet-style'],
       'containerOptions' => ['style'=>'overflow: auto'], 
       'tableOptions' => ['class' => 'table table-striped table-hover table-condensed text-left'],
       'toolbar' =>  [
           '{export}',
           '{toggleData}'
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
       'heading'=>'<h3 class="panel-title">Students Results</h3>',
       'type' => GridView::TYPE_PRIMARY,
   ],
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],

        'date_of_entry:date',

        [
            'attribute'=>'student_id',
            'value'=>function($model){
                return  $model->student->personalDetails->first_name. ' ' . $model->student->personalDetails->middle_name. ' ' . $model->student->personalDetails->last_name;
            },
            'label'=>'Students'
        ],
        [
            'attribute'=>'course_id',
            'value'=>function($model){
                return  $model->course->courseName;
            },
            'label'=>'Course'
        ], 
        [
            'attribute'=>'semester',
            'value'=>function($model){
                return  $model->semester0->name;
            },
            'label'=>'Semester'
        ],
        [
            'attribute'=>'class_marks',
            'value'=>function($model){
                return  $model->class_marks;
            },
            'label'=>'Class Marks'
        ],
        [
            'attribute'=>'exams_marks',
            'value'=>function($model){
                return  $model->exams_marks;
            },
            'label'=>'Exam Marks'
        ],
        [
            'attribute'=>'total_marks',
            'value'=>function($model){
                return  $model->total_marks;
            },
            'label'=>'Total Marks'
        ],
        [
            'attribute'=>'grade_id',
            'value'=>function($model){
                return  $model->grade->grade_name??'';
            },
            'label'=>'Grade'
        ],
    ],
]); ?>
</div>
