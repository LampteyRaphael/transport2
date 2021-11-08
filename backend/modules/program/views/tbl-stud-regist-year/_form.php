<?php

use common\models\StudRegisStatus;
use common\models\TblSemester;
use common\models\TblStudAcadamicYear;
use common\models\TblStudRegistYear;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudRegistYear */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-stud-regist-year-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stud_acadamic_year_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblStudAcadamicYear::find()->asArray()->all(),'id','date_of_admission'),
                'options'=>['placeholder'=>'Status'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false);?>


    <?= $form->field($model, 'semester')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblSemester::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>'Semester'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false);?>

    <?= $form->field($model, 'status')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(StudRegisStatus::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>'Status'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
