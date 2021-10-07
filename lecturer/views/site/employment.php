<?php

/* @var $this yii\web\View */
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;


$this->title = 'Employment';
?>
    <div class="site-employment">
        <?php include (Yii::getAlias('@frontend/views/include/progress.php'));?>
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                <div class="col-md-12"><header class="text-center"><h3>Current Employment</h3></header></div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'company_name')->textInput(['maxlength' => true,'placeholder'=>'Enter Company Name']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'position')->textInput(['maxlength' => true,'placeholder'=>'Enter Position']) ?>
                    </div>
                    <div class="col-md-4">
                        <?=$form->field($model, 'employer_telephone_number')->textInput(['placeholder' => 'Phone Number'])->label('Phone Number' . '<span class="text-red"> * </span>', ['class' => 'label-class'])
                            ->widget('yii\widgets\MaskedInput', [
                                'mask' => '999-999-9999'
                            ]);
                        ?>
                    </div>
                    <div class="col-12">
                        <?= $form->field($model, 'employer_address')->textarea(['maxlength' => true,'placeholder'=>'Enter Employer Address','rows'=>3,'cols'=>2,]) ?>
                    </div>
                    <div class="col-12">
                        <?= Html::submitButton('Save And Continue', ['class' => 'btn btn-primary float-right']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        <script>
            var  program=document.getElementById('program');
            program.classList.add('active');

            var education=document.getElementById('education');
            education.classList.add('active');
            
            var employment=document.getElementById('employment');
            employment.classList.add('active');
        </script>

