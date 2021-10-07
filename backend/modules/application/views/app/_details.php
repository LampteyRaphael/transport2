<?php

use yii\widgets\DetailView;
?>
<div class="app-pers-details-index">

      <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            // [
            //     'attribute'=>'title',
            //     'label'=>'Title',
            //     'value'=>$model->personalDetails->title0->name??'',
            // ],

            // [
            //     'attribute'=>'personal_details_id',
            //     'label'=>'First Name',
            //     'value'=>$model->personalDetails->first_name??'',
            // ],

            // [
            //     'attribute'=>'personal_details_id',
            //     'label'=>'Middle Name',
            //     'value'=>$model->personalDetails->middle_name??'',
            // ],

            // [
            //     'attribute'=>'personal_details_id',
            //     'label'=>'Last Name',
            //     'value'=>$model->personalDetails->last_name??'',
            // ],

            // [
            //     'attribute'=>'personal_details_id',
            //     'label'=>'Gender',
            //     'value'=>$model->personalDetails->gender??'',
            // ],

            // [
            //     'attribute'=>'personal_details_id',
            //     'label'=>'Date Of Birth',
            //     'value'=>$model->personalDetails->date_of_birth??'',
            //     'format' => ['date', 'php:jS F Y'],
            // ],

            // [
            //     'attribute'=>'personal_details_id',
            //     'label'=>'Nationality',
            //     'value'=>$model->personalDetails->nationality??'',
            // ],

            // [
            //     'attribute'=>'personal_details_id',
            //     'label'=>'Emergency Person',
            //     'value'=>$model->personalDetails->contact_person??'',
            // ],

            // [
            //     'attribute'=>'personal_details_id',
            //     'label'=>'Emergency Contact',
            //     'value'=>$model->personalDetails->contact_number??'',
            // ],

            // [
            //     'attribute'=>'date_apply',
            //     'label'=>'Date Applied',
            //     'value'=>$model->personalDetails->date_apply??'',
            // ],
        ],
    ]) ?>

</div>
