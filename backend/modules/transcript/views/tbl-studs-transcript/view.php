<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudsTranscript */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Studs Transcripts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-studs-transcript-view">

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
            'student_id',
            'course_id',
            'semester',
            'section_id',
            'class_marks',
            'exams_marks',
            'total_marks',
            'grade_id',
            'status',
            'date_of_entry',
            'course_lecture_id',
            'acadamic_year',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
