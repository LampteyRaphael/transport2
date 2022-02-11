<ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Vehicle's Details</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Vehicle Services</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-repair-tab" data-toggle="pill" href="#pills-repair" role="tab" aria-controls="pills-repair" aria-selected="false">Vehicle Repairs</a>
    </li> 
        <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-trip-tab" data-toggle="pill" href="#pills-trip" role="tab" aria-controls="pills-trip" aria-selected="false">Vehicle Bookings</a>
    </li> 
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-insurance-tab" data-toggle="pill" href="#pills-insurance" role="tab" aria-controls="pills-trip" aria-selected="false">Insurance</a>
    </li> 
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-worthy-tab" data-toggle="pill" href="#pills-worthy" role="tab" aria-controls="pills-worthy" aria-selected="false">Road Worthy</a>
    </li> 
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-accident-tab" data-toggle="pill" href="#pills-accident" role="tab" aria-controls="pills-accident" aria-selected="false">Accidents</a>
    </li> 
    
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show mt-4 active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <div class="col">
                <?php include (Yii::getAlias('@backend/views/include/vehicle.php'))?>
            </div>
        </div>
    </div>

<!-- Start Of Vehicle Services -->
<div class="tab-pane fade show mt-4" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile=-tab">
    <div class="row">
        <div class="col">
            <?php include (Yii::getAlias('@backend/views/include/service.php'))?>
        </div>
    </div>
</div>
<!--Ending Of Vehicle Service  -->

<!-- Start Of Vehicle Repairs -->
<div class="tab-pane fade show mt-4" id="pills-repair" role="tabpanel" aria-labelledby="pills-repair=-tab">
    <div class="row">
        <div class="col">
            <?php include (Yii::getAlias('@backend/views/include/repair.php'))?>
        </div>
    </div>
</div>


<div class="tab-pane fade show mt-4" id="pills-trip" role="tabpanel" aria-labelledby="pills-trip=-tab">
    <div class="row">
        <div class="col">
                <?php include (Yii::getAlias('@backend/views/include/books.php'))?>
        </div>
    </div>
</div>

<div class="tab-pane fade show mt-4" id="pills-insurance" role="tabpanel" aria-labelledby="pills-insurance=-tab">
    <div class="row">
        <div class="col">
        <?php include (Yii::getAlias('@backend/views/include/insurance.php'))?>
        </div>
    </div>
</div>

<div class="tab-pane fade show mt-4" id="pills-worthy" role="tabpanel" aria-labelledby="pills-worthy=-tab">
    <div class="row">
        <div class="col">
        <?php include (Yii::getAlias('@backend/views/include/worthy.php'))?>
        </div>
    </div>
</div>

<div class="tab-pane fade show mt-4" id="pills-accident" role="tabpanel" aria-labelledby="pills-accident=-tab">
    <div class="row">
        <div class="col">
        <?php include (Yii::getAlias('@backend/views/include/accident.php'))?>
        </div>
    </div>
</div>

</div>