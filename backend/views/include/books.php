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