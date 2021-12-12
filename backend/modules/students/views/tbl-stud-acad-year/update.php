<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudAcadYear */

$this->title = 'Update Student Academic Year:';
$this->params['breadcrumbs'][] = ['label' => 'Student Academic Year', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-stud-acad-year-update">

<div class="card">
    <div class="card-header bg-primary">
        <h4>Update Academic Year</h4>
    </div>
    <div class="card-body">
        <p class="card-text">
        <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
        </p>
    </div>
</div>
   

</div>
