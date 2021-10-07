<?php

use backend\modules\courses\models\TblCourse;
use backend\modules\departments\models\TblDepart;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\departments\models\TblCourseDepart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-course-depart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'depart_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblDepart::find()->asArray()->all(),'id','department_name'),
                'options'=>['placeholder'=>'Department'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label('Department'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>

    <?= $form->field($model, 'course_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblCourse::find()->asArray()->all(),'id','courseName'),
                'options'=>['placeholder'=>'Course'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label('Course'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
