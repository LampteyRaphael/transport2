<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\students\models\TblStudGrade */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Stud Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-stud-grade-view">
<!-- Navigation Bar -->
<?php include (Yii::getAlias('@backend/modules/layout/navbar.php'))?>
<!-- End Of Navigation Bar -->
 
<div class="card">
    <div class="card-header">
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
   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'grade_name',
            'from',
            'to',
            'grade_point',
        ],
    ]) ?>
    </div>
</div>
   

</div>
