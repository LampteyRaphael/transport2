<?php

use frontend\modules\student\models\TblLevel;
use frontend\modules\student\models\TblSemester;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\student\models\TblStRegistration */

$this->title = 'Students Level';
$this->params['breadcrumbs'][] = ['label' => 'Students Level', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-st-registration-level">
    <div class="box">
        <div class="box-body">
        <div class="row  col-md-6 col-md-offset-2">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'method'=>'post', 'action' => Yii::$app->urlManager->createUrl(['/student/levels/create'])]); ?>

<div class="col">
    <?= $form->field($model, 'level')->widget(Select2::className(),[
        'data'=>ArrayHelper::map(TblLevel::find()->asArray()->all(),'name','name'),
        'options'=>['placeholder'=>'Level'],
        'language'=>'en',
        'pluginOptions'=>[
            'allowClear'=>true,
        ]])->label('Level'.'<span class="text-red"> * </span>',['class'=>'label-class','id'=>'Level']); ?>
</div>

<div class="col">
    <?= $form->field($model, 'semester')->widget(Select2::className(),[
        'data'=>ArrayHelper::map(TblSemester::find()->asArray()->all(),'id','name'),
        'options'=>['placeholder'=>'Semester'],
        'language'=>'en',
        'pluginOptions'=>[
            'allowClear'=>true,
        ]])->label('semester'.'<span class="text-red"> * </span>',['class'=>'label-class','id'=>'semester']); ?>
</div>


<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success pull-right']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
        </div>
    </div>
</div>
