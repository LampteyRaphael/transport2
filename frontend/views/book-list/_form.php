<?php


/* @var $this yii\web\View */
/* @var $model common\models\Operations */
/* @var $form yii\widgets\ActiveForm */

use common\models\Drivers;
use common\models\TripStatus;
use common\models\TripTypeStatus;
use common\models\Vehicles;
use kartik\form\ActiveForm;
use kartik\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>

<div class="operations-form">

    <?php $form = ActiveForm::begin([
       'options' => ['enctype' => 'multipart/form-data'],
       'id' => 'login-form-horizontal', 
       'type' => ActiveForm::TYPE_HORIZONTAL,
       'formConfig' => ['labelSpan' => 4, 'deviceSize' => ActiveForm::SIZE_SMALL],
    ]); ?>

<div class="row">
    <div class="col-6">
    <?= $form->field($model, 'vehicle_id')->widget(Select2::className(),[
            'data'=>ArrayHelper::map(Vehicles::find()->asArray()->all(),'id','make'),
            'options'=>['placeholder'=>'Vehicle'],
            'language'=>'en',
            'pluginOptions'=>[
                'allowClear'=>true,
            ]])?>

  
         
        <?= $form->field($model, 'trip_start_location')->textInput(['placeholder'=>'Trip Start Location','maxlength' => true]) ?>
        <?= $form->field($model, 'start_date')->Input('date') ?>
        <?= $form->field($model, 'departureMileage')->textInput(['placeholder'=>'Approx Total KM','maxlength' => true]) ?>
    </div>
    <div class="col-6">
    <?= $form->field($model, 'trip_type')->widget(Select2::className(),[
            'data'=>ArrayHelper::map(TripTypeStatus::find()->asArray()->all(),'id','name'),
            'options'=>['placeholder'=>'Trip Type'],
            'language'=>'en',
            'pluginOptions'=>[
                'allowClear'=>true,
            ]]) ?>
        <?= $form->field($model, 'trip_end_location')->textInput(['placeholder'=>'Trip End Location','maxlength' => true]) ?>

        <?= $form->field($model, 'end_date')->Input('date') ?>
        <?= $form->field($model, 'amount')->Input('number') ?>
    </div>
</div>
    
       
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg float-right mr-5']) ?>

    <?php ActiveForm::end(); ?>

</div>
