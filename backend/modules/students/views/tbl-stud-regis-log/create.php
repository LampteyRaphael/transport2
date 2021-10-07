<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudRegisLog */

$this->title = 'Create Tbl Stud Regis Log';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Stud Regis Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-regis-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
