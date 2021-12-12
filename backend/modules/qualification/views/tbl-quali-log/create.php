<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblQualiLog */

$this->title = 'Create Tbl Quali Log';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Quali Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-quali-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
