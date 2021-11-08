<?php

use common\models\TblStudsResult;
use kartik\grid\GridView;

$this->title = 'Examination Result';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- 
GridView::widget([
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
       'heading'=>'<h3 class="panel-title">Student Results</h3>',
       'type' => GridView::TYPE_PRIMARY,
   ],
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],

        [
            'attribute'=>'date_of_entry',
            'label'=>'Date',
            'value'=>'date_of_entry'
        ],

        [
            'attribute'=>'course_id',
            'value'=>function($model){
                return  $model->course->courseName;
            },
            'label'=>'Course'
        ],

        [
            'attribute'=>'section_id',
            'value'=>function($model){
                return  $model->section->name;
            },
            'label'=>'Session'
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
        [
            'attribute'=>'grade_id',
            'value'=>function($model){
                return  $model->grade->grade_point??'';
            },
            'label'=>'Grade Point'
        ],
    ],
]);  -->


<div class="card">
    <div class="card-header bg-primary">
       <h4>
           <b>Students Result</b>
       </h4>
    </div>
    <div class="card-body">
        <p class="card-text">

        <table class="table table-striped table-responsive-lg">
         
                <tbody>
                <?php foreach($studAcad as $acadamicyear): ?>
                    <thead>
                        <tr>
                            <th><?= $acadamicyear->semester0->name??''?></th>
                            <th colspan="4"><?= $acadamicyear->studAcadamicYear->date_of_admission?></th>
                        </tr>
                        <tr class="thead-light">
                                <th>Course No.</th>
                                <th>Course Title</th>
                                <th>Grade</th>
                                <!-- <th>Grade Point</th> -->
                            </tr>
                    </thead>
                    <?php foreach(TblStudsResult::find()->andwhere(['student_id'=>$id])->andWhere(['acadamic_year'=>$acadamicyear->id])->all() as $result): ?>
                        <tr>
                        <td><?= $result->course->course_number??''?></td>
                        <td><?= $result->course->courseName??''?></td>
                        <td><?= $result->grade->grade_name??''?></td>
                        <!-- <td>< $result->grade->grade_point??''?></td> -->
                    </tr>
                    <?php endforeach;?>
                <?php endforeach;?>
                </tbody>
        </table>
        </p>
    </div>
    
</div>