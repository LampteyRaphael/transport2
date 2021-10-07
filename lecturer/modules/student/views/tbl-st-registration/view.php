<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblStRegistration */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl St Registrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-st-registration-view">

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
            'stud_Id',
            'program_id',
            'level_id',
            'acadamic_year',
            'status',
            'semester',
            'section_id',
            'date_o_regis',
            'courese_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
