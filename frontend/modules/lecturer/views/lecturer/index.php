<?php

use kartik\detail\DetailView;
use kartik\grid\GridView;
$this->title = 'Lecturer Bio Data';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lecturer-index">

<?php
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
                'attribute'=>'staff_category_id', 
                'label'=>'Staff Category',
                'displayOnly'=>true,
                'value'=> $model->staffCategory->name??'',
            ],
        ],
    ],
];

  $lecturers= [
    [
        'group'=>true,
        'label'=>'SECTION 2: Lecturer Departmennt And Program',
        'rowOptions'=>['class'=>'table-info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'program_id', 
                'label'=>'Program',
                'displayOnly'=>true,
                'value'=> $model->program->program_name,
            ],
            [
                'attribute'=>'program_id', 
                'label'=>'Program Code',
                'displayOnly'=>true,
                'value'=> $model->program->program_code,
            ],
        ] 
    ],
    [
        'columns' => [
            [
                'attribute'=>'depart_id', 
                'label'=>'Department',
                'displayOnly'=>true,
                 'value'=> $model->depart->department_name,
            ],
            [
                'attribute'=>'depart_id', 
                'label'=>'Department Code',
                'displayOnly'=>true,
                'value'=> $model->depart->department_code,
            ],
        ] 
    ],
    [
        'columns' => [
            [
                'attribute'=>'depart_id', 
                'label'=>'Department Phone',
                'displayOnly'=>true,
                'value'=> $model->depart->department_phone_number,
            ],
            [
                'attribute'=>'depart_id', 
                'label'=>'Department Location',
                'displayOnly'=>true,
                'value'=> $model->depart->department_office,
            ],
        ] 
    ],
];

 
?>


<div class="card">
    <div class="card-header bg-primary">
       <h4>
           <b>Lecturer Bio-Data</b>
       </h4>
    </div>
    <div class="card-body">
        <p class="card-text">
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

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show mt-4 active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
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
                    'buttons1' => '',
                ]);
                ?>
            </div>
        </div>
    </div>


    <div class="tab-pane fade show mt-4" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile=-tab">
        <div class="row">
            <div class="col">
            <?= 
                DetailView::widget([
                    'model' => $model,
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
                    'buttons1' => '',
                ]);
            ?> 
            </div>
        </div>
    </div>


    <div class="tab-pane fade show mt-4" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact=-tab">
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
        </p>
    </div>
</div>
</div>



