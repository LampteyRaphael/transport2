<?php

/* @var $this yii\web\View */

use common\models\TblEduLevel;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

$this->title = 'Application';
?>
<div class="site-education" id="login-body">
    <?php include (Yii::getAlias('@frontend/views/include/progress.php'));?>
    <?php $form = ActiveForm::begin(['fieldConfig' => ['template' => "{label}\n{input}\n{hint}"]]); ?>
   <div class="row">
   <div class="col-md-12"><header class="text-center"><h3>Educational Background</h3></header></div>
       <div class="col-md-4">
           <?= $form->field($model, 'institution')->widget(Select2::className(),[
                        'data'=>ArrayHelper::map(TblEduLevel::find()->asArray()->all(),'name','name'),
                        'options'=>['placeholder'=>'Highest Educational Background'],
                        'language'=>'en',
                        'pluginOptions'=>[
                            'allowClear'=>true,
                        ]])->label('Highest Qualification'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
       </div>
       <div class="col-md-4">
           <?= $form->field($model, 'program_offered')->textInput(['maxlength' => true,'placeholder'=>'Enter Program Offered'])->label('Program Offered'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
       </div>
       <div class="col-md-4">
           <?= $form->field($model, 'date')->Input('date')->label('Date Completed'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
       </div>
   </div>
   <div class="row">
       <div class="col-md-12">
           <?= Html::submitButton('Save And Continue', ['class' => 'btn btn-primary float-right']) ?>
       </div>
   </div>
    <?php ActiveForm::end(); ?>
</div>
<script>
    var program=document.getElementById('program');
         program.classList.add('active');

    // var employment=document.getElementById('employment');
    //     employment.classList.add('active');

    var education=document.getElementById('education');
         education.classList.add('active');

        //  var  pers=document.getElementById('pers');
        //     var  pro=document.getElementById('pro');
        //     var  emp=document.getElementById('emp');
        //     var  edu=document.getElementById('edu');
            // pro.classList.remove('active');
            // pers.classList.remove('active');
            // emp.classList.remove('active');
            // edu.classList.add('active');
</script>
