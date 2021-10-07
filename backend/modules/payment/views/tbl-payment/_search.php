<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblPaymentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-payment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'receipt_no') ?>

    <?= $form->field($model, 'balance') ?>

    <?= $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'admission_id') ?>

    <?php // echo $form->field($model, 'program_id') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
