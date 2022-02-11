<?php
use common\models\ActiveStatus;
use kartik\form\ActiveForm;
use kartik\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
?>

<div class="user-form">
    <?php $form = ActiveForm::begin([
       'options' => ['enctype' => 'multipart/form-data'],
       'id' => 'login-form-horizontal', 
       'type' => ActiveForm::TYPE_HORIZONTAL,
       'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL],
    ]); ?>

    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'photo')->fileInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
        <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

        <?php if($model->password !==null):?>
            <?php else:?>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        <?php endif;?>
        <?= $form->field($model, 'status')->widget(Select2::className(),[
            'data'=>ArrayHelper::map(ActiveStatus::find()->asArray()->all(),'id','name'),
            'options'=>['placeholder'=>'Vehicle'],
            'language'=>'en',
            'pluginOptions'=>[
                'allowClear'=>true,
            ]])?>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary float-right btn-lg']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
