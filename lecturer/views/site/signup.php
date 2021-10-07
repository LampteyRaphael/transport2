<?php

/* @var $this yii\web\View */

use common\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="row" style="background-color:lightblue; margin-top: -5px;">
        <div class="col-md-4" style="padding-top: 200px;">
            <?= Alert::widget() ?>
            <?php $form = ActiveForm::begin(); ?>
            <div class="text-center">

                <ul class="nav">
                    <li>
                        <div class="text-left">
                            <h4>Are You Applying as A Newly Applicant / Continue Student</h4>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-12 text-left">
                            <input type="radio" name="applicant" id="applicant" value="1">
                            <label for="applicant" class="control-label"><h3>Newly Applicant</h3></label>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-12 text-left">
                            <input type="radio" name="applicant" id="applicant" value="2">
                            <label for="applicant" class="control-label"><h3>Continue Student</h3></label>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Click To Continue The Application', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-8" id="login-body">
        </div>
    </div>
</div>
