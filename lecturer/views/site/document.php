<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Application';
?>
<div class="site-document" id="login-body">
    <?php include (Yii::getAlias('@frontend/views/include/progress.php'))?>
    <?php $form = ActiveForm::begin(["options"=>['enctype'=>'multipart/form-data']]); ?>
        <h1>Documents</h1>
        
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td style="border: none;" class="text-right"> 
                    <b>Certificate</b>
                    </td>
                    <td style="border: none;">
                    <?= $form->field($model, 'doc_name[]')->fileInput()->label(false) ?>
                    </td>
                </tr>

                <tr>
                <td style="border: none;" class="text-right">
                <b>Birth Certificate</b>
                </td>
                    <td style="border: none;">
                    <?= $form->field($model, 'doc_name[]')->fileInput()->label(false) ?>
                    </td>
                </tr>
                <tr>
                <td style="border: none;" class="text-right">
                   <b>Identification ID</b>
                </td>
                    <td style="border: none;">
                    <?= $form->field($model, 'doc_name[]')->fileInput()->label(false) ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="border: none;">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary float-right']) ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<script>
    var program=document.getElementById('program');
    program.classList.add('active');

    var employment=document.getElementById('employment');
    employment.classList.add('active');

    var education=document.getElementById('education');
    education.classList.add('active');

    var documents=document.getElementById('document');
    documents.classList.add('active');

    var  pers=document.getElementById('pers');
    var  pro=document.getElementById('pro');
    var  emp=document.getElementById('emp');
    var  doc=document.getElementById('doc');
    // pro.classList.remove('active');
    // pers.classList.remove('active');
    // emp.classList.remove('active');
    // doc.classList.add('active');
</script>
