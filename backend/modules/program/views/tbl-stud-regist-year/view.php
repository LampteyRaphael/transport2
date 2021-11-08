<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblStudRegistYear */

$this->title = 'Student Registration';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Stud Regist Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-stud-regist-year-view">

<div class="card">
        <div class="card-header bg-primary">
            <h4>
                <b>
                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) 
                        ?>
                    </p>
                </b>
            </h4>
        </div>
        <div class="card-body">
            <p class="card-text">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute'=>'stud_acadamic_year_id',
                        'value'=>$model->studAcadamicYear->date_of_admission??'',
                        'label'=>'Academic Year'
                     ],
                    [
                       'attribute'=>'date',
                       'value'=>$model->date??'',
                       'label'=>'Date Of Entry'
                    ],
                    [
                        'attribute'=>'semester',
                        'value'=>$model->semester0->name??'',
                        'label'=>'Semester'
                    ],
                    [
                        'attribute'=>'status',
                        'value'=>$model->status0->name??'',
                        'label'=>'Status'
                    ]
                 
                ],
            ]) ?>
            </p>
        </div>
    </div>


</div>
