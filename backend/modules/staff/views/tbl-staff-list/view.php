<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\staff\models\TblStaffList */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Staff Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-staff-list-view">

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
            'title',
            'first_name',
            'surname',
            'middle_name',
            'city',
            'country',
            'date_of_birth',
            'ranks',
            'doa',
            'telephone_number',
            'user_id',
            'staff_category_id',
            'created_at',
            'updated_at',
            'date',
        ],
    ]) ?>

</div>
