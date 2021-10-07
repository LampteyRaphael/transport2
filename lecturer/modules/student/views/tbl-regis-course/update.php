<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblRegisCourse */

$this->title = 'Update Tbl Regis Course: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Regis Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-regis-course-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
