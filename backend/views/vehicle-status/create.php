<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Box;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleStatus */

$this->title = 'Create Vehicle Status';
$this->params['title'] = 'Vehicle Statuses';
$this->params['description'] = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-status-create">
<?php Box::begin([
    'title' => Html::encode($this->title),
    'options' => ['class' => 'box-primary']
]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

<?php Box::end() ?>
</div>
