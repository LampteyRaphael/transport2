<?php

use common\models\VehicleGroup;
use common\models\VehicleStatus;
use kartik\file\FileInput;
use kartik\form\ActiveForm;
use kartik\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>

<div class="vehicles-form">
    <?php $form = ActiveForm::begin(
        
        [
            'options' => ['enctype' => 'multipart/form-data'],
            'id' => 'login-form-horizontal', 
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'formConfig' => ['labelSpan' => 4, 'deviceSize' => ActiveForm::SIZE_SMALL],
        ]
    ); ?>

    <div class="row"> 

    <div class="col-6">
        <?= $form->field($model, 'make')->textInput(['maxlength'=>true])?>
        <?= $form->field($model, 'regNo')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'chasisNo')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'yearMade')->Input('year') ?>
            <?= $form->field($model, 'purchaseDate')->Input('date') ?>
        <?= $form->field($model, 'engine_no')->Input('text',['maxlength' => true]) ?>
        <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>        
    </div>
    <div class="col-6">
        <?= $form->field($model, 'countryOfOrigin')->textInput(['maxlength' => true]) ?>  
        <?= $form->field($model, 'cubicCentimeter')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'fuel')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'colour')->Input('color',['maxlength' => true]) ?>
        <?= $form->field($model, 'vehicle_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(VehicleGroup::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>'Vehicle'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])  ?>

        <?= $form->field($model, 'no_passengers')->textInput() ?>

        <?= $form->field($model, 'status')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(VehicleStatus::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>'Status'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])  ?>

    </div>



    </div>
   
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg float-right ml-2']) ?>


    <?php ActiveForm::end(); ?>
</div>
