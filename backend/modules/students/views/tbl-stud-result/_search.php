<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudResultSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-stud-result-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'program_id') ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'section_id') ?>

    <?php // echo $form->field($model, 'grade_id') ?>

    <?php // echo $form->field($model, 'auth_id') ?>

    <?php // echo $form->field($model, 'course_lecture_id') ?>

    <?php // echo $form->field($model, 'date_of_entry') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
