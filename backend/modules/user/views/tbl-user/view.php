<?php

use kartik\detail\DetailView;
use kartik\helpers\Html;
use yii\helpers\Url;
$this->title='Admin User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>


<?php
  $attributes = [
    [
        'group'=>true,
        'label'=>'SECTION :Admin Info',
        'rowOptions'=>['class'=>'table-info'],
        'data-toggle'=>'modal',
        'data-target'=>'updateUser'
    ],
    [
        'columns' => [
            [
                'attribute'=>'username', 
                'label'=>'Username',
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
            ],
           
            [
                'attribute'=>'photo', 
                'label'=>'Photo',
                'value'=>Html::img('../../application/images/'.$model->photo,['height'=>'100px','width'=>'100px'])??'',
                'format'=>'raw', 
                'type'=>DetailView::INPUT_FILEINPUT, 
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'email', 
                'label'=>'Email',
                'format'=>'raw', 
                'type'=>DetailView::INPUT_TEXT, 
            ],
        ],
    ],

    [
        'group'=>true,
        'label'=>'SECTION : Staff Info',
        'rowOptions'=>['class'=>'table-info']
    ],

    [
        'columns' => [
            [
                'attribute'=>'title', 
                'label'=>'Title',
                'value'=>$staff->title->id??'',
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
            ],
            [
                'attribute'=>'surname', 
                'label'=>'Surname',
                'value'=>$staff->surname??'',
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
            ],
            [
                'attribute'=>'middle_name', 
                'label'=>'Last Name',
                'value'=>$staff->middle_name??'',
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
            ],
            [
                'attribute'=>'first_name', 
                'label'=>'First Name',
                'value'=>$staff->first_name??'',
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
            ],
        ],
    ],

    [
        'columns' => [
            [
                'attribute'=>'city', 
                'label'=>'City',
                'value'=>$staff->city??'',
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
            ],
            [
                'attribute'=>'country', 
                'label'=>'Country',
                // 'value'=>$staff->country0->id,
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
            ],
            [
                'attribute'=>'date_of_birth', 
                'label'=>'Date Of Birth',
                'value'=>$staff->date_of_birth??'',
                'format'=>'raw',
                'type'=>DetailView::INPUT_DATE, 
            ],
            [
                'attribute'=>'doa', 
                'label'=>'Date Employed',
                'value'=>$staff->doa??'',
                'format'=>'raw',
                'type'=>DetailView::INPUT_DATE, 
            ],
        ],
    ],

    [
        'columns' => [
            [
                'attribute'=>'ranks', 
                'label'=>'Rank',
                'value'=>$staff->ranks??'',
                'format'=>'raw',
                'displayOnly'=>true,
                'type'=>DetailView::INPUT_TEXT, 
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            [
                'attribute'=>'telephone_number', 
                'label'=>'Phone Number',
                'value'=>$staff->telephone_number??'',
                'format'=>'raw',
                'displayOnly'=>true,
                'type'=>DetailView::INPUT_TEXT, 
                'valueColOptions'=>['style'=>'width:30%'],
            ],
        ],
    ],

    [
        'columns' => [
            [
                'attribute'=>'staff_category_id', 
                'label'=>'Staff Category',
                'value'=>$staff->staffCategory->name??'',
                'format'=>'raw',
                'type'=>DetailView::INPUT_TEXT, 
            ]
        ],
    ],



    
    
];
?>

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
            'heading'=>Html::button(('Update'), ['class' => 'btn btn-success float-right','data-toggle'=>"modal", 'data-target'=>"#updateUser"]),
             'type'=>DetailView::TYPE_PRIMARY,
            'footer' => '<div class="text-center text-muted"></div>'
        ],
        'buttons1' => '',
    ]);
    ?>

<div id="updateUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="my-modal-title">Title</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <?= $this->render('_update', [
                        'model' => $model,'staff'=>$staff
                    ]) ?>             
                </p>
            </div>
            <div class="modal-footer bg-primary">
                System Admin Update
            </div>
        </div>
    </div>
</div>
