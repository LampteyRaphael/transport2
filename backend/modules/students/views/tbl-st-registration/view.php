<?php

use kartik\grid\GridView;
use yii\bootstrap4\Nav;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStRegistration */

$this->title = 'Course Registed';
$this->params['breadcrumbs'][] = ['label' => 'Registrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-st-registration-view">
<div class="card">
        <div class="card-header bg-primary">
            <h4>
              <b><?= $name;?></b>
            </h4>
        </div>
        <div class="card-body">
            <p class="card-text">
            <?php
            echo Nav::widget([
              'options'=>['class'=>'nav nav-tabs','id'=>"nav-tab",'style'=>'font-size:15px; '],
              'items'=>[
                ['label'=>'Student Info','url'=>['/students/tbl-stud/view','id'=>$id],['class'=>'nav-link','id'=>'program','role'=>'tab']],
                ['label'=>'Registed Courses','url'=>['/students/tbl-st-registration/view','id'=>$id],['class'=>'nav-link','id'=>'level','role'=>'tab']],
                ['label' => 'Results', 'icon' => 'user', 'url' => ['/students/tbl-studs-result/view','id'=>$id]],  

                // ['label'=>'Semester','url'=>['/courses/tbl-semester/index'],['class'=>'nav-link','id'=>'semester','role'=>'tab']],
                // ['label'=>'Section','url'=>['/courses/tbl-section/index'],['class'=>'nav-link','id'=>'sec','role'=>'tab']],
                // ['label'=>'Accademic Year','url'=>['/program/tbl-acadamic-year/index'],['class'=>'nav-link','id'=>'doc','role'=>'tab']],
                // ['label'=>'Osn','url'=>['/program/tbl-osn/index'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
              ]
            ]);
            ?>
            </p>
        </div>
    </div>

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
            'date_o_regis:datetime',
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
                'attribute'=>'acadamic_year',
                'label'=>'Acadamic Year',
                'value'=>'acadamicYear.studAcadamicYear.date_of_admission'
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
