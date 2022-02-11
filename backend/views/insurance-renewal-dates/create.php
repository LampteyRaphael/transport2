<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InsuranceRenewalDates */

$this->title = 'Create Insurance Renewal Dates';
$this->params['breadcrumbs'][] = ['label' => 'Insurance Renewal Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insurance-renewal-dates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
