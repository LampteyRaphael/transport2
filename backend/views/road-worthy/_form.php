<?php

use app\models\Vehicles;
use kartik\form\ActiveForm;
use kartik\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>

<div class="road-worthy-form">

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
            ]]); ?>

        <?= $form->field($model, 'renewalDate')->Input('date') ?>

       <?= $form->field($model, 'expiringDate')->Input('date') ?>

        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg float-right']) ?>

    <?php ActiveForm::end(); ?>

</div>
