<?php

use kartik\detail\DetailView;
use yii\helpers\Html;
use common\models\VehicleGroup;
use common\models\VehicleStatus;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

$this->title = $model->make;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-list">

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
                                    <td>
                                    <?= \yii\helpers\Html::img( Yii::getAlias('@backend'). '/web/image/'.$model->file) ?>
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
                            </tbody>
                        </table>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Vehicle's Details</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Vehicle Services</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-repair-tab" data-toggle="pill" href="#pills-repair" role="tab" aria-controls="pills-repair" aria-selected="false">Vehicle Repairs</a>
                        </li> 
                         <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-trip-tab" data-toggle="pill" href="#pills-trip" role="tab" aria-controls="pills-trip" aria-selected="false">Vehicle Bookings</a>
                        </li> 
                        </ul>   
                    </p>
                    <p class="card-text">

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show mt-4 active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <div class="col">
            <?= DetailView::widget([
                            'model' => $model,
                            'mode' => 'view',
                            'bordered' => true,
                            'striped' => true,
                            'condensed' => true,
                            'responsive' => true,
                            'hover' => true,
                            'vAlign'=>true,
                            'fadeDelay'=>true,
                            'panel' => [
                                'heading'=>'Vehicle Details',
                                'type'=>DetailView::TYPE_PRIMARY,
                                'footer' => '<div class="text-center text-muted"></div>'
                            ],
                            'attributes' => [
                                'make',
                                'regNo',
                                'chasisNo',
                                'yearMade',
                                'purchaseDate',
                                'colour',
                                'countryOfOrigin',
                                'cubicCentimeter',
                                'fuel',
                                'created_at',
                                'updated_at',  
                            ],
                            'buttons1' => '',
                        ]) 
                    ?>
            </div>
        </div>
    </div>

<!-- Start Of Vehicle Services -->
    <div class="tab-pane fade show mt-4" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile=-tab">
        <div class="row">
            <div class="col">
            <?php if($vehicleService):?>
            <table class="table table-bordered table-striped">
                <thead class="bg-primary">
                    <tr>
                        <th>Vehicle</th>
                        <th>Description</th>
                        <th>Garage</th>
                        <th>Amount</th>
                        <th>Return Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($vehicleService as $vehicle):?>
                    <tr>
                        <td><?= $vehicle->vehicle->make??''?></td>
                        <td><?= $vehicle->description??''?></td>
                        <td><?= $vehicle->garageName??''?></td>
                        <td><?= $vehicle->amount??''?></td>
                        <td><?= $vehicle->dateReturned??''?></td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
            <?php endif; ?>
         
             </div>
            </div>
         </div>
         <!--Ending Of Vehicle Service  -->



         <!-- Start Of Vehicle Repairs -->
    <div class="tab-pane fade show mt-4" id="pills-repair" role="tabpanel" aria-labelledby="pills-repair=-tab">
        <div class="row">
            <div class="col">
            <?php if($vehicleRepairs):?>
            <table class="table table-bordered table-striped">
                <thead class="bg-primary">
                    <tr>
                        <th>Vehicle</th>
                        <th>Description</th>
                        <th>Garage</th>
                        <th>Amount</th>
                        <th>Return Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($vehicleRepairs as $vehicleRepair):?>
                    <tr>
                        <td><?= $vehicle->vehicle->make??''?></td>
                        <td><?= $vehicle->description??''?></td>
                        <td><?= $vehicle->garageName??''?></td>
                        <td><?= $vehicle->amount??''?></td>
                        <td><?= $vehicle->dateReturned??''?></td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
            <?php endif; ?>
         
             </div>
            </div>
         </div>
         <!--Ending Of Vehicle Repairs  -->




         <!-- Start Of Vehicle Trips -->
    <div class="tab-pane fade show mt-4" id="pills-trip" role="tabpanel" aria-labelledby="pills-trip=-tab">
        <div class="row">
            <div class="col">
            <?php if($trips):?>
            <table class="table table-bordered table-striped">
                <thead class="bg-primary">
                    <tr>
                        <th>Vehicle</th>
                        <th>Driver Name</th>
                        <th>Trip Type</th>
                        <th>Start Loc.</th>
                        <th>End Loc.</th>
                        <th>Start Date.</th>
                        <th>End Date.</th>
                        <th>Exp. Mileage</th>
                        <th>Arr. Mileage</th>
                        <th>Auth Off.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($trips as $trip):?>
                    <tr>
                        <td><?= $trip->vehicle->make??''?></td>
                        <td><?= $trip->driver->name??''?></td>
                        <td><?= $trip->trip_type??''?></td>
                        <td><?= $trip->trip_start_location??''?></td>
                        <td><?= $trip->trip_end_location??''?></td>
                        <td><?= $trip->start_date??''?></td>
                        <td><?= $trip->end_date??''?></td>
                        <td><?= $trip->departureMileage??''?></td>
                        <td><?= $trip->arrivalMileage??''?></td>
                        <td><?= $trip->officerAssigned??''?></td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
            <?php endif; ?>
         
             </div>
            </div>
         </div>
         <!--Ending Of Vehicle Trips  -->
      </div>
    </p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
