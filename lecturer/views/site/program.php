<?php

use common\models\TblAppProgram;
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
    <div class="row">
    <div class="col-md-12"><header class="text-center"><h3>Program Applying For</h3></header></div>
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Yii::$app->urlManager->createUrl(['site/program'])]); ?>
        <div class="row">

        <div class="col-md-12">
                <?= $form->field($model, 'name')->widget(Select2::className(),[
                    'data'=>ArrayHelper::map(TblProgramType::find()->asArray()->all(),'id','name'),
                    'options'=>['placeholder'=>'Program Category','onchange'=>'this.form.submit()'],
                    'language'=>'en',
                    'pluginOptions'=>[
                        'allowClear'=>true,
                    ]])->label('Select Program Category'.'<span class="text-red"> * </span>',['class'=>'label-class']); ?>
        </div>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
<!--End Of Seecting Program And Level  -->


  <!--Begin Of Seect Courses  -->
  <?php if ($program):?>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped  table-hover bg-white table-sm">
                    <thead>
                    <tr>
                        <td>Program Category</td>
                        <td>Program Name</td>
                        <td>Select</td>
                    </tr>
                    </thead>
                    <?php $i=0;?>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Yii::$app->urlManager->createUrl(['site/courses'])]); ?>
                    <tbody>
                    <?php foreach ($program as $item):?>
                        <tr>
                            <td>
                                <?= $item->programCategory->name??''?>
                            </td>
                            <td>
                                <?= $item->program_name;?>
                            </td>
                            <td>
                                <input type="radio" name="program" value="<?php echo $item->id??''?>">
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
 <?php $selectedCourses=TblAppProgram::find()->where(['osn_id'=>Yii::$app->session->get('osn')])->all();?>
    <?php if ($selectedCourses):?>
    <h3><span style="color:darkblue;">Selected Program</span></h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover table-striped bg-white table-sm">
                    <thead>
                    <tr>
                        <td>Program Category</td>
                        <td>Program Name</td>
                        <td>Select</td>
                    </tr>
                    </thead>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Yii::$app->urlManager->createUrl(['site/remove'])]); ?>
                    <tbody>
                    <?php foreach ($selectedCourses as $item):?>
                        <tr>
                            <td>
                                <?= $item->program->programCategory->name??''?>
                            </td>
                            <td>
                                <?= $item->program->program_name??'';?>
                            </td>
                            <td>
                                <input type="radio" name="program" value="<?php echo $item->id??''?>">
                            </td>
                           
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tr>
                        <td colspan="2">
                            <?= Html::submitButton('Remove', ['class' => 'btn btn-danger float-right']) ?>
                        </td>
                        <td>
                                <?= Html::a('Save And Continue', ['education'], ['class' => 'btn btn-primary']) ?>
                        </td>
                    </tr>
                   <?php ActiveForm::end(); ?>   
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
</script>