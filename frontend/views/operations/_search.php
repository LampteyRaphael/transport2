<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OperationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'vehicle_id') ?>

    <?= $form->field($model, 'driver_id') ?>

    <?= $form->field($model, 'trip_type') ?>

    <?= $form->field($model, 'trip_start_location') ?>

    <?php // echo $form->field($model, 'trip_end_location') ?>

    <?php // echo $form->field($model, 'trip_id') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'departureMileage') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'officerAssigned') ?>

    <?php // echo $form->field($model, 'assignmentCompletionTime') ?>

    <?php // echo $form->field($model, 'arrivalMileage') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
