<?php

use common\models\AuthItem;
use common\models\TblRole;
use common\models\TblStatusCategory;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\user\models\TblUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-user-form">

    <?php $form = ActiveForm::begin(['action' => Yii::$app->urlManager->createUrl(['/user/tbl-user/create'])] ); ?>
    <div class="row">
        <div class="col-md-2">Username</div>
        <div class="col-md-8">
             <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label(false); ?>
         </div>
    </div>


    <div class="row">
        <div class="col-md-2">Email</div>
        <div class="col-md-8">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(false); ?>
         </div>
    </div>

    <div class="row">
        <div class="col-md-2">Status</div>
        <div class="col-md-8">
            <?= 
            $form->field($model, 'status')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(TblStatusCategory::find()->all(),'id','name'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a state ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false); 
            ?>
         </div>
    </div>

    <div class="row">
        <div class="col-md-2">Role</div>
        <div class="col-md-8">
            <?= 
                $form->field($model, 'role_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(TblRole::find()->asArray()->all(),'id','name'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select a state ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); 
                ?>
         </div>
    </div>

    <div class="row">
        <div class="col-md-2">Password</div>
        <div class="col-md-8">
            <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true])->label(false); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-2">Permissions</div>
        <div class="col-md-8">
            <?= $form->field($model, 'name[]')->checkboxList(ArrayHelper::map(AuthItem::find()->asArray()->all(),'name','name'))->label(false); ?>
         </div>
    </div>

    <div class="row">
        <div class="col">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success float-right mr-5 btn-lg']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger float-right mr-2 btn-lg',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
            ]) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>

</div>
