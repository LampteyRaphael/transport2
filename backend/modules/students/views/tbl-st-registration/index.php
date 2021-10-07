<?php

use kartik\grid\GridView;
use yii\bootstrap4\Html;
use yii\widgets\Pjax;

$this->title = 'Tbl St Registrations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-st-registration-index">
<?php include (Yii::getAlias('@backend/modules/students/views/include/header.php'))?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'containerOptions' => ['style'=>'overflow: auto'], 
        'tableOptions' => ['class' => 'table table-striped table-hover table-condensed text-left'],

        'toolbar' =>  [
        [
            // 'content'=> 
            // Html::button(('Add New Course'), ['class' => 'btn btn-primary','data-toggle'=>"modal", 'data-target'=>"#addCourse"]),
         ],
            '{export}',
            '{toggleData}'
        ],

    'pjax'=>true,
    'bordered' => true,
    'striped' => true,
    'condensed' => false,
    'responsive' => true,
    'bootstrap'=>true,
    'hover' => true,
    'floatHeader' => false,
    'panel' => [
        'heading'=>'<h3 class="panel-title">Students And Course Registration</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                'attribute'=>'stud_id',
                'label'=>'Student Name',
                'value'=>'stud.personalDetails.first_name'
            ],
            [
                'attribute'=>'courese_id',
                'label'=>'Course Name',
                'value'=>'courese.courseName'
            ],
            [
                'attribute'=>'semester',
                'label'=>'Semester',
                'value'=>'semester0.name'
            ],
            'date_o_regis',
            [
                'attribute'=>'acadamic_year',
                'label'=>'Acadamic Year',
                'value'=>'acadamicYear.name'
            ],
            
            [
                'attribute'=>'program_id',
                'label'=>'Program Name',
                'value'=>'program.program_name'
            ],
            [
                'attribute'=>'status',
                'label'=>'status',
                'value'=>'status0.name'
            ],

             ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( 'view', ['/students/tbl-regis-course/view/', 'id' => $model->id],['class'=>'btn btn-primary'] );
                },
                
            ],
        ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
