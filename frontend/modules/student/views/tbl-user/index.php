<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\student\models\TblUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'email:email',
            'status',
            'role_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
