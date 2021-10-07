<?php

use backend\modules\user\models\TblRole;
use yii\bootstrap4\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
$this->title = 'Users';
?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],

        'toolbar' => [
            ['content'=>Html::a('Add New User', ['create'], ['class' => 'btn btn-success'])
            ],
            '{export}',
            '{toggleData}'
        ],
        
    'pjax'=>true,
    'bordered' => true,
    'striped' => true,
    'condensed' => false,
    'responsive' => true,
    'responsiveWrap' => false,
    'bootstrap'=>true,
    'hover' => true,
    'floatHeader' => false,
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>Users Admins</h3>',
        'type' => GridView::TYPE_PRIMARY,
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'email:email',
            [
                'attribute'=>'status',
                'value'=>'status0.name',
            ],
            [
                'attribute'=>'role_id',
                'label'=>'Role',
                'value'=>'role.name',
                 'filter'=>ArrayHelper::map(TblRole::find()->asArray()->all(),'id','name'),
                 'filterType'=>GridView::FILTER_SELECT2,
                 'filterWidgetOptions'=>[
                     'options'=>['prompt'=>'Role'],
                     'pluginOptions'=>['allowClear'=>true],
                 ],
            ],

            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view} {delete} ',
            'width'=>100,
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a ( 'view', ['/user/tbl-user/update', 'id' => $model->id],['class'=>'btn btn-primary'] );
                },

                'delete' => function ($url, $model, $key) {
                    return Html::a('',$url,['data-confirm' => 'Are you sure you want to deny this request?', 'data-method' =>'POST']);
                },

            ],
        ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>