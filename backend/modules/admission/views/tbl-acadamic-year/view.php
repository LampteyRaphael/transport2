<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\admission\models\TblAcadamicYear */

$this->title = 'Acadamic Years';
$this->params['breadcrumbs'][] = ['label' => 'Acadamic Years', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-acadamic-year-view">

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

            'date_of_admission',
            'doa',
            'doc',
            [
                'attribute'=>'status',
                'value'=>$model->status0->name,
            ],
        ],
    ]) ?>

</div>
