<?php



/* @var $this yii\web\View */
/* @var $model backend\modules\program\models\TblProgram */

use yii\helpers\Html;

$this->title = 'Program';
$this->params['breadcrumbs'][] = ['label' => 'Program', 'url' => ['index']];
?>
<div class="tbl-program-update">
    <?= $this->render('_form', ['model' => $model]) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger float-right','data' => ['confirm' => 'Are you sure you want to delete this program?','method' => 'post']]) ?>
</div>
