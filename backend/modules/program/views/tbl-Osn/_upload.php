<div class="card">
    <div class="card-body">
        <p class="card-text">
            <?php

            use yii\bootstrap4\ActiveForm;
            use yii\bootstrap4\Html;

            $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'action' => Yii::$app->urlManager->createUrl(['/program/tbl-osn/upload'])]);?>
            <div class="row">
                    <div class="col-md-3">
                    <?= $form->field($model, 'file')->fileInput()->label(false);?>
                    </div>
                    <div class="col-md-6">
                    <?= Html::submitButton('Save Upload', ['class' => 'btn btn-primary']) ?>
                    </div>
            </div>
            <?php ActiveForm::end(); ?>
        </p>
    </div>
   
</div>