<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RoadWorthyRenewalDates */

$this->title = 'Create Road Worthy Renewal Dates';
$this->params['breadcrumbs'][] = ['label' => 'Road Worthy Renewal Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-worthy-renewal-dates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
