<?php

use backend\modules\application\models\App;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\application\models\AppPersDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Application Details';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-pers-details-index">
<fieldset>
      <legend>Personal Details</legend>
      
      <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
                'attribute'=>'title',
                'label'=>'Title',
                'value'=>$model->personalDetails->title0->name??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'First Name',
                'value'=>$model->personalDetails->first_name??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Middle Name',
                'value'=>$model->personalDetails->middle_name??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Last Name',
                'value'=>$model->personalDetails->last_name??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Gender',
                'value'=>$model->personalDetails->gender??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Date Of Birth',
                'value'=>$model->personalDetails->date_of_birth??'',
                'format' => ['date', 'php:jS F Y'],
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Nationality',
                'value'=>$model->personalDetails->nationality??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Contact Person',
                'value'=>$model->personalDetails->contact_person??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Contact Number',
                'value'=>$model->personalDetails->contact_number??'',
            ],

            [
                'attribute'=>'date_apply',
                'label'=>'Date Applied',
                'value'=>$model->personalDetails->date_apply??'',
            ],
        ],
    ]) ?>
  
      <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            // [
            //     'attribute'=>'program_id',
            //     'label'=>'Transaction Number',
            //     'value'=>$model->program0->tbl_transaction_no,
            // ],

            // [
            //     'attribute'=>'program_id',
            //     'label'=>'Program Applied For',
            //      'value'=>$model->program0->program->program_name,
            // ],
            // [
            //     'attribute'=>'program_id',
            //     'label'=>'Program Code',
            //      'value'=>$model->program0->tblProgram->program_code,
            // ],

            // [
            //     'attribute'=>'program_id',
            //     'label'=>'Cost Of Program',
            //      'value'=>$model->program0->tblProgram->amount,
            // ],

            // [
            //     'attribute'=>'program_id',
            //     'label'=>'Qualification',
            //     'value'=>$model->program0->tblQualification->name,
            // ],


            // [
            //     'attribute'=>'voters_id',
            //     'label'=>'ID',
            //     'value'=>$model->personalAddress->voters_id,
            // ],
            // [
            //     'attribute'=>'personal_address_id',
            //     'label'=>'ID Type',
            //     'value'=>$model->personalAddress->votersIdType->name,
            // ],

            // [
            //     'attribute'=>'gps',
            //     'label'=>'GPS',
            //     'value'=>$model->personalAddress->gps,
            // ],

            // [
            //     'attribute'=>'email',
            //     'label'=>'Email',
            //     'value'=>$model->personalAddress->email,
            // ],
        ],
    ]) ?>

  </fieldset>


  <fieldset>
      <legend>Personal Address</legend>
      <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
                'attribute'=>'personal_address_id',
                'label'=>'Address',
                'value'=>$model->personalAddress->address??'',
            ],

            [
                'attribute'=>'personal_address_id',
                'label'=>'City',
                'value'=>$model->personalAddress->city??'',
            ],

            [
                'attribute'=>'personal_address_id',
                'label'=>'Country',
                'value'=>$model->personalAddress->country0->country??'',
            ],
            [
                'attribute'=>'voters_id',
                'label'=>'ID',
                'value'=>$model->personalAddress->voters_id??'',
            ],
            [
                'attribute'=>'personal_address_id',
                'label'=>'ID Type',
                'value'=>$model->personalAddress->votersIdType->name??'',
            ],

            [
                'attribute'=>'gps',
                'label'=>'GPS',
                'value'=>$model->personalAddress->gps??'',
            ],

            [
                'attribute'=>'email',
                'label'=>'Email',
                'value'=>$model->personalAddress->email??'',
            ],
        ],
    ]) ?>

  </fieldset>


</div>
