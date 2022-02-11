<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Reminder */

$this->title = $model->vehicle->make??'';
$this->params['breadcrumbs'][] = ['label' => 'Reminders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reminder-view">
    <div class="card">
        <div class="card-header bg-primary">
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

        </div>
        <div class="card-body">
            <h5 class="card-title">
               <h1><?= Html::encode($this->title) ?></h1>
            </h5>
            <p class="card-text">
                    <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'vehicle_id',
                    'date',
                    'message:ntext',
                    ],
                ]) 
            ?>
            </p>
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>

   


 

</div>
