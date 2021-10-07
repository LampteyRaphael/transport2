<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\courses\models\TblSemester */

$this->title = 'Update Semester';
$this->params['breadcrumbs'][] = ['label' => 'Semesters', 'url' => ['index']];
?>
<div class="tbl-semester-update">
<div class="box">
    <div class="box-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
</div>
