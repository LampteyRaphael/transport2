<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\staff\models\TblStaffListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Staff Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-staff-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Staff List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'first_name',
            'surname',
            'middle_name',
            //'city',
            //'country',
            //'date_of_birth',
            //'ranks',
            //'doa',
            //'telephone_number',
            //'user_id',
            //'staff_category_id',
            //'created_at',
            //'updated_at',
            //'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
