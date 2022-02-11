<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Drivers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="drivers-view">

<div class="card">
    <div class="card-header bg-primary">
    <h1><?= Html::encode($this->title) ?></h1>

    </div>
    <div class="card-body">
        <h5 class="card-title">
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
        </h5>
        <p class="card-text">
            <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'tel',
                'age',
                'email:email',
                'license_no',
                'license_expire_date',
                'date_of_join',
                'driver_status',
                'vehicle_id',
                'photo',
                'created_at',
                'updated_at',
                'total_experience',
            ],
        ]) ?>
        </p>
    </div>
  
</div>

  



</div>
