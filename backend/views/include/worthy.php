<?php if($worthy):?>
<table class="table table-bordered table-striped">
    <thead class="bg-primary">
        <tr>
            <th>Vehicle</th>
            <th>Renewal Date</th>
            <th>Expired Date</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($worthy as $vehicle):?>
        <tr>
            <td><?= $vehicle->vehicle->make??''?></td>
            <td><?= $vehicle->renewalDate ?></td>
            <td><?= $vehicle->expiringDate??''?></td>
            <td><?= $vehicle->amount??''?></td>
            <td>
                <?php if($vehicle->expiringDate < date('Y-m-d')):?>
               <span class="badge badge-success"> Expired</span>
                <?php elseif($vehicle->expiringDate >= date('Y-m-d')):?>
                    <span class="badge badge-success"> Active</span>
                <?php endif;?>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>
<?php endif;?>