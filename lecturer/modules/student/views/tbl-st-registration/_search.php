<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblStRegistrationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-st-registration-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'stud_Id') ?>

    <?= $form->field($model, 'program_id') ?>

    <?= $form->field($model, 'level_id') ?>

    <?= $form->field($model, 'acadamic_year') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'semester') ?>

    <?php // echo $form->field($model, 'section_id') ?>

    <?php // echo $form->field($model, 'date_o_regis') ?>

    <?php // echo $form->field($model, 'courese_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
