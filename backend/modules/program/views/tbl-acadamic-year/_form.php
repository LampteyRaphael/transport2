<?php

use common\models\TblStatusCategory;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\TblAcadamicYear */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-acadamic-year-form">

    <?php $form = ActiveForm::begin(['action' => Yii::$app->urlManager->createUrl(['program/tbl-acadamic-year/create'])]); ?>

    <div class="col">
    <div class="col-md-2"><b>Date Open Application</b></div>
    <div class="col-md-10">
    <?= $form->field($model, 'date_of_admission')->Input('date')->label(false) ?>
    </div>
    
    </div>

    <div class="col">
    <div class="col-md-2"><b>Date Of Admission</b></div>
    <div class="col-md-10">
    <?= $form->field($model, 'doa')->Input('date')->label(false) ?>
    </div>
    
    </div>

    <div class="col">
    <div class="col-md-2"><b>Date Of Complesion</b></div>
    <div class="col-md-10">
    <?= $form->field($model, 'doc')->Input('date')->label(false) ?>
    </div>
    </div>

    <div class="col">
    <div class="col-md-2"><b>Status</b></div>
    <div class="col-md-10">
    <?= $form->field($model, 'status')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblStatusCategory::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>''],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false)?> 
    </div>
     
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success float-right mr-4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
