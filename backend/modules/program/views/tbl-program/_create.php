<?php



/* @var $this yii\web\View */
/* @var $model backend\modules\program\models\TblProgram */
/* @var $form yii\widgets\ActiveForm */

use common\models\TblLevel;
use common\models\TblProgramType;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

?>

<div class="tbl-program-form">

    <?php $form = ActiveForm::begin(['action' => Yii::$app->urlManager->createUrl(['program/tbl-program/create'])]); ?>
    <div class="row">
        <div class="col-4">
            <b>Program Category *</b>
        </div>
        <div class="col-8">
        <?= $form->field($model, 'program_category_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblProgramType::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>''],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false);?>        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <b>Programe Name *</b>
        </div>
        <div class="col-8">
           <?= $form->field($model, 'program_name')->textInput(['maxlength' => true])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <b>Programe Code *</b>
        </div>
        <div class="col-8">
        <?= $form->field($model, 'program_code')->textInput(['maxlength' => true])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <b>Program Level *</b>
        </div>
        <div class="col-8">
        <?= $form->field($model, 'level_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblLevel::find()->asArray()->all(),'id','level_name'),
                'options'=>['placeholder'=>''],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false);?> 
                </div>
    </div>

    <div class="row">
        <div class="col-4">
            <b>Program Cost</b>
        </div>
        <div class="col-8">
        <?= $form->field($model, 'amount')->textInput()->label(false) ?>
        </div>
    </div>

    <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg float-right  ml-3']) ?>
    <?php ActiveForm::end(); ?>

</div>
