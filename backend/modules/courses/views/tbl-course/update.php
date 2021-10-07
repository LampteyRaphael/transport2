<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\courses\models\TblCourse */

$this->title = 'Update Course';
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
?>
<div class="tbl-course-update">
<div class="box">
    <div class="box-body">
    <?= $this->render('_form', ['model' => $model]) ?>
    </div>
</div>
</div>
