<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudsResult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-studs-result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->textInput() ?>

    <?= $form->field($model, 'course_id')->textInput() ?>

    <?= $form->field($model, 'semester')->textInput() ?>

    <?= $form->field($model, 'section_id')->textInput() ?>

    <?= $form->field($model, 'class_marks')->textInput() ?>

    <?= $form->field($model, 'exams_marks')->textInput() ?>

    <?= $form->field($model, 'total_marks')->textInput() ?>

    <?= $form->field($model, 'grade_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'date_of_entry')->textInput() ?>

    <?= $form->field($model, 'course_lecture_id')->textInput() ?>

    <?= $form->field($model, 'acadamic_year')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
