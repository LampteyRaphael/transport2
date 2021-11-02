<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\student\models\TblStRegistration */
/* @var $form yii\widgets\ActiveForm */
$this->title="Course Registration";
?>

<div class="tbl-st-registration-form">
<div class="box box-solid box-primary">
   <div class="box-body">
        <?php if($course) :?>
            <table class="table tab-content table-bordered table-striped">
            <thead>
               <tr>
                   <th>Course Code</th>
                   <th>Course Name</th>
                   <th>Sections</th>
                   
               </tr>
            </thead>
                <tbody>
                <?php   foreach($course as $item) :?>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'method'=>'post', 'action' => Yii::$app->urlManager->createUrl(['/student/tbl-st-registration/create'])]); ?>
                    <tr>
                    <input type="hidden" name="levels" value="<?= $levels;?>">
                    <input type="hidden" name="semesters" value="<?= $semesters;?>">

                    <td hidden>
                        <?= $form->field($model, 'status')->hiddenInput(['value'=>1]) ?>
                    </td>
                    <td><?= strtoupper($item->course_number);?></td>
                    <td><?= strtoupper($item->courseName);?></td>
                    <td hidden>
                    <?= $form->field($model, 'courese_id')->textInput(['value'=>$item->id]);?>
                    </td>

                    <td><?= Html::submitButton('select', ['class' => 'btn btn-info btn-xs']) ?></td>
                    </tr>
                    <?php ActiveForm::end(); ?>
                <?php endforeach;?>
                </tbody>
              
            </table>
            <?php else:?>
            <h1>Courses Are Not Mount Yet</h1>
            <?php endif;?>
   </div>
</div>

<?php if($courser) :?>
<div class="box box-solid box-primary">
   <div class="box-body">
    
        <table class="table  table-striped">
        <thead>
           <tr>
              <th>Course Code</th>
              <th>Course</th>
              <th>Remove</th>
           </tr>
        </thead>
            <?php   foreach($courser as $item) :?>
            <tbody>
                <tr>
                   <td><?= $item->courese->course_number??''; ?></td>
                    <td><?= $item->courese->courseName??''; ?></td>
                    <td>   <?= Html::a('Remove', ['delete', 'id' => $item->id], ['class' => 'btn btn-danger btn-xs','data' => ['confirm' => 'Are you sure?','method' => 'post']]) ?></td>
                </tr>
            </tbody>
            <?php endforeach;?>
            <tfoot>
               <tr>
                  <td><?= Html::submitButton('Submit To Complete Course Registration', ['class' => 'btn btn-success pull-right']) ?></td>
               </tr>
            </tfoot>
            </table>
   
        </div>
    </div>
    <?php endif;?>
</div>
