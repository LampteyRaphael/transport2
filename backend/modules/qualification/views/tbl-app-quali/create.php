<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\qualification\models\TblAppQuali */

$this->title = 'Create Tbl App Quali';
$this->params['breadcrumbs'][] = ['label' => 'Tbl App Qualis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-app-quali-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
