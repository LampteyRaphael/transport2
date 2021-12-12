<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudsResult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-studs-result-form">

    <?php $form = ActiveForm::begin(); ?>
 
    <?= $form->field($model, 'class_marks')->textInput() ?>

    <?= $form->field($model, 'exams_marks')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
