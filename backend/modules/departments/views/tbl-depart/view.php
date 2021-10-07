<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\departments\models\TblDepart */

$this->title = 'Department';
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-depart-view">

<div class="box">

<div class="box-body">

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
            'department_name',
            'department_code',
            'department_phone_number',
            'department_office',
        ],
    ]) ?>

 </div>

</div>

</div>
