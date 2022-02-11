<?php

use app\models\Drivers;
use app\models\Vehicles;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Servicings */
/* @var $form yii\widgets\ActiveForm */
$this->title="Cost Of Servicing Vehicle";
?>

<div class="servicings-form">
    <div class="box box-solid box-primary">
        <div class="box-body">
                <?php $form = ActiveForm::begin(); ?>
                <div class="col-md-8">
                <?= $form->field($model,'amount')->textInput() ?>
                </div>

                <div class="col-md-12" hidden>
                <?= $form->field($model,'dateReturned')->hiddenInput(['value'=>date('Y-m-d')]) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success pull-right']) ?>
                </div>
                <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
