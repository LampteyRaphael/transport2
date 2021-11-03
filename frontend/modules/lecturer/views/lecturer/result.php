<?php
use common\models\TblStRegistration;
use kartik\form\ActiveForm;
use yii\helpers\Html;

$this->title = 'Students Registered Courses';
$this->params['breadcrumbs'][] = $this->title;
// $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
?>

<div class="card">
    <div class="card-header bg-primary">
      <h3>Registered Courses</h3> 
    </div>
    <div class="card-body">
        
               <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'action' => Yii::$app->urlManager->createUrl(['/lecturer/lecturer/upload'])]);?>
                    <div class="row">
                            <div class="col-md-2">
                            <?= $form->field($model, 'file')->fileInput()->label(false);?>
                            </div>
                            <div class="col-md-3">
                            <?= Html::submitButton('Save Upload', ['class' => 'btn btn-primary']) ?>
                            </div>
                    </div>
                <?php ActiveForm::end(); ?>
            
      
        <p class="card-text">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Course Code</th>
                        <th>Semester</th>
                        <th>Level</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $lecC as $course): ?>
                    <?php $total= TblStRegistration::find()->andwhere(['courese_id'=>$course->course->id])
                            ->andWhere(['level_id'=>$course->course->level->id])
                            ->andWhere(['semester'=>$course->course->semester0->id])
                        // ->andWhere(['acadamic_year'=>Yii::$app->session->get('downloadacadamic')])
                        ->count();
                        ?>
                  <?php if($total===0): ?>
                    <?php else: ?>
                    <tr>
                        <td><?= $course->course->courseName??''?></td>
                        <td><?= $course->course->course_number??''?></td>
                        <td><?= $course->course->semester0->name??''?></td>
                        <td><?= $course->course->level->level_name??''?></td>
                        <td><?= $total??''?></td>
                        <td>
                        <?= Html::a('download',['/lecturer/lecturer/download', 'id' => $course->course->id],['class'=>'btn btn-primary']) ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </p>
    </div>
   
</div>


          
       

<!-- < if(!empty($course)): ?> -->
<!-- <div class="col">
< Html::beginForm(['/lecturer/lecturer/upload'], 'post'); ?>
< GridView::widget([
    'dataProvider' => $dataProvider,
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'containerOptions' => ['style'=>'overflow: auto'], 
    'tableOptions' => ['class' => 'table table-striped table-hover table-condensed text-left'],

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
    'heading'=>'<h3 class="panel-title">Download Class List</h3>',
    'type' => GridView::TYPE_PRIMARY,
],
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        [
            'attribute'=>'courseName',
            'label'=>'Courses',
            'value'=>'course.courseName',
        ],
        [
            'attribute'=>'course_number',
            'label'=>'Course Code',
            'value'=>'course.course_number',
        ],
        [
            'attribute'=>'semester',
            'label'=>'Semester',
            'value'=>'course.semester0.name',
        ],
        // [
        //     'attribute'=>'section_id',
        //     'label'=>'Session',
        //     'value'=>'section.name',
        // ],
        [
            'attribute'=>'level_id',
            'label'=>'Levels',
            'value'=>'course.level.level_name',
        ],
        [
            'attribute'=>'id',
            'label'=>'Total Students',
            'value'=>function($model){
                $total= TblStRegistration::find()->andwhere(['courese_id'=>$model->course_id])
                ->andWhere(['level_id'=>Yii::$app->session->get('downloadLevel')])
                 ->andWhere(['semester'=>Yii::$app->session->get('downloadsemester')])
                 ->andWhere(['acadamic_year'=>Yii::$app->session->get('downloadacadamic')])
                ->count();

                if($total==null){
                    return null;
                }else{
                    return $total;
                }
            },
        ],
        ['class' => 'kartik\grid\ActionColumn',
        'template' => '{view} {update} {delete}',
        'width'=>100,
        'buttons' => [
            'view' => function ($url, $model, $key) {
                return Html::a( 'Download', ['/lecturer/lecturer/course','id'=>$model->course_id],[
                        'class'=>'btn btn-primary',
                        'data' => [
                            'method' => 'post',
                        ],
                ]);
            },
            'update' => function ($url, $model, $key) {
                return Html::fileInput('file');
            },
            'delete'=> function($url, $model, $key){
                return  Html::submitButton('Submit Upload',[
                    'class'=>'btn btn-primary',
                    'data' => [
                        'method' => 'post',
                    ],
                ]);
            },
        ],
    ],
        
    ],
]); ?>
< Html::endForm(); ?>
</div> -->
<!-- < endif; ?> -->

