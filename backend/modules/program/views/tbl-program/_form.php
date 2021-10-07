<?php

use backend\modules\program\models\TblProgramType;
use common\models\TblLevel;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\program\models\TblProgram */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-program-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-2">
            <b>Program Category *</b>
        </div>
        <div class="col-10">
        <?= $form->field($model, 'program_category_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblProgramType::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>'example:ID Type'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false);?>        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <b>Programe Name *</b>
        </div>
        <div class="col-10">
           <?= $form->field($model, 'program_name')->textInput(['maxlength' => true])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <b>Programe Code *</b>
        </div>
        <div class="col-10">
        <?= $form->field($model, 'program_code')->textInput(['maxlength' => true])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <b>Program Level *</b>
        </div>
        <div class="col-10">
        <?= $form->field($model, 'level_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblLevel::find()->asArray()->all(),'id','level_name'),
                'options'=>['placeholder'=>'Program Level'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false);?> 
                </div>
    </div>

    <div class="row">
        <div class="col-2">
            <b>Cost Of The Program</b>
        </div>
        <div class="col-10">
        <?= $form->field($model, 'amount')->textInput() ?>
        </div>
    </div>

    <?= Html::submitButton('Update', ['class' => 'btn btn-success float-right  ml-3']) ?>
    <?php ActiveForm::end(); ?>

</div>
