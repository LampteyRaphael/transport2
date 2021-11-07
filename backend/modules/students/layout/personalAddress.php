<?php

use common\models\TblCountry;
use common\models\TblVotersType;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

?>
<div class="row">
        <div class="col-md-4">
            <?= $form->field($modelad, 'voters_id_type')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblVotersType::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>'example:ID Type','disabled'=> true],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label('ID Type'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($modelad, 'voters_id')->textInput(['maxlength' => true,'placeholder'=>'example:ID Number','disabled'=> true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($modelp, 'contact_person')->textInput(['placeholder'=>'Emergency Person','disabled'=> true])->label('Emergency Person'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
        </div>
    </div>
    <div class="row">
        
        <div class="col-md-4">
            <?= $form->field($modelp, 'contact_number')->textInput(['placeholder'=>'Emergency Number','disabled'=> true])->label('Emergency Number'.'<span class="text-red"> * </span>',['class'=>'label-class'])
                ->widget('yii\widgets\MaskedInput', [
                    'options'=>['disabled'=> true],
                    'mask' => '999-999-9999'
                ]);
            ?>
        </div>
    </div>
    <div class="col-md-12"><header class="text-center"><h3>Personal Address</h3></header></div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($modelad, 'address')->textInput(['maxlength' => true,'placeholder'=>'Enter  Address','rows'=>10,'cols'=>70,'disabled'=> true])->label('Postal/Residential Address'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($modelad, 'email')->textInput(['maxlength' => true,'placeholder'=>'Enter  Email','disabled'=> true])->label('Email'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($modelad, 'gps')->textInput(['maxlength' => true,'placeholder'=>'Enter Code','disabled'=> true])->label('Postal Code'.'<span class="text-red"> </span>',['class'=>'label-class']);  ?>
        </div>

        
    </div>
    <div class="row">
    <div class="col-md-4">
            <?= $form->field($modelad, 'country')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblCountry::find()->asArray()->all(),'id','country'),
                'value'=>['ghana','ghana'],
                'options'=>['placeholder'=>'Country','disabled' => true],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label('Country'.'<span class="text-red"> * </span>',['class'=>'label-class','id'=>'country']); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($modelad, 'city')->textInput(['maxlength' => true,'placeholder'=>'Enter City','disabled'=> true])->label('City'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($modelad, 'telephone_number')->Input('number',['disabled'=> true])
                ->label('Phone Number'.'<span class="text-red"> * </span>',['class'=>'label-class custom-select-lg'])
                ->widget('yii\widgets\MaskedInput', [
                  'options'=>['disabled'=> true],
                    'mask' => '999-999-9999'
                ]);
            ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

