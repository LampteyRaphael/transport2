<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\student\models\TblCourse */
/* @var $form ActiveForm */
?>
<div class="student-create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'courseName') ?>
        <?= $form->field($model, 'course_number') ?>
        <?= $form->field($model, 'level') ?>
        <?= $form->field($model, 'section_id') ?>
        <?= $form->field($model, 'program_id') ?>
        <?= $form->field($model, 'date') ?>
        <?= $form->field($model, 'required_courses') ?>
        <?= $form->field($model, 'semester') ?>
        <?= $form->field($model, 'course_description') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'updated_at') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- student-create -->
