<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudAcadamicYear */

$this->title = 'Create Tbl Stud Acadamic Year';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Stud Acadamic Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-acadamic-year-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
