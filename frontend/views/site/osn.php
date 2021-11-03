<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Application';
?>
<div class="site-osn">

<div class="login-page" style="padding-top: 0%; background-color: lightblue">
    <div class="col text-center">
    <img src="images/download.png" alt="" height="70" width="150">
    <!-- < echo Html::img(Yii::getAlias('@web').'images/download.png',['width'=>'150','height'=>'70'],['alt' => 'alt image'], ['class' => 'rounded float-left img-responsive']);?> -->
    </div>
     <div class="form" style="background-color: lightblue">
<?php
$form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'studOption')->dropdownList([''=>'Choose Option','1'=>'Yes','0'=>'No'])->label('Are You A Former Student?')?>
<div id="opt">
    <?= $form->field($model, 'options')->textInput(['placeholder' => 'Enter Your Student ID','class'=>'form-control form-control-lg'])->label('Enter Your Student ID')?>
</div>
<?= $form->field($model, 'transaction_no')->textInput(['placeholder' => 'Enter OSN Receipt number here','class'=>'form-control form-control-lg'])?>

<?= $form->field($model, 'osn_number')
->textInput(['placeholder' => 'Enter Online Serial Number Here','id'=>'osn','class'=>'form-control form-control-lg'])
->label('ENTER OSN'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
<div class="form-group">
    <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-lg btn-block', 'name' => 'login-button']) ?>
</div>
<?php ActiveForm::end(); ?>
   </div>
</div>

<div class="align-items-center" style="background-color: lightblue">
        <div class="col-md-8 text-center m-auto">
            <p>
                <ul class="navbar-nav">
                    <li class="nav-item"><h7><b>ENQURIES/HELP</b></h7></li>
                    <li class="nav-item"><h7>Admissions Office</h7></li>
                    <li class="nav-item"><h7>Phone 1: 0303-937544M</h7></li>
                    <li class="nav-item"><h7>Phone 2: 0303-937542</h7></li>
                    <li class="nav-item"><h7>Email: admissions@upsamail.edu.gh</h7></li>
                </ul>
            </p>
            <p>
                <ul class="navbar-nav">
                    <li class="nav-item"><h7>School of Graduate Studies</h7></li>
                    <li class="nav-item"><h7>Phone 1: 0303-937547</h7></li>
                    <li class="nav-item"><h7>Phone 2: 024-4570264</h7></li>
                    <li class="nav-item"><h7>Email: sogs@upsamail.edu.gh</h7></li>
                </ul>
            </p>
            <p>
                <ul class="navbar-nav">
                    <li class="nav-item"><h7>Office of Doctoral Programmes</h7></li>
                    <li class="nav-item"><h7>Phone 1: 026-2043555</h7></li>
                    <li class="nav-item"><h7>Phone 2: 026-8222066</h7></li>
                    <li class="nav-item"><h7>Email: odp@upsamail.edu.gh</h7></li>
                </ul>
            </p>
        </div>
    </div>

<script>

    var  options=document.getElementById('opt');
    options.style.display="none";

    var tblosn_studoption = document.getElementById("tblosn-studoption");

    tblosn_studoption.addEventListener('change',function(){

        if(tblosn_studoption.value==1){
            options.style.display="block";
        }
        else
        if(tblosn_studoption.value==0){
            options.style.display="none";
        }
    });

</script>
    
</div>



