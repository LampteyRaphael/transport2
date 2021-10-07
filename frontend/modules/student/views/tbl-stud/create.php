<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\student\models\TblStud */

$this->title = 'Create Tbl Stud';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Studs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
