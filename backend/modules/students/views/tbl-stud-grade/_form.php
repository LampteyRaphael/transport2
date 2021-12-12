<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudGrade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-stud-grade-form">

<div class="card">
    <div class="card-body">
        <p class="card-text">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'grade_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'from')->Input('number',['maxlength' => true]) ?>
        <?= $form->field($model, 'to')->Input('number',['maxlength' => true]) ?>

        <?= $form->field($model, 'grade_point')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        </p>
    </div>
</div>
   

</div>
