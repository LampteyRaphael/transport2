<?php

use common\models\Drivers;
use common\models\Vehicles;
use kartik\form\ActiveForm;
use kartik\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>

<div class="accident-records-form">
    <?php $form = ActiveForm::begin([
         'id' => 'login-form-horizontal', 
         'type' => ActiveForm::TYPE_HORIZONTAL,
         'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>
   <?= $form->field($model, 'dateOfIncident')->Input('date') ?>

   <?= $form->field($model, 'vehicle_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(Vehicles::find()->asArray()->all(),'id','make'),
                'options'=>['placeholder'=>'Vehicle'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]]); ?>
    
    <?= $form->field($model, 'driver_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(Drivers::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>'Driver'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]]); ?>
    
        <div class='hidden'>
        <?= $form->field($model, 'nameOfOfficer')->hiddenInput(['value'=>Yii::$app->user->identity->id??''])->label(false) ?>
        </div>

       <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

       <?= $form->field($model, 'actionTaken')->textInput(['maxlength' => true]) ?>    

       <?= $form->field($model, 'policeReport')->textInput(['maxlength' => true]) ?>

       <?= $form->field($model, 'remedy')->textInput(['maxlength' => true]) ?>
    
        <?= Html::submitButton('Save', ['class' => 'btn btn-success float-right']) ?>

    <?php ActiveForm::end(); ?>

</div>
