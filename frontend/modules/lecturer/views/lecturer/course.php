<?php

use kartik\grid\GridView;
use kartik\helpers\Html;
$this->title = 'Registered Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= GridView::widget([
            'dataProvider' => $dataProvider,
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
            'heading'=>'<h3 class="panel-title">Registered Courses</h3>',
            'type' => GridView::TYPE_PRIMARY,
        ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],  
                [

                    'attribute'=>'course_id',
                    'label'=>'Courses',
                    'value'=>'course.courseName'
                ],
                [

                    'attribute'=>'course_id',
                    'label'=>'Courses Code',
                    'value'=>'course.course_number'
                ],
                [

                    'attribute'=>'course_id',
                    'label'=>'Level',
                    'value'=>'course.level.level_name'
                ],
                [

                    'attribute'=>'course_id',
                    'label'=>'Session',
                    'value'=>'course.section.name'
                ],
                [

                    'attribute'=>'course_id',
                    'label'=>'Semester',
                    'value'=>'course.semester0.name'
                ],
                ['class' => 'kartik\grid\ActionColumn',
                'width'=>'20%',
                'template' => '{view}',
               
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                     return   Html::a('Class List', ['/lecturer/lecturer/view', 'id' => $model->course_id], ['class' => 'btn btn-primary']);
                    },
                ],
            ],  



            ],
        ]);
     ?>
