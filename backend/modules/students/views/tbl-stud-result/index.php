<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\students\models\TblStudResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Stud Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-result-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Stud Result', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'student_id',
            'program_id',
            'course_id',
            'section_id',
            //'grade_id',
            //'auth_id',
            //'course_lecture_id',
            //'date_of_entry',
            //'status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
