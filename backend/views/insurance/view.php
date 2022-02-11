<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Insurance */

$this->title = $model->make;
$this->params['breadcrumbs'][] = ['label' => 'Insurances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="insurance-view">

<div class="card">
<div class=" card-header bg-primary">
    <h3> <?= $model->make;?></h3>
</div>
    <div class="card-body">


    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                        <table class="table table-light">
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <?= Html::img('images/'.$model->file,['height'=>'200px','width'=>'200px'])??'';?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-uppercase">
                                         <h1><?= $model->make??'';?></h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-uppercase text-success bold"><?= $model->status0->name??'';?></td>
                                </tr>
                                <tr>
                                    <td class="text-center text-uppercase">
                                        <?= Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-success btn-lg']) ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
                <div class="">
                    <div class="-body">
                       <?php include (Yii::getAlias('@backend/views/include/header-nav.php'))?>
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
</div>