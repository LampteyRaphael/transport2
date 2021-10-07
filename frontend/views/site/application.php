<?php
use common\models\TblCountry;
use common\models\TblTitleTb;
use common\models\TblVotersType;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

// use yii\bootstrap\ActiveForm;
// use yii\helpers\ArrayHelper;
// use yii\bootstrap\Html;
$this->title = 'Application';
?>
<div class="site-application">
    <?php include (Yii::getAlias('@frontend/views/include/progress.php'))?>
 <?php $form = ActiveForm::begin(["options"=>['enctype'=>'multipart/form-data']]) ?>
 <div class="row">
         <div class="col-md-12">
             <header class=" marg"><h3>Personal Information</h3></header>
        </div>
        <div class="col-md-12 p-lg-0 m-0">
            <img id="logo" style="margin-right:200px; " src="https://via.placeholder.com/150" class="thumbnail rounded img-fluid float-right" height="130" width="130">
        </div>
        <div class="col-md-12 p-lg-0 m-0">
            <?= $form->field($modelp, 'photo')->Input('file',['style'=>'margin-bottom:40px','class'=>'float-right',"onchange"=>"document.getElementById('logo').src=window.URL.createObjectURL(this.files[0])"])->label(false); ?>
        </div>
 </div>
 <div class="row">
                <div class="col-md-2">
                    <?php $op=['mr'=>'Mr','mrs'=>'Mrs'];?>
                    <?= $form->field($modelp, 'title')->widget(
                         Select2::className(),[
                        'data'=>ArrayHelper::map(TblTitleTb::find()->asArray()->all(),'id','name'),
                        'options'=>['placeholder'=>'Title'],
                        'language'=>'en',
                        'pluginOptions'=>[
                            'allowClear'=>true,
                        ]
                    ])->label('Title'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($modelp, 'first_name')->textInput(['maxlength' => true,'placeholder'=>'Enter  first name'],['class'=>'form-group form-group-lg'])->label('First Name'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($modelp, 'middle_name')->textInput(['maxlength' => true,'placeholder'=>'Enter  middle name']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($modelp, 'last_name')->textInput(['maxlength' => true,'placeholder'=>'Enter  Last Name'])->label('Last Name'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
                </div>
            
                <div class="col-md-2">
                    <?= $form->field($modelp, 'gender')->widget(Select2::className(),[
                        'data'=>['male'=>'Male','female'=>'Female'],
                        'options'=>['placeholder'=>'Select gender'],
                        'language'=>'en',
                        'pluginOptions'=>[
                            'allowClear'=>true,
                        ]])->label('Gender'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($modelp, 'date_of_birth')->Input('date',['placeholder'=>'YY-MM-dd'])->label('Date Of Birth'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($modelp, 'nationality')->widget(Select2::className(),[
                        'data'=>ArrayHelper::map(TblCountry::find()->asArray()->all(),'country','country'),
                        'value'=>['ghana','ghana'],
                        'options'=>['placeholder'=>'Nationality'],
                          'theme'=>Select2::THEME_BOOTSTRAP,
                        //   'position'=>'float-left',
                        'language'=>'en',
                        'pluginOptions'=>[
                            'allowClear'=>true,
                        ]]); ?>
                </div>
          
       
    <div class="col-md-4">
        <?= $form->field($modelad, 'voters_id_type')->widget(Select2::className(),[
            'data'=>ArrayHelper::map(TblVotersType::find()->asArray()->all(),'id','name'),
            'options'=>['placeholder'=>'example:ID Type'],
            'language'=>'en',
            'pluginOptions'=>[
                'allowClear'=>true,
            ]])->label('ID Type'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($modelad, 'voters_id')->textInput(['maxlength' => true,'placeholder'=>'example:ID Number']) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($modelp, 'contact_person')->textInput(['placeholder'=>'Emergency Person'])->label('Emergency Person'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
    </div>
</div>
<div class="row">
    
    <div class="col-md-4">
        <?= $form->field($modelp, 'contact_number')->textInput(['placeholder'=>'Emergency Number'])->label('Emergency Number'.'<span class="text-red"> * </span>',['class'=>'label-class'])
            ->widget('yii\widgets\MaskedInput', [
                'mask' => '999-999-9999'
            ]);
        ?>
    </div>
</div>
<div class="col-md-12"><header class="text-center"><h3>Personal Address</h3></header></div>

<div class="row">
    <div class="col-md-4">
        <?= $form->field($modelad, 'address')->textInput(['maxlength' => true,'placeholder'=>'Enter  Address','rows'=>10,'cols'=>70,])->label('Postal/Residential Address'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($modelad, 'email')->textInput(['maxlength' => true,'placeholder'=>'Enter  Email'])->label('Email'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($modelad, 'gps')->textInput(['maxlength' => true,'placeholder'=>'Enter Code'])->label('Postal Code'.'<span class="text-red"> </span>',['class'=>'label-class']);  ?>
    </div>

    
</div>
<div class="row">
<div class="col-md-4">
        <?= $form->field($modelad, 'country')->widget(Select2::className(),[
            'data'=>ArrayHelper::map(TblCountry::find()->asArray()->all(),'id','country'),
            'value'=>['ghana','ghana'],
            'options'=>['placeholder'=>'Country'],
            'language'=>'en',
            'pluginOptions'=>[
                'allowClear'=>true,
            ]])->label('Country'.'<span class="text-red"> * </span>',['class'=>'label-class','id'=>'country']); ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($modelad, 'city')->textInput(['maxlength' => true,'placeholder'=>'Enter City'])->label('City'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($modelad, 'telephone_number')->Input('number',['placeholder'=>'Without+ eg.233240000000'])->label('Phone Number'.'<span class="text-red"> * </span>',['class'=>'label-class custom-select-lg'])
            ->widget('yii\widgets\MaskedInput', [
                'mask' => '999-999-9999'
            ]);
        ?>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <?= Html::submitButton('Save And Continue', ['class' => 'btn btn-primary float-right']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
</div>