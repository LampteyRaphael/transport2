<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\user\models\TblUserLog */

$this->title = 'Create Tbl User Log';
$this->params['breadcrumbs'][] = ['label' => 'Tbl User Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-user-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
