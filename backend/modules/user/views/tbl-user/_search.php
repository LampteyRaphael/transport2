<?php

use backend\modules\user\models\TblAuthItem;
use backend\modules\user\models\TblRole;
use backend\modules\user\models\TblStatusCategory;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use function PHPSTORM_META\map;

/* @var $this yii\web\View */
/* @var $model backend\modules\user\models\TblUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-user-search">
<h5>Field Mark (*) is required</h5>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'method'=>'post','action' => Yii::$app->urlManager->createUrl(['user/tbl-user/create'])]); ?>
   
    <?= $form->field($model, 'username')->label('Username'.'<span class="text-red"> * </span>',['class'=>'label-class']) ?>

    <?= $form->field($model, 'email')->label('Email'.'<span class="text-red"> * </span>',['class'=>'label-class']) ?>

    <?= $form->field($model, 'status')->widget(Select2::className(),[
        'data'=>ArrayHelper::map(TblStatusCategory::find()->asArray()->all(),'id','name'),
        'options'=>['placeholder'=>'Status'],
        'language'=>'en',
        'pluginOptions'=>[
            'allowClear'=>true,
        ]
    ])->label('Status'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>

    <?= $form->field($model, 'role_id')->widget(Select2::className(),[
        'data'=>ArrayHelper::map(TblRole::find()->asArray()->all(),'id','name'),
        'options'=>['placeholder'=>'Select Role'],
        'language'=>'en',
        'pluginOptions'=>[
            'allowClear'=>true,
        ]
    ])->label('Role'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>

    <?= $form->field($model, 'password_hash') ?>

    <div class="row">
       <div class="col-md-12">
          <?= $form->field($model, 'name[]')->checkboxList(ArrayHelper::map(TblAuthItem::find()->asArray()->all(),'name','name')) ?>
       </div>
       </div>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-danger pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
