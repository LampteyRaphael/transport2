<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblRegisCourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-regis-course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'semester_id')->textInput() ?>

    <?= $form->field($model, 'acadamic_year')->textInput() ?>

    <?= $form->field($model, 'stud_regis_id')->textInput() ?>

    <?= $form->field($model, 'course_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
