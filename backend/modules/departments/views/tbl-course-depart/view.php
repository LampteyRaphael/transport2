<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\departments\models\TblCourseDepart */

$this->title = 'Department and it course';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Course Departs', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-course-depart-view">

<div  class="box">
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
            'depart.department_name',
            'course.courseName',
        ],
    ]) ?>
  </div>
</div>
</div>
