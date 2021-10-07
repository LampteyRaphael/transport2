<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudGrade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-stud-grade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'grade_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grade_point')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
