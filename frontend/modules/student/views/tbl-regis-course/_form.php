<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblRegisCourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-regis-course-form">

<?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <?= $form->field($model, 'semester_id')->textInput() ?>
    </div>
 <div class="row">
      <?= $form->field($model, 'acadamic_year')->textInput() ?>
</div>
    <div class="row">
          <?= $form->field($model, 'course_id')->textInput() ?>
 </div>
<div class="row">
    <?= $form->field($model, 'stud_regis_id')->Input(['value'=>Yii::$app->user->identity->id]) ?>
</div>
<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

    <?php ActiveForm::end(); ?>

</div>
