<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TblStudRegistYearSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stud Regist Years';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-stud-regist-year-index">
    <!-- Navigation Bar -->
    <?php include (Yii::getAlias('@backend/modules/layout/navbar.php'))?>
<!-- End Of Navigation Bar -->
    <?php Pjax::begin(); ?>

    <div class="card">
        <div class="card-header bg-primary">
            <h4>
                <b>Students Course Registration settings</b>
            </h4>
        </div>
        <div class="card-body">
            <p class="card-text">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'studAcadamicYear.date_of_admission',
                            'date:date',
                            'semester0.name',
                            'status0.name',
                            ['class' => 'yii\grid\ActionColumn',
                            'template' => '{view}',
                            'buttons' => [
                                'view' => function ($url, $model, $key) {
                                    return Html::a ( 'view', ['view', 'id' => $model->id],['class'=>'btn btn-primary'] );
                                },
                                
                            ],
                        ],
                        ],
                    ]); 
                ?>
            </p>
        </div>
    </div>
  

    <?php Pjax::end(); ?>

</div>
