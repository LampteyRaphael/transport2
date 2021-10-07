<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudAcadYear */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-stud-acad-year-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_of_admission')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
