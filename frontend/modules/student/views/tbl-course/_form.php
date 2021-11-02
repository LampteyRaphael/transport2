<?php


/* @var $this yii\web\View */
/* @var $model common\models\TblCourse */
/* @var $form yii\widgets\ActiveForm */

use common\models\TblAcadamicYear;
use common\models\TblLevel;
use common\models\TblSection;
use common\models\TblSemester;
use common\models\TblStudAcadamicYear;
use kartik\form\ActiveForm;
use kartik\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>
<div class="tbl-course-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'level_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblLevel::find()->asArray()->all(),'id','level_name'),
                'options'=>['placeholder'=>'Select Level'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])?>
        </div>
        <div class="col-md-2">
             <?= $form->field($model, 'semester')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblSemester::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>'Semester'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]]) ?>
        </div>
        <div class="col-md-2">
             <?= $form->field($model, 'section_id')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblSection::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>'Section'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]]) ?>
        </div>
       
        <div class="col-md-2">
        <?= $form->field($model, 'acadamic_year')->widget(Select2::className(),[
                'data'=>ArrayHelper::map(TblStudAcadamicYear::find()->asArray()->all(),'id','name'),
                'options'=>['placeholder'=>'Select Level'],
                'language'=>'en',
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]])?>  
        </div>
   
        <div class="col-md-3">
             <?= Html::submitButton('Save', ['class' => 'btn btn-success float-left mt-4','style'=>'margin-top:20px'])?>
        </div>

    </div>
 
    <?php ActiveForm::end(); ?>



      <!--Begin Of Seect Courses  -->
     
    <div class="row">
    <?php if ($courses):?>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped  table-hover bg-white table-sm">
                    <thead>
                    <tr>
                       
                        <td>Program Name</td>
                        <td>Course Name</td>
                        <td>Course Code</td>
                        <td>Course Level</td>
                        <td>Select</td>
                    </tr>
                    </thead>
                    <?php $i=0;?>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Yii::$app->urlManager->createUrl(['student/tbl-course/registration'])]); ?>
                    <tbody>
                    <?php foreach ($courses as $item):?>
                        <tr>
                            <td>
                                <?= $item->program->program_name;?>   (<span class=" text-primary"><?= $item->program->programCategory->name??''?></span>)
                            </td>
                            <td>
                                <?= $item->courseName??'';?>
                            </td>
                            <td>
                                <?= $item->course_number??'';?>
                            </td>
                            <td>
                            <?= $item->level->level_name??'';?>
                            </td>
                            <td>
                                <input type="checkbox" name="course[]" value="<?php echo $item->id??''?>">
                            </td>
                        </tr>
                       
                    <?php endforeach;?>
                    <tr>
                            <td><input class="form-control" type="hidden" name="level" value="<?= $item->level->id??'' ?>"> </td>
                            <td><input class="form-control" type="hidden" name="semester" value="<?= $item->semester??'' ?>"> </td>
                            <td><input class="form-control" type="hidden" name="section" value="<?= $item->section_id??'' ?>"></td>
                            <td><input class="form-control" type="hidden" name="program" value="<?= $item->program_id??'' ?>"></td>
                            <td><input class="form-control" type="hidden" name="acadamic" value="<?= $acadamic??'' ?>"></td>
                        </tr>
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
        <?php else:?>
                <h5>No course is available for this section</h5>
        <?php endif;?>
    <!--End Of Seect Courses  -->
    </div>
  



</div>
