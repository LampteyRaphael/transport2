<?php
 use common\models\TblCountry;
 use common\models\TblTitleTb;
 use kartik\select2\Select2;
 use yii\helpers\ArrayHelper;
use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(["options"=>['enctype'=>'multipart/form-data']]) ?>
<div class="row">
        <div class="col-md-12">
            <header class="text-center"><h3>Personal Information</h3></header>
            <div class="float-right">
                <?= Html::img(Yii::$app->request->baseUrl.'../../../application/images/'.$modelp->photo ,['width' => 100 ,'height' => 100])?>   
            </div>
        </div>
            <div class="col-md-2">
                <?php
                    $op=['mr'=>'Mr','mrs'=>'Mrs'];?>
                <?= $form->field($modelp, 'title')->widget(
                    Select2::className(),[
                    'data'=>ArrayHelper::map(TblTitleTb::find()->asArray()->all(),'id','name'),
                    'options'=>['placeholder'=>'Title','disabled' => true],
                    'language'=>'en',
                    'pluginOptions'=>[
                        'allowClear'=>true,
                    ]
                ])->label('Title'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($modelp, 'first_name')->textInput(['maxlength' => true,'placeholder'=>'Enter  first name','disabled'=> true],['class'=>'form-group form-group-lg'])->label('First Name'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($modelp, 'middle_name')->textInput(['maxlength' => true,'placeholder'=>'Enter  middle name','disabled'=> true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($modelp, 'last_name')->textInput(['maxlength' => true,'placeholder'=>'Enter  Last Name','disabled'=> true])->label('Last Name'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($modelp, 'gender')->widget(Select2::className(),[
                    'data'=>['male'=>'Male','female'=>'Female'],
                    'options'=>['placeholder'=>'Title','disabled' => true],
                    'language'=>'en',
                    'pluginOptions'=>[
                        'allowClear'=>true,
                    ]])->label('Gender'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($modelp, 'date_of_birth')->Input('date',['placeholder'=>'YY-MM-dd','disabled'=> true])->label('Date Of Birth'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($modelp, 'nationality')->widget(Select2::className(),[
                    'data'=>ArrayHelper::map(TblCountry::find()->asArray()->all(),'country','country'),
                    'value'=>['ghana','ghana'],
                    'options'=>['placeholder'=>'Nationality','disabled'=> true,],
                    'language'=>'en',
                    'pluginOptions'=>[
                        'allowClear'=>true,
                    ]])->label('Nationality'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
            </div>
    </div>