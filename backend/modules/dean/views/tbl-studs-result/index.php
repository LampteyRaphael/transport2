<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TblStudsResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students Result';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-studs-result-index">
<?= Html::beginForm(['/dean/tbl-studs-result/result'], 'post'); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
       'filterModel' => $searchModel,
       'headerRowOptions'=>['class'=>'kartik-sheet-style'],
       'filterRowOptions'=>['class'=>'kartik-sheet-style'],
       'containerOptions' => ['style'=>'overflow: auto'], 
       'tableOptions' => ['class' => 'table table-striped table-hover table-condensed text-left'],
       'toolbar' =>  [
            ['content'=>
                Html::submitButton('Rollback Students Result',['class' => 'btn btn-danger float-right mr-4',
             'name' => 'submit', 'value' =>'Signed','onclick'=>'return confirm("Are you sure you want to rollback students result to hod? Click Ok to confirm.")']),
            ],

            ['content'=>
                Html::submitButton('Submit Result', ['class' => 'btn btn-primary float-left',
                'name' => 'submit', 'value' =>'publish','onclick'=>'return confirm("Are you sure you want to Post the selected result For Publication")']),
            ],

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

        'date_of_entry:datetime',
        [
            'class' => 'kartik\grid\CheckboxColumn',
            'checkboxOptions' => function ($model, $key, $index, $column) {

                if($model->status ==3){
                    return ['value' => $model->id];
                }else{
                    return ['value' => $model->id,'disabled'=>true, 'class'=>'text-danger'];
                }

                
            }
        ], 
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
            'label'=>'Mid Sem Exams'
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
<?= Html::endForm(); ?>

</div>
