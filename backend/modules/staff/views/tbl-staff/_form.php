<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\staff\models\TblStaff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-staff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'staff_id')->textInput() ?>

    <?= $form->field($model, 'department_id')->textInput() ?>

    <?= $form->field($model, 'staff_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
