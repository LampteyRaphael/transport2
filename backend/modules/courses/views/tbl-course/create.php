<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\courses\models\TblCourse */

$this->title = 'Create Course';
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-course-create">
<div class="card">
    <div class="card-header bg-primary">
       Add  Courses
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
