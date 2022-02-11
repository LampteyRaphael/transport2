<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehiclesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'make') ?>

    <?= $form->field($model, 'regNo') ?>

    <?= $form->field($model, 'chasisNo') ?>

    <?= $form->field($model, 'yearMade') ?>

    <?php // echo $form->field($model, 'purchaseDate') ?>

    <?php // echo $form->field($model, 'colour') ?>

    <?php // echo $form->field($model, 'countryOfOrigin') ?>

    <?php // echo $form->field($model, 'cubicCentimeter') ?>

    <?php // echo $form->field($model, 'fuel') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
