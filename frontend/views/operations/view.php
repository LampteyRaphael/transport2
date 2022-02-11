<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Operations */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Operations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="operations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'vehicle_id',
            'driver_id',
            'trip_type',
            'trip_start_location',
            'trip_end_location',
            'trip_id',
            'start_date',
            'end_date',
            'departureMileage',
            'amount',
            'officerAssigned',
            'assignmentCompletionTime',
            'arrivalMileage',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
