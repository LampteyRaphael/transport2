<?php if($accident):?>
<table class="table table-bordered table-striped">
    <thead class="bg-primary">
        <tr>
            <th>Vehicle</th>
            <th>Driver</th>
            <th>Incident Date</th>
            <th>Description</th>
            <th>Action Taken</th>
            <th>Polic Report</th>
            <th>Remedy</th>
            <th>Date Created</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($accident as $vehicle):?>
        <tr>
            <td><?= $vehicle->vehicle->make??''?></td>
            <td><?= $vehicle->driver->name ?></td>
            <td><?= $vehicle->dateOfIncident??''?></td>
            <td><?= $vehicle->description??''?></td>
            <td>
                <?= $vehicle->actionTaken; ?>
            </td>
            <td>
                <?= $vehicle->policeReport; ?>
            </td>
            <td>
                <?= $vehicle->remedy; ?>
            </td>
            <td>
                <?= $vehicle->created_at; ?>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>
<?php endif;?>