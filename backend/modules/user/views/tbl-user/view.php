<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-user-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email:email',
            'status0.name',
            'role.name',
            'created_at:date',
        ],
    ]) ?>
</div>
