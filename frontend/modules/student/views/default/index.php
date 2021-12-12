<?php
use kartik\detail\DetailView;
use yii\bootstrap4\Html;
$this->title = 'Students Info';
$this->params['breadcrumbs'][] = ['label' => 'Students Info', 'url' => ['index']];
?>
<div class="student-default-index">

<?php
  $attributes = [
    [
        'group'=>true,
        'label'=>'SECTION: Personal Details ',
        'rowOptions'=>['class'=>'table-info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Students ID',
                'displayOnly'=>true,
                'value'=> Yii::$app->user->identity->username??''
            ],
        ],
        
    ],

    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Students Name',
                'displayOnly'=>true,
                'value'=> ($personal->personalDetails->title0->name??'') . ' ' . ($personal->personalDetails->first_name??'') .' ' . ($personal->personalDetails->middle_name??'') .' '. ($personal->personalDetails->last_name??''),
            ],
    
        ],
        
    ],

    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Gender',
                'displayOnly'=>true,
                'value'=> $personal->personalDetails->gender??'',
            ],
        ],
    ],

    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Date Of Birth',
                'displayOnly'=>true,
                'value'=>  $personal->personalDetails->date_of_birth??'',
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Nationality',
                'displayOnly'=>true,
                'value'=>  $personal->personalDetails->nationality??'',
            ],
        ],
    ],

    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Emergency Person',
                'displayOnly'=>true,
                'value'=>  $personal->personalDetails->contact_person??'',
            ],
        ],
    ],

  ]

?>

<?php
  $correspondance = [
    [
        'group'=>true,
        'label'=>'SECTION: Correspondance ',
        'rowOptions'=>['class'=>'table-info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Emmergency Person',
                'displayOnly'=>true,
                'value'=> $personal->personalDetails->contact_person??''
            ],
        ],
        
    ],

    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Emergency Contact',
                'displayOnly'=>true,
                'value'=> $personal->personalDetails->contact_number??'',
            ],
    
        ],
        
    ],

    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Student Email Address',
                'displayOnly'=>true,
                'value'=> $personal->personalAddress->email??'',
            ],
    
        ],
        
    ],

    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Student Phone Number',
                'displayOnly'=>true,
                'value'=> $personal->personalAddress->telephone_number??'',
            ],
    
        ],
        
    ],
    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Student Address',
                'displayOnly'=>true,
                'value'=>$personal->personalAddress->address??'',
            ],
    
        ],
        
    ],
  ]

?>

<?php
  $acadamic = [
    [
        'group'=>true,
        'label'=>'SECTION: Acadamic Record ',
        'rowOptions'=>['class'=>'table-info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Educational Instition',
                'displayOnly'=>true,
                'value'=> $personal->personalEducation->institution??''
            ],
        ] 
    ],

    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Entry Qualification',
                'displayOnly'=>true,
                'value'=> $personal->personalEducation->program_offered??'',
            ],
        ],
    ],

    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Date Completed',
                'displayOnly'=>true,
                'value'=> $personal->personalEducation->date??'',
            ],
        ],
    ],
  ]
?>
 


 <div class="card">
     <div class="card-header bg-primary">
       <h4>
           <b>Bio-Data</b>
       </h4>
     </div>
     <div class="card-body">
         <p class="card-text">
<?php include (Yii::getAlias('@frontend/modules/student/views/include/header.php'))?>
<div class="tab-content" id="pills-tabContent">
    <div class="container">
        <div class="row">
        <div class="col-md-2">
            <?= Html::img('@web'.'/application/images/'.($personal->personalDetails->photo??''),['height'=>'100','width'=>'100','class'=>'thumbnail rounded'])?>
        </div>
        <div class="col-md-8">
            <table>
                <tbody>
                <tr>
                    <td><b><?= ($personal->personalDetails->first_name??'')  . ' ' . ($personal->personalDetails->middle_name??'') . ' ' .($personal->personalDetails->last_name??'') ;?></b></td>
                </tr>
                <tr>
                    <td>
                        <b><?= $personal->program->program->program_name; ?></b>
                    </td>
                    <td>
                        <b><?= ($personal->program->program->program_code??'');?></b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b><?= ucwords($personal->program->program->programCategory->name??'');?></b>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        </div>
       
    </div>


    <div class="tab-pane fade show mt-4 active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <div class="col">
            <?=
                DetailView::widget([
                    'model' => $personal,
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
    <div class="tab-pane fade mt-4" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="row">
            <div class="col">
            <?=
                DetailView::widget([
                    'model' => $personal,
                    'attributes' => $correspondance,
                    'mode' => 'view',
                    'bordered' => true,
                    'striped' => true,
                    'condensed' => true,
                    'responsive' => true,
                    'hover' => true,
                    'vAlign'=>true,
                    'fadeDelay'=>true,
                    'panel' => [
                        'heading'=>'Correspondence Details',
                        'type'=>DetailView::TYPE_PRIMARY,
                        'footer' => '<div class="text-center text-muted"></div>'
                    ],
                     'buttons1' => '',
                ]);
                 ?>
            </div>
        </div>
    </div>
    <div class="tab-pane fade mt-4" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="row">
                <div class="col">
                <?=
                DetailView::widget([
                    'model' => $personal,
                    'attributes' => $acadamic,
                    'mode' => 'view',
                    'bordered' => true,
                    'striped' => true,
                    'condensed' => true,
                    'responsive' => true,
                    'hover' => true,
                    'vAlign'=>true,
                    'fadeDelay'=>true,
                    'panel' => [
                        'heading'=>'Acadamic Records',
                        'type'=>DetailView::TYPE_PRIMARY,
                        'footer' => '<div class="text-center text-muted"></div>'
                    ],
                     'buttons1' => '',             
                ]);
                 ?>
                </div>
        </div>
    </div>
</div>
</div>
         </p>
     </div>
 </div>
