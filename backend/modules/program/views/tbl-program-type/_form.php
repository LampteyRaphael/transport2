<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\program\models\TblProgramType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-program-type-form">

<div class="card">
    <div class="card-header bg-primary">
        Programme Category
    </div>
    <div class="card-body">
        <p class="card-text">
            <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
            <?php ActiveForm::end(); ?>
        </p>
    </div>
    <div class="card-footer">
        
    </div>
</div>
</div>
