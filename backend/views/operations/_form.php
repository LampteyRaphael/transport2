<?php


/* @var $this yii\web\View */
/* @var $model common\models\Operations */
/* @var $form yii\widgets\ActiveForm */

use common\models\Drivers;
use common\models\TripStatus;
use common\models\TripTypeStatus;
use common\models\User;
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
        <?php if($model->id !== null):?>
            <span id='tripcancel'>
            <?= $form->field($model, 'trip_cancelled')->textarea(['id'=>'tripcancel']) ?>
            </span>
        <?php endif;?>

    </div>
    <div class="col-6">
    <?= $form->field($model, 'driver_id')->widget(Select2::className(),[
        'data'=>ArrayHelper::map(Drivers::find()->asArray()->all(),'id','name'),
        'options'=>['placeholder'=>'Driver'],
        'language'=>'en',
        'pluginOptions'=>[
            'allowClear'=>true,
        ]])?>
        <?= $form->field($model, 'trip_start_location')->textInput(['placeholder'=>'Trip Start Location','maxlength' => true]) ?>

        <?= $form->field($model, 'start_date')->Input('date') ?>
        
        <?= $form->field($model, 'departureMileage')->textInput(['placeholder'=>'Approx Total KM','maxlength' => true]) ?>

        

<?php if(strtolower($model->trip->name??'') == "completed"):?>
                <?= $form->field($model, 'trip_id')->widget(Select2::className(),[
                    'data'=>ArrayHelper::map(TripStatus::find()->asArray()->all(),'id','name'),
                    'options'=>['placeholder'=>'Trip Status','disabled'=>'disabled'],
                    'language'=>'en',
                    'pluginOptions'=>[
                        'allowClear'=>true,
                    ]]) ?>
            <?php else:?>
                <?= $form->field($model, 'trip_id')->widget(Select2::className(),[
                    'data'=>ArrayHelper::map(TripStatus::find()->asArray()->all(),'id','name'),
                    'options'=>['placeholder'=>'Trip Status','onchange'=>"return myScript(this.value)"],
                    'language'=>'en',
                    'pluginOptions'=>[
                        'allowClear'=>true,
                    ]]) ?>
        <?php endif;?>
                          
        <?= $form->field($model, 'arrivalMileage')->hiddenInput(['maxlength' => true])->label(false) ?>
        <?php if($model->id !==null):?>
        <?php endif;?>

    </div>
</div>
    
<?= $form->field($model, 'arrivalMileage')->hiddenInput(['maxlength' => true])->label(false) ?>
        <?php if(strtolower($model->trip->name??'') == "completed"):?>
            <?php else:?>
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg float-right mr-5']) ?>
        <?php endif;?>

    <?php ActiveForm::end(); ?>

</div>

<script>
    var tripcancel=document.getElementById('tripcancel');
    tripcancel.style.display="none";
    function myScript(val){
       if(val=='2' || val=='4'){
        tripcancel.style.display="block";
       }else{
        tripcancel.style.display="none";
       }
    }
</script>
