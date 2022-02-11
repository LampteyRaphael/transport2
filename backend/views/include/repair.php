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
<?php endif;?>