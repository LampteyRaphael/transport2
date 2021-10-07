<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStRegistration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-st-registration-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stud_Id')->textInput() ?>

    <?= $form->field($model, 'program_id')->textInput() ?>

    <?= $form->field($model, 'acadamic_year')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'semester')->textInput() ?>

    <?= $form->field($model, 'date_o_regis')->textInput() ?>

    <?= $form->field($model, 'courese_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
