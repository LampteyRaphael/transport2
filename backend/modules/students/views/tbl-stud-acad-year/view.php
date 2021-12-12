<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudAcadYear */

$this->title = 'Academic Year';
$this->params['breadcrumbs'][] = ['label' => 'Student Academic Year', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-stud-acad-year-view">


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
        <p class="card-text">
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'date_of_admission',
            'created_at',
            'updated_at',
        ],
    ]) ?>
        </p>
    </div>
    
</div>

   

    

</div>
