<?php

use common\models\TblAppProgram;
use common\models\TblLevel;
use common\models\TblProgram;
use common\models\TblProgramType;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

$this->title = 'Application Program';
?>
<div class="site-program">
    <?php include (Yii::getAlias('@frontend/views/include/progress.php'));?>
    <!--Begin Of Seecting Program And Level  -->
    <!--  -->
    <div class="col-md-12"><header class="text-center"><h3>Program Applying For</h3></header></div>
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Yii::$app->urlManager->createUrl(['site/program'])]); ?>
        <div class="row">

        <div class="col-md-6">
                <?= $form->field($model, 'name')->widget(Select2::className(),[
                    'data'=>ArrayHelper::map(TblProgramType::find()->asArray()->all(),'id','name'),
                    'options'=>['placeholder'=>'Program Type','onchange'=>'this.form.submit()'],
                    'language'=>'en',
                    'pluginOptions'=>[
                        'allowClear'=>true,
                    ]])->label('Program Type'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
        </div>
        
        <div class="col-md-6">
            <?= $form->field($model, 'tbl_program')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblProgram::find()->all(),'id','program_name'),
                'options'=>['placeholder'=>'Program'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])->label('Level'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
        </div>
      
        
        <?php ActiveForm::end(); ?>
    </div>
</div>
<!--End Of Seecting Program And Level  -->

  <!--Begin Of Seect Courses  -->
    <?php if ($courses):?>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped  table-hover bg-white table-sm">
                    <thead>
                    <tr>
                        <td>Select</td>
                        <td>Program Name</td>
                        <td>Course Name</td>
                        <td>Course Code</td>
                        <td>Course Level</td>
                    </tr>
                    </thead>
                    <?php $i=0;?>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Yii::$app->urlManager->createUrl(['site/courses'])]); ?>
                    <tbody>
                    <?php foreach ($courses as $item):?>
                        <tr>
                            <td>
                                <input type="checkbox" name="course[]" value="<?php echo $item->id??''?>">
                            </td>
                            <td>
                                <input type="hidden" name="tbl_program" value="<?php echo $item->program->id ??'' ?>">
                                <?= $item->program->program_name;?>   (<span class=" text-primary"><?= $item->program->programCategory->name??''?></span>)
                            </td>
                            <td>
                                <?= $item->courseName??'';?>
                            </td>
                            <td>
                                <?= $item->course_number??'';?>
                            </td>
                            <td>
                            <?= $item->level0->level_name??'';?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tr>
                        <td colspan="12">
                            <?= Html::submitButton('Add', ['class' => 'btn btn-primary float-right']) ?>
                        </td>
                    </tr>
                    <?php ActiveForm::end(); ?>
                </table>
            </div>
        </div>
    </div>
    <?php endif;?>
    <!--End Of Seect Courses  -->

 <!--Begin Of Seected Courses  -->
  
    <?php $selectedCourses=TblAppProgram::find()->all();?>
    <?php if ($selectedCourses):?>
    <h3><span style="color:darkblue; font-size:15px;">Selected Courses</span></h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover table-striped bg-white table-sm">
                    <thead>
                    <tr>
                        <td>Select</td>
                        <td>Program Name</td>
                        <td>Course Name</td>
                        <td>Course Code</td>
                        <td>Course Level</td>
                    </tr>
                    </thead>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Yii::$app->urlManager->createUrl(['site/remove'])]); ?>
                    <tbody>
                    <?php foreach ($selectedCourses as $item):?>
                        <tr>
                            <td>
                                <input type="checkbox" name="course[]" value="<?php echo $item->id??''?>">
                            </td>
                            <td>
                                <?= $item->program->program_name??'';?>  (<span class=" text-primary"><?= $item->program->programCategory->name??''?></span>)
                            </td>
                            <td>
                                <?= $item->course->courseName??'';  ?>
                            </td>
                            <td>
                            <?= $item->course->course_number??'';  ?>
                            </td>
                            <td>
                            <?= $item->course->level0->level_name ??'';?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tr>
                        <td colspan="3">
                            <?= Html::submitButton('Remove', ['class' => 'btn btn-danger float-right']) ?>
                        </td>
                        <?php ActiveForm::end(); ?>
                        <td colspan="2">
                            <?= Html::a('Save And Continue', ['education'], ['class' => 'btn btn-primary']) ?>
                        </td>
                    </tr>      
                </table>
            </div>
        </div>
    </div>
    <?php endif;?>

     <!--End Of Seected Courses  -->
        </div>
<script>
     var  program=document.getElementById('program');
            program.classList.add('active');
    // var  program=document.getElementById('program');
    // var  pers=document.getElementById('pers');
    // var  pro=document.getElementById('pro');
    //      program.classList.add('active');
    //      pro.classList.add('active');
    //      pers.classList.remove('active');
</script>