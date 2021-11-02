<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TblRegisCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registered Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-regis-course-index">
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'semester_id',
            'acadamic_year',
            'stud_regis_id',
            'course_id',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
