<?php


/* @var $this yii\web\View */
/* @var $model common\models\TblLevel */
/* @var $form yii\widgets\ActiveForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

?>

<div class="tbl-level-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class=" col-md-2">
            Create New Level
        </div>
        <div class=" col-md-8">
        <?= $form->field($model, 'level_name')->textInput(['maxlength' => true])->label(false) ?>
        </div>
      
    </div>

    <div class="form-group col-md-8">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg float-right ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
