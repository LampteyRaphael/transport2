<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\student\models\TblUser */

$this->title = 'User';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-user-view">
    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'username',
                    'email:email',

                    [
                        'attribute'=>'status',
                        'label'=>'Status',
                        'value'=>$model->status0->name,
                    ]
                    
                ],
            ]) ?>
        </div> 
    </div>
 
</div>
