<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudGrade */

$this->title = 'Create Tbl Stud Grade';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Stud Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-grade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
