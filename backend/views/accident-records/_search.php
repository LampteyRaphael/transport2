<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccidentRecordsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accident-records-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'dateOfIncident') ?>

    <?= $form->field($model, 'driver_id') ?>

    <?= $form->field($model, 'nameOfOfficer') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'actionTaken') ?>

    <?php // echo $form->field($model, 'policeReport') ?>

    <?php // echo $form->field($model, 'remedy') ?>

    <?php // echo $form->field($model, 'vehicle_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
