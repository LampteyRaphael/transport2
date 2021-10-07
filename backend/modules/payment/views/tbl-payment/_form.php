<?php

use common\models\TblAppAdmission;
use common\models\TblProgram;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
\kartik\select2\Select2Asset::register($this);

?>
<div class="tbl-payment-form">
    <?php $form = ActiveForm::begin(['action' => Yii::$app->urlManager->createUrl(['/payment/tbl-payment/create'])]); ?>
    <div class="row">

       <div class="col-sm-2">Admission Applicant</div>
       <div class="col-sm-8">
           <?php
           $additional_users = [];
            foreach(TblAppAdmission::find()->all() as $user){
                array_push($additional_users, ['id'=>$user->id, 'admission_id'=>($user->application->personalDetails->title0->name) .' ' . ($user->application->personalDetails->first_name??'') .' '. ($user->application->personalDetails->middle_name??'') .' '. ($user->application->personalDetails->last_name??'')]);
            }
            $users= \yii\helpers\ArrayHelper::map($additional_users, 'id', 'admission_id');           
           ?>
       <?= $form->field($model, 'admission_id')->widget(Select2::className(),[
                'data'=>$users,
                'options'=>['placeholder'=>'',],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false) ?>
        </div>
   </div>
  
    <div class="row">
        <div class="col-sm-2">
             Amount
        </div>
       <div class="col-sm-8">
             <?= $form->field($model, 'amount')->Input('number')->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">Reciept</div>
        <div class="col-sm-8">
        <?= $form->field($model, 'receipt_no')->textInput()->label(false) ?>
        </div>
    </div>
   <div class="row">
       <div class="col-sm-2">Balance</div>
       <div class="col-sm-8">
        <?= $form->field($model, 'balance')->Input('number')->label(false) ?>
        </div>
   </div>
   <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>
  <?= $form->field($model, 'date')->hiddenInput(['value'=>date('Y-m-d')])->label(false) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success float-right  ml-3']) ?>
        <?= Html::submitButton('Close', ['class' => 'btn btn-danger float-right', 'data-dismiss'=>"modal"]) ?> 
    </div>
    <?php ActiveForm::end(); ?>
</div>
