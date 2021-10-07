<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
?>

<div class="tbl-section-form">
    <?php $form = ActiveForm::begin(['action'=>Yii::$app->urlManager->createUrl('/courses/tbl-section/create')]); ?>

    <div class="row">
        <div class=" col-md-2">
            Create New Section
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
