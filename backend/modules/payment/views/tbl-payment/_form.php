<?php
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
\kartik\select2\Select2Asset::register($this);

?>
<div class="tbl-payment-form">
    <?php $form = ActiveForm::begin(['action' => Yii::$app->urlManager->createUrl(['/payment/tbl-payment/create'])]); ?>
    <div class="row">

       <div class="col-sm-2">Admitted Applicant</div>
       <div class="col-sm-8">
    
       <?= $form->field($model, 'admission_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map($personal, 'id', function($personal){

                    return $personal->first_name . ' ' . $personal->middle_name . ' ' .  $personal->last_name;
                }),
                'options'=>['placeholder'=>'Select Admitted Applicant Name',],
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
             <?= $form->field($model, 'amount')->Input('number',['placeholder'=>'Enter Admitted Applicant\'s Fees Paid'])->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">Reciept Number</div>
        <div class="col-sm-8">
        <?= $form->field($model, 'receipt_no')->textInput(['placeholder'=>'Enter Admitted Applicant\'s Fees Paid Reciept Number'])->label(false) ?>
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
