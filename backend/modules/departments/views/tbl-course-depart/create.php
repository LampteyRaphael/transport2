<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\departments\models\TblCourseDepart */

$this->title = 'Department And Course';
$this->params['breadcrumbs'][] = ['label' => 'Departments And Course', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-course-depart-create">
<div class="box">
   <div class="box-body">
    <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
   </div>
</div>
</div>
