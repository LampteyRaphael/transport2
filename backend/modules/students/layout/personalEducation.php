<?php

use common\models\TblEduLevel;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(['fieldConfig' => ['template' => "{label}\n{input}\n{hint}"]]); ?>
<div class="row">
   <div class="col-md-12"><header class="text-center"><h3>Educational Background</h3></header></div>
       <div class="col-md-4">
           <?= $form->field($modeledu, 'institution')->widget(Select2::className(),[
                        'data'=>ArrayHelper::map(TblEduLevel::find()->asArray()->all(),'name','name'),
                        'options'=>['placeholder'=>'Highest Educational Background','disabled'=>true],
                        'language'=>'en',
                        'pluginOptions'=>[
                            'allowClear'=>true,
                        ]])->label('Highest Qualification'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
       </div>
       <div class="col-md-4">
           <?= $form->field($modeledu, 'program_offered')->textInput(['maxlength' => true,'placeholder'=>'Enter Program Offered','disabled'=>true])->label('Program Offered'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
       </div>
       <div class="col-md-4">
           <?= $form->field($modeledu, 'date')->Input('date',['disabled'=>true])->label('Date Completed'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
       </div>
<?php ActiveForm::end(); ?>
</div>
  