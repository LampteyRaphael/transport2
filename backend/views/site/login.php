

        <?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Application';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<div class="site-osn">

    <div class="col text-center">
    <?php echo Html::img('image/logo.png',['width'=>'150','height'=>'70'],['alt' => 'alt image'], ['class' => 'rounded float-left img-responsive']);?>
    </div>   
    <div class="col text-center mt-5">
        <h3 class="text-center"><b>IPS  STUDENTS PORTAL</b></h3>
    </div> 
     <div class="form" style="background-color: lightblue">
<?php
$form = ActiveForm::begin(); ?>
<div class="col-md-lg-12">

 <?= $form->field($model, 'username', $fieldOptions1)->label(false)->textInput(['placeholder' => $model->getAttributeLabel('username'),'class'=>'form-control form-control-lg']) ?>
</div>
<div class="col-md-lg-12">
        <?= $form->field($model, 'password', $fieldOptions2)->label(false)->passwordInput(['placeholder' => $model->getAttributeLabel('password'),'class'=>'form-control form-control-lg']) ?>
</div>
 <div class="col-md-lg-12"><?= Html::submitButton('Sign in', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?></div>


<div class="col-md-lg-12"><?= $form->field($model, 'rememberMe')->checkbox() ?></div>
<?php ActiveForm::end(); ?>
<p class="mb-1">
    <?=Html::a('I forgot my password',['/resetPassword']) ?>
            <!-- <a href="forgot-password.html">I forgot my password</a> -->
        </p>
   </div>
   
</div>






