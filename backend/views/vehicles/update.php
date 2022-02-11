<?php

use yii\bootstrap4\Html;

$this->title = 'Update' . ' ' . $model->make;
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicles-update">
    <div class="card">
        <div class="card-header bg-primary">
            <h3>
                <?=$model->make;?>
            </h3>
        </div>
        <div class="card-body">
                <?= $this->render('_form', ['model' => $model]) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-lg float-right',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        </div>
    </div>

    

</div>
