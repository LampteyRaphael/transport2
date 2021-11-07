<?php

use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>
        <div class="row">
        <div class="col-md-12"><header class="text-center"><h3>Current Employment</h3></header></div>
            <div class="col-md-4">
                <?= $form->field($modelemp, 'company_name')->textInput(['maxlength' => true,'placeholder'=>'Enter Company Name','disabled'=>true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($modelemp, 'position')->textInput(['maxlength' => true,'placeholder'=>'Enter Position','disabled'=>true]) ?>
            </div>
            <div class="col-md-4">
                <?=$form->field($modelemp, 'employer_telephone_number')->textInput(['placeholder' => 'Phone Number'])->label('Phone Number' . '<span class="text-red"> * </span>', ['class' => 'label-class'])
                    ->widget('yii\widgets\MaskedInput', [
                        'options'=>['disabled'=>true],
                        'mask' => '999-999-9999'
                    ]);
                ?>
            </div>
            <div class="col-12">
                <?= $form->field($modelemp, 'employer_address')->textarea(['maxlength' => true,'placeholder'=>'Enter Employer Address','rows'=>1,'disabled'=>true]) ?>
            </div>
        </div>

<?php ActiveForm::end(); ?>