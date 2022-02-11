<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Box;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleStatus */

$this->title = 'Update Vehicle Status: ' . $model->name;
$this->params['title'] = 'Vehicle Statuses';
$this->params['description'] = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicle-status-update">
<?php Box::begin([
    'title' => Html::encode($this->title),
    'options' => ['class' => 'box-primary']
]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

<?php Box::end() ?>
</div>
