<?php

use common\models\TblStRegistration;
use kartik\grid\GridView;
use kartik\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Student Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-studs-result-index">

<div class="card">
    <div class="card-header bg-primary">
      <h3>Registered Courses</h3> 
    </div>
    <div class="card-body">
            <div class="row">
               <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'action' => Yii::$app->urlManager->createUrl(['/lecturer/tbl-studs-result/upload'])]);?>
                  
               <div class="row">
                    <div class="col-md-8">
                        <?= $form->field($model, 'file')->fileInput()->label(false);?>
                    </div>
                    <div class="">
                            <?= Html::submitButton('Save Upload', ['class' => 'btn btn-primary']) ?>
                    </div>
               </div>
                           
                   
                <?php ActiveForm::end(); ?>
            </div>
      
        <p class="card-text">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Course Code</th>
                        <th>Semester</th>
                        <th>Total Registered Students</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lecturer as $course): ?>
                    <?php $total= TblStRegistration::find()
                             ->andwhere(['courese_id'=>$course->course->id])
                             ->andWhere(['acadamic_year'=>$academic_year])
                             ->andWhere(['status'=>1])
                             ->andWhere(['semester'=>$semester])
                             ->count();
                        ?>
                  <!-- < if($total===0): ?> -->
                    <!-- < else: ?> -->
                    <tr>
                        <td><?= $course->course->courseName??''?></td>
                        <td><?= $course->course->course_number??''?></td>
                        <td><?= $course->course->semester0->name??''?></td>
                        <td><?= $total??''?></td>
                        <td>

                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Yii::$app->urlManager->createUrl(['/lecturer/tbl-studs-result/download'])]); ?>

                        <input type="hidden" name="academic_year" value="<?= $academic_year?>">
                        <input type="hidden" name="semester" value="<?= $semester?>">
                        <input type="hidden" name="course" value="<?= $course->course->id?>">
                        <?= Html::submitButton('download',['class'=>'btn btn-primary']) ?>
                        <?php ActiveForm::end(); ?>

                    </td>
                    </tr>
                    <!-- < endif; ?> -->
                    <?php endforeach; ?>
                </tbody>
            </table>
        </p>
    </div>
   
</div>


<?= Html::beginForm(['/lecturer/tbl-studs-result/remove'], 'post'); ?>
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
            Html::submitButton('Post Result',['class' => 'btn btn-primary float-right mr-4',
            'name' => 'submit', 'value' =>'Signed','onclick'=>'return confirm("You cannot make changes to the selected result after being Posted")']),
        ],

             ['content'=>
                Html::submitButton('Remove Selected Result', ['class' => 'btn btn-danger float-left mr-4',
                
                'name' => 'submit', 'value' =>'remove','onclick'=>'return confirm("Are you sure you want to delete the selected result")'])
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

                if($model->status ==1){
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
<?= Html::endForm(); ?>

</div>
