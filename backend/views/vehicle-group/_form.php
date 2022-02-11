<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-1">Vehicle Group</div>
            <div class="col-md-8">
               <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?>
            </div>
            <div class="col-md-1">
            <div class="form-group">
                 <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
            </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
