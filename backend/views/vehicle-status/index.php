<?php


use yii\widgets\Pjax;use common\widgets\Box;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VehicleStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicle Statuses';
$this->params['title'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-status-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}\n{summary}",
        'summaryOptions' => ['class' => 'summary pull-right'],
        'tableOptions' => ['class' => 'table table-bordered bg-primary'],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
