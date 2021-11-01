<?php

use common\models\AuthItem;
use common\models\TblCountry;
use common\models\TblDepart;
use common\models\TblProgram;
use common\models\TblRole;
use common\models\TblStaffCategory;
use common\models\TblStatusCategory;
use common\models\TblTitleTb;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\user\models\TblUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-user-form">
<!-- ['action' => Yii::$app->urlManager->createUrl(['/user/tbl-user/create'])] -->
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-2">Title</div>
        <div class="col-md-8">
        <?= $form->field($staff, 'title')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(TblTitleTb::find()->all(),'id','name'),
                'language' => 'en',
                'options' => ['placeholder' => 'title'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false); ?>
         </div>
    </div>
    <div class="row">
        <div class="col-md-2">Surename</div>
        <div class="col-md-8">
        <?= $form->field($staff, 'surname')->textInput(['placeholder' => 'surname'],['maxlength' => true])->label(false);  ?>
         </div>
    </div>
    <div class="row">
        <div class="col-md-2">Middle Name</div>
        <div class="col-md-8">
        <?= $form->field($staff, 'middle_name')->textInput(['placeholder' => 'middle name'],['maxlength' => true])->label(false);  ?>
         </div>
    </div>
    <div class="row">
        <div class="col-md-2">First Name</div>
        <div class="col-md-8">
        <?= $form->field($staff, 'first_name')->textInput(['placeholder' => 'first name'],['maxlength' => true])->label(false);  ?>
         </div>
    </div>
    <div class="row">
        <div class="col-md-2">Date Of Birth</div>
        <div class="col-md-8">
        <?= $form->field($staff, 'date_of_birth')->Input('date',['maxlength' => true],['placeholder' => 'date of birth'])->label(false);  ?>
         </div>
    </div>
    <div class="row">
        <div class="col-md-2">City</div>
        <div class="col-md-8">
        <?= $form->field($staff, 'city')->textInput(['placeholder' => 'city'],['maxlength' => true])->label(false);  ?>
         </div>
    </div>
    <div class="row">
        <div class="col-md-2">Country</div>
        <div class="col-md-8">
        <?= $form->field($staff, 'country')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(TblCountry::find()->all(),'id','country'),
                'language' => 'en',
                'options' => ['placeholder' => 'country'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false); ?>
         </div>
    </div>
    <div class="row">
        <div class="col-md-2">Email</div>
        <div class="col-md-8">
        <?= $form->field($model, 'email')->textInput(['placeholder' => 'email'],['maxlength' => true])->label(false);  ?>
         </div>
    </div>
    <div class="row">
        <div class="col-md-2">Rank</div>
        <div class="col-md-8">
        <?= $form->field($staff, 'ranks')->textInput(['placeholder' => 'ranks'],['maxlength' => true])->label(false);   ?>
         </div>
    </div>
    <div class="row">
        <div class="col-md-2">Date Employed</div>
        <div class="col-md-8">
        <?= $form->field($staff, 'doa')->Input('date',['placeholder' => 'date employed'],['maxlength' => true])->label(false);   ?>
         </div>
    </div>
    <div class="row">
        <div class="col-md-2">Phone Number</div>
        <div class="col-md-8">
        <?= $form->field($staff, 'telephone_number')->Input('number',['placeholder' => 'phone number'],['maxlength' => true])->label(false);   ?>
         </div>
    </div>

    <div class="row">
        <div class="col-md-2">Staff Category</div>
        <div class="col-md-8">
        <?= $form->field($staff, 'staff_category_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(TblStaffCategory::find()->all(),'id','name'),
                'language' => 'en',
                'options' => ['placeholder' => 'staff category'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);  
            ?>
         </div>
    </div>
    <div class="row">
        <div class="col-md-2">Department</div>
        <div class="col-md-8">
        <?= $form->field($staff, 'depart_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(TblDepart::find()->all(),'id','department_name'),
                'language' => 'en',
                'options' => ['placeholder' => 'department'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);  
             ?>
         </div>
    </div>

    <div class="row">
        <div class="col-md-2">Programme</div>
        <div class="col-md-8">
        <?= $form->field($staff, 'program_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(TblProgram::find()->all(),'id','program_name'),
                'language' => 'en',
                'options' => ['placeholder' => 'programme'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);  
             ?>
         </div>
    </div>
   
    <div class="row">
        <div class="col-md-2">System Role</div>
        <div class="col-md-8">
            <?= $form->field($model, 'role_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(AuthItem::find()->where(['type'=>1])->asArray()->all(),'name','name'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'role'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); 
                ?>
         </div>
    </div>
   
    <div class="row">
        <div class="col-md-2">Photo</div>
        <div class="col-md-8">
            <?= $form->field($model, 'photo')->fileInput(['maxlength' => true])->label(false);  ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">Permissions</div>
        <div class="col-md-8">
            <?= $form->field($model, 'name[]')->checkboxList(ArrayHelper::map(AuthItem::find()->where(['type'=>2])->asArray()->all(),'name','name'))->label(false); ?>
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
