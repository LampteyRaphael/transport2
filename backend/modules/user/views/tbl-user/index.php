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
            ['content'=>
            Html::button(('Add User'), ['class' => 'btn btn-primary','data-toggle'=>"modal", 'data-target'=>"#exampleModal"]),

            // Html::a('Add New User', ['create'], ['class' => 'btn btn-success'])
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
            'created_at',
            [
                'attribute'=>'photo', 
                'label'=>'Photo',
                'format'=>'raw', 
                'value'=>function($model){
                    return  Html::img('/../../../application/images/'.$model->photo,['height'=>'50px','width'=>'50px'])??'';
                },
            ],
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
                    return Html::a ( 'view', ['/user/tbl-user/view', 'id' => $model->id],['class'=>'btn btn-primary'] );
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

<div class="modal fade" id="exampleModal">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content" style="background-color: lightblue;">
        <div class="modal-header bg-primary">
            <h5 class="modal-title">Add New User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
      <?php echo $this->render('create', ['model' => $model,'staff'=>$staff]); ?>
      </div>
      <div class="modal-footer bg-primary">
       </div>
    </div>
  </div>
</div>