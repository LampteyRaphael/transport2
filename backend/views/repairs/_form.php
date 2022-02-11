<?php

use app\models\Drivers;
use app\models\Vehicles;
use common\models\Validate;
use kartik\form\ActiveForm;
use kartik\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

$vahicleDescription=new Validate();
?>

<div class="repairs-form">

    <?php $form = ActiveForm::begin([
           'id' => 'login-form-horizontal', 
           'type' => ActiveForm::TYPE_HORIZONTAL,
           'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

<?= $form->field($model, 'vehicle_id')->widget(Select2::className(),[
        'data'=>ArrayHelper::map(Vehicles::find()->asArray()->all(),'id','make'),
        'options'=>['placeholder'=>'Vehicle'],
        'language'=>'en',
        'pluginOptions'=>[
            'allowClear'=>true,
        ]]) ?>
        
<?= $form->field($model, 'driver_id')->widget(Select2::className(),[
            'data'=>ArrayHelper::map(Drivers::find()->asArray()->all(),'id','name'),
            'options'=>['placeholder'=>'Driver'],
            'language'=>'en',
            'pluginOptions'=>[
                'allowClear'=>true,
            ]])?>
   
<?= $form->field($model, 'description')->widget(Select2::className(),[
                'data'=>$vahicleDescription->vehiclesServices(),
                'options'=>['placeholder'=>'Description'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]]);?>

<?= $form->field($model, 'amount')->textInput()?>

<?= $form->field($model, 'garageName')->textInput(['maxlength' => true])?>



    <?= $form->field($model, 'datePresented')->hiddenInput(['value'=>date('Y-m-d')])->label(false)?>


<?= $form->field($model, 'officerAssigned')->hiddenInput(['value'=>Yii::$app->user->identity->id??''])->label(false)?>



    <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg float-right']) ?>

    <?php ActiveForm::end(); ?>

</div>
