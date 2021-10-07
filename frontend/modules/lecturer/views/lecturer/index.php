<?php

use common\models\TblCourseLecturer;
use kartik\detail\DetailView;
use kartik\grid\GridView;
$this->title = 'Lecture Bio Data';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>

<ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Lecturer Info</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Lecture Program</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Courses</a>
    </li>
    <!-- <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-course-tab" data-toggle="pill" href="#pills-course" role="tab" aria-controls="pills-course" aria-selected="false">Registered Courses</a>
    </li> -->
</ul>
</div>



<?php
$lecturers= [
    [
        'group'=>true,
        'label'=>'SECTION 2: Lecturer Departmennt And Program',
        'rowOptions'=>['class'=>'table-info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'progrm_id', 
                'label'=>'Program',
                'displayOnly'=>true,
                'value'=> $model1->progrm->program_name??'',
            ],
        ] 
    ],

    [
        'columns' => [
            [
                'attribute'=>'depart_id', 
                'label'=>'Department',
                'displayOnly'=>true,
                 'value'=> $model1->depart->department_name??'',
            ],
        ] 
    ],
];

 
$attributes= [
    [
        'group'=>true,
        'label'=>'SECTION:Personal Info',
        'rowOptions'=>['class'=>'table-info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'first_name', 
                'label'=>'First Name',
                'displayOnly'=>true,
                'value'=> ($model->first_name??'') . ' ' . ($model->middle_name??'') . ' ' . ($model->surname??'')
            ],
        ] 
    ],
    [
        'columns' => [
            [
                'attribute'=>'city', 
                'label'=>'City',
                'displayOnly'=>true,
                'value'=> $model->city??'',
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'country', 
                'label'=>'Country',
                'displayOnly'=>true,
                'value'=> $model->country??'',
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'date_of_birth', 
                'label'=>'Date Of Birth',
                'displayOnly'=>true,
                'value'=> $model->date_of_birth??'',
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'ranks', 
                'label'=>'Ranks',
                'displayOnly'=>true,
                'value'=> $model->ranks??'',
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'telephone_number', 
                'label'=>'Telephone Number',
                'displayOnly'=>true,
                'value'=> $model->telephone_number??'',
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'doa', 
                'label'=>'Date Of Employment',
                'displayOnly'=>true,
                'value'=> $model->doa??'',
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'user_id', 
                'label'=>'Staff ID',
                'displayOnly'=>true,
                'value'=> $model->user->username??'',
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'staff_category_id', 
                'label'=>'Staff Category',
                'displayOnly'=>true,
                'value'=> $model->staffCategory->name??'',
            ],
        ],
    ],
  ]
?>








<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show p-lg-5 active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <div class="col">
                        <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => $attributes,
                    'mode' => 'view',
                    'bordered' => true,
                    'striped' => true,
                    'condensed' => true,
                    'responsive' => true,
                    'hover' => true,
                    'vAlign'=>true,
                    'fadeDelay'=>true,
                    'panel' => [
                        'heading'=>'Personal Information',
                        'type'=>DetailView::TYPE_PRIMARY,
                        'footer' => '<div class="text-center text-muted"></div>'
                    ],
                    'buttons1' => '{view}',
                ]);
                ?>
            </div>
        </div>
    </div>


    <div class="tab-pane fade show p-lg-5" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile=-tab">
        <div class="row">
            <div class="col">
            <?= 
                DetailView::widget([
                    'model' => $model1,
                    'attributes' => $lecturers,
                    'mode' => 'view',
                    'bordered' => true,
                    'striped' => true,
                    'condensed' => true,
                    'responsive' => true,
                    'hover' => true,
                    'vAlign'=>true,
                    'fadeDelay'=>true,
                    'panel' => [
                        'heading'=>'Lecturer Program',
                        'type'=>DetailView::TYPE_PRIMARY,
                        'footer' => '<div class="text-center text-muted"></div>'
                    ],
                    'buttons1' => '{view}',
                ]);
            ?> 
            </div>
        </div>
    </div>


    <div class="tab-pane fade show p-lg-5" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact=-tab">
        <div class="row">
            <div class="col">
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
            'heading'=>'<h3 class="panel-title">Lecturer Courses</h3>',
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
            ],
        ]);
     ?>
            </div>
        </div>
    </div>


</div>
