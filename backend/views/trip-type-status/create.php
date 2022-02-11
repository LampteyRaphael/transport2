<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TripTypeStatus */

$this->title = 'Create Trip Type Status';
$this->params['breadcrumbs'][] = ['label' => 'Trip Type Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-type-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
