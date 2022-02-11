<?php


/* @var $this yii\web\View */
/* @var $model common\models\Scrab */
/* @var $form yii\widgets\ActiveForm */

use common\models\Vehicles;
use kartik\form\ActiveForm;
use kartik\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>

<div class="scrab-form">

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
            ]])?>


    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'balance')->textInput() ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg float-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
