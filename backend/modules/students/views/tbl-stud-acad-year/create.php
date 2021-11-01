<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudAcadYear */

$this->title = 'Create Tbl Stud Acad Year';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Stud Acad Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-acad-year-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
