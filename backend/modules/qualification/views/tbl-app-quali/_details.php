<?php

use backend\modules\application\models\App;
use backend\modules\qualification\models\TblAppPersDetails;
use backend\modules\qualification\models\TblAppQualiStatus;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
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
                'value'=>$model->application->personalDetails->title0->name??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'First Name',
                'value'=>$model->application->personalDetails->first_name??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Middle Name',
                'value'=>$model->application->personalDetails->middle_name??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Last Name',
                'value'=>$model->application->personalDetails->last_name??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Gender',
                'value'=>$model->application->personalDetails->gender??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Date Of Birth',
                'value'=>$model->application->personalDetails->date_of_birth??'',
                'format' => ['date', 'php:jS F Y'],
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Nationality',
                'value'=>$model->application->personalDetails->nationality??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Emergency Person',
                'value'=>$model->application->personalDetails->contact_person??'',
            ],

            [
                'attribute'=>'personal_details_id',
                'label'=>'Emergency Contact',
                'value'=>$model->application->personalDetails->contact_number??'',
            ],

            [
                'attribute'=>'date_apply',
                'label'=>'Date Applied',
                'value'=>$model->application->personalDetails->date_apply??'',
            ],

        ],
    ]) ?>

      
  </fieldset>


  <fieldset>
      <legend>Personal Address</legend>
      
     

  
  </fieldset>




</div>
