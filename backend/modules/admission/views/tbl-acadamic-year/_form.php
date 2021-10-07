<?php

use backend\modules\admission\models\TblStatusCategory;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\admission\models\TblAcadamicYear */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-acadamic-year-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_of_admission')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doa')->Input('date') ?>

    <?= $form->field($model, 'doc')->Input('date') ?>

    <?= $form->field($model, 'status')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblStatusCategory::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>'example:ID Type'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label('ID Type'.'<span class="text-red"> * </span>',['class'=>'label-class']);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
