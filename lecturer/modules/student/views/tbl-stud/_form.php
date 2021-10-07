<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\student\models\TblStud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-stud-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'personal_details_id')->textInput() ?>

    <?= $form->field($model, 'personal_address_id')->textInput() ?>

    <?= $form->field($model, 'personal_education_id')->textInput() ?>

    <?= $form->field($model, 'personal_employment_id')->textInput() ?>

    <?= $form->field($model, 'personal_document_id')->textInput() ?>

    <?= $form->field($model, 'application_type')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'program_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
