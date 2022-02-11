<?php

use kartik\form\ActiveForm;
use kartik\helpers\Html;

?>

<div class="drivers-form">

    <?php $form = ActiveForm::begin([
         'options' => ['enctype' => 'multipart/form-data'],
         'id' => 'login-form-horizontal', 
         'type' => ActiveForm::TYPE_HORIZONTAL,
         'formConfig' => ['labelSpan' => 4, 'deviceSize' => ActiveForm::SIZE_SMALL],
    ]); ?>

    <div class="row">
      <div class="col-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tel')->Input('number',['maxlength' => true]) ?>
        <?= $form->field($model, 'license_expire_date')->Input('date') ?>

        <?= $form->field($model, 'date_of_join')->Input('date') ?>

        <?= $form->field($model, 'total_experience')->textInput() ?>

     </div>

     <div class="col-6">
     <?= $form->field($model, 'email')->Input('email',['maxlength' => true]) ?>
     <?= $form->field($model, 'age')->Input('number') ?>

        <?= $form->field($model, 'license_no')->textInput() ?>

        <?= $form->field($model, 'driver_status')->textInput() ?>

        <?= $form->field($model, 'photo')->Input('file') ?>

     </div>
 
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg float-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
