<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblCourse */

$this->title = 'Create Course';
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
?>
<div class="tbl-course-create">

    <?= $this->render('_form', [
        'model' => $model,
        'courses' => $courses,
        'acadamic'=>$acadamic??'',
    ]) ?>

</div>
