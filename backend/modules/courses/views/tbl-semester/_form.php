<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>

<div class="tbl-semester-form">
    <?php $form = ActiveForm::begin(['action' => Yii::$app->urlManager->createUrl(['courses/tbl-semester/create'])]); ?>

    <div class="row">
        <div class=" col-md-2">
            Create New Semester
        </div>
        <div class=" col-md-8">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?>
        </div>
    </div>

    <div class="form-group col-md-8">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg float-right ']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
