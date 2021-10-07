<?php
/* @var $this yii\web\View */
use common\models\TblLevel;
use common\models\TblSection;
use common\models\TblSemester;
use common\models\TblStudAcadamicYear;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
?>

<h1>Lecturer Results</h1>
<p>
<div class="">
    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-2">
                <?= $form->field($model, 'courseName')->widget(Select2::className(),[
                    'data'=>ArrayHelper::map($courseLecture,'id','courseName'),
                    'options'=>['placeholder'=>'Course'],
                    'language'=>'en',
                    'pluginOptions'=>[
                        'allowClear'=>true,
                    ]]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'semester')->widget(Select2::className(),[
                    'data'=>ArrayHelper::map(TblSemester::find()->asArray()->all(),'id','name'),
                    'options'=>['placeholder'=>'semester'],
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
                <?= $form->field($model, 'level_id')->widget(Select2::className(),[
                    'data'=>ArrayHelper::map(TblLevel::find()->asArray()->all(),'id','level_name'),
                    'options'=>['placeholder'=>'Level'],
                    'language'=>'en',
                    'pluginOptions'=>[
                        'allowClear'=>true,
                    ]]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'acadamic_year')->widget(Select2::className(),[
                    'data'=>ArrayHelper::map(TblStudAcadamicYear::find()->asArray()->all(),'id','name'),
                    'options'=>['placeholder'=>'Section'],
                    'language'=>'en',
                    'pluginOptions'=>[
                        'allowClear'=>true,
                    ]]) ?>
            </div>
            <div class="col-md-2">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary float-left mt-lg-4'])?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>   
    </div>
</div>
</p>
<p>
<?php if($registeredCourses): ?>
    <?php $form = ActiveForm::begin(['action' => Yii::$app->urlManager->createUrl(['lecturer/lecturer-result/view'])]); ?>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Course Code</th>
                    <th>Registered Students</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $courseN??''?></td>
                    <td><?= $courseC??''?></td>
                    <td><?= $registeredCourses;?></td>
                    <td>
                        <input type="hidden" name="courseID" value="<?= $ids; ?>">
                        <?= Html::submitButton('Download',['class'=>'btn btn-primary'])?>
                    </td>
                </tr>
            </tbody>
        </table>
  <?php ActiveForm::end(); ?>   
<?php endif; ?>
</p>


<?php



?>