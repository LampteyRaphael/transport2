<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblOsn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-osn-form">

<!-- OSN FORM TO CREATE -->
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
          OSN Number
        </div>
        <div class="col-md-8">
        <?= $form->field($model, 'osn_number')->textInput()->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            Status
        </div>
        <div class="col-md-8">
        <?= $form->field($model, 'status')->textInput()->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            Year
        </div>
        <div class="col-md-8">
        <?= $form->field($model, 'year')->textInput(['maxlength' => true])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            Transaction Number
        </div>
        <div class="col-md-8">
        <?= $form->field($model, 'transaction_no')->textInput(['maxlength' => true])->label(false) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <!-- END OF OSN FORM TO CREATE -->
</div>
