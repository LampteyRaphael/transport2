<?php

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TblStudsResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-studs-result-index">

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
       // 'filterModel' => $searchModel,
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
            'attribute'=>'grade_id',
            'value'=>function($model){
                return  $model->grade->grade_name??'';
            },
            'label'=>'Grade'
        ],
        // [
        //     'attribute'=>'grade_id',
        //     'value'=>function($model){
        //         return  $model->grade->grade_point??'';
        //     },
        //     //'label'=>'Grade Point'
        // ],
    ],
]); ?>
</div>
