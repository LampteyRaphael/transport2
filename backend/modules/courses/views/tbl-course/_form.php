<?php

use common\models\TblLevel;
use common\models\TblProgram;
use common\models\TblSection;
use common\models\TblSemester;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\modules\courses\models\TblCourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-course-form">

    <?php $form = ActiveForm::begin() ?>
    <div class="row">
        <div class="col-4">
            <b>Course Name</b>
        </div>
        <div class="col-8">
        <?= $form->field($model, 'courseName')->textInput(['maxlength' => true,'placeholder'=>'Course Name'])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <b>Course Code</b>
        </div>
        <div class="col-8">
        <?= $form->field($model, 'course_number')->textInput(['maxlength' => true,'placeholder'=>'Course Code'])->label(false) ?>    
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <b>Course Level *</b>
        </div>
        <div class="col-8">
        <?= $form->field($model, 'level_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblLevel::find()->asArray()->all(),'id','level_name'),
                'options'=>['placeholder'=>'Select Level'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false)?>  
        </div>
    </div>aq`


    <div class="row">
        <div class="col-4">
            <b>Program</b>
        </div>
        <div class="col-8">
        <?= $form->field($model, 'program_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblProgram::find()->asArray()->all(),'id','program_name'),
                'options'=>['placeholder'=>'Program'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false)?>        </div>
    </div>

  <div class="row">
        <div class="col-4">
            <b>Course Semester *</b>
        </div>
        <div class="col-8">
        <?= $form->field($model, 'semester')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblSemester::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>'Semester'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false) ?>
        </div>
    </div>


    <div class="row">
        <div class="col-4">
            <b>Course Sections *</b>
        </div>
        <div class="col-8">
        <?= $form->field($model, 'section_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblSection::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>'Section'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <b>Select Required if is a required course for all students *</b>
        </div>
        <div class="col-8">
        <?= $form->field($model, 'required_courses')->widget(Select2::className(),[
                'data'=>[''=>'Choose Option','1'=>'Required','2'=>'Not Required'],
                'options'=>['placeholder'=>'Option'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <b>Description</b>
        </div>
        <div class="col-8">
        <?= $form->field($model, 'course_description')->textarea(['rows' => 2])->label(false) ?>
        </div>
    </div>

<div class="">
<?= Html::submitButton('Update', ['class' => 'btn btn-success float-right  ml-3']) ?>
</div>

<?php ActiveForm::end(); ?>
<?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger float-right',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
</div>
