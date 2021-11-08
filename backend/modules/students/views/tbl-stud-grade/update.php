<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudGrade */

$this->title = 'Update Stud Grade: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Stud Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-stud-grade-update">

<!-- Navigation Bar -->
<?php include (Yii::getAlias('@backend/modules/layout/navbar.php'))?>
<!-- End Of Navigation Bar -->
<div class="card">
    <div class="card-header bg-warning">
        Student Grade
    </div>
<div class="card-body">
<?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>

   

</div>
