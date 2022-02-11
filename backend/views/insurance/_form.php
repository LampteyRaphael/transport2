<?php

use common\models\Vehicles;
use kartik\form\ActiveForm;
use kartik\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>

<div class="insurance-form">

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
            ]])  ?>
    </div>


    <?= $form->field($model, 'renewalDate')->Input('date') ?>

    <?= $form->field($model, 'expiringDate')->Input('date') ?>
    <?= $form->field($model, 'amount')->Input('number') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg float-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
