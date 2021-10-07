<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\departments\models\TblCourseDepart */

$this->title = 'Update Course Depart';
$this->params['breadcrumbs'][] = ['label' => 'Course Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
?>
<div class="tbl-course-depart-update">
    <div class="box">
        <div class="box-body">
            <?= $this->render('_form', ['model' => $model]) ?>
        </div>
    </div>
</div>
