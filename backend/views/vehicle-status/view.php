<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use common\widgets\Box;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleStatus */

$this->title = $model->name;
$this->params['title'] = 'Vehicle Statuses';
$this->params['description'] = 'Detail';
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-status-view">
<?php Box::begin([
    'title' => Html::encode($this->title),
    'tools' => [
        Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-box-tool btn-primary']),
        Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-box-tool btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ]
        ])
    ],
    'options' => ['class' => 'box-primary'],
]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

<?php Box::end() ?>
</div>
