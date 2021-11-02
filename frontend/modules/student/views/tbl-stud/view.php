<?php
use yii\widgets\DetailView;

$this->title = 'General Information';
$this->params['breadcrumbs'][] = ['label' => 'Student', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-stud-view">
    <div class="box box-solid box-primary">
        <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
            
                [
                    'label'=>'Student ID',
                    'value'=>Yii::$app->user->identity->username??'',
                ],
                [
                    'attribute'=>'title',
                    'label'=>'Title',
                    'value'=>$model->personalDetails->title0->name??'',
                ],

            

                [
                    'attribute'=>'personal_details_id',
                    'label'=>'First Name',
                    'value'=>$model->personalDetails->first_name??'',
                ],

                [
                    'attribute'=>'personal_details_id',
                    'label'=>'Middle Name',
                    'value'=>$model->personalDetails->middle_name??'',
                ],

                [
                    'attribute'=>'personal_details_id',
                    'label'=>'Last Name',
                    'value'=>$model->personalDetails->last_name??'',
                ],

                [
                    'attribute'=>'personal_details_id',
                    'label'=>'Gender',
                    'value'=>$model->personalDetails->gender??'',
                ],

                [
                    'attribute'=>'personal_details_id',
                    'label'=>'Date Of Birth',
                    'value'=>$model->personalDetails->date_of_birth??'',
                ],

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
                //     'label'=>'Emergency Number',
                //     'value'=>$model->personalDetails->contact_number??'',
                // ],



                // [
                //     'attribute'=>'personal_address_id',
                //     'label'=>'Address',
                //     'value'=>$model->personalAddress->address??'',
                // ],

                // [
                //     'attribute'=>'personal_address_id',
                //     'label'=>'City',
                //     'value'=>$model->personalAddress->city??'',
                // ],

                // [
                //     'attribute'=>'personal_address_id',
                //     'label'=>'Country',
                //     'value'=>$model->personalAddress->country0->country,
                // ],
                // [
                //     'attribute'=>'voters_id',
                //     'label'=>'ID',
                //     'value'=>$model->personalAddress->voters_id??'',
                // ],
                // [
                //     'attribute'=>'personal_address_id',
                //     'label'=>'ID Type',
                //     'value'=>$model->personalAddress->votersIdType->name??'',
                // ],

                // [
                //     'attribute'=>'gps',
                //     'label'=>'GPS',
                //     'value'=>$model->personalAddress->gps??'',
                // ],

                // [
                //     'attribute'=>'email',
                //     'label'=>'Email',
                //     'value'=>$model->personalAddress->email??'',
                // ],
                // [
                //     'attribute'=>'telephone_number',
                //     'label'=>'Telephone Number',
                //     'value'=>$model->personalAddress->telephone_number??'',
                // ],

                // [
                //     'attribute'=>'institution',
                //     'label'=>'Institution',
                //     'value'=>$model->personalEducation->institution??'',
                // ],

                // [
                //     'attribute'=>'program_offered',
                //     'label'=>'Program Offered',
                //     'value'=>$model->personalEducation->program_offered??'',
                // ],

                // [
                //     'attribute'=>'index_number',
                //     'label'=>'Index Number',
                //     'value'=>$model->personalEducation->index_number??'',
                // ],

                // [
                //     'attribute'=>'session',
                //     'label'=>'Session',
                //     'value'=>$model->personalEducation->session??'',
                // ],
            

                
            ],
        ]) ?>
        </div>
    </div>
</div>
