<div class="container-fluid">
    <h1>Parking Admin Page</h1>
    <hr>
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <?php YuriyController::addView("Shared/_admin_navigation"); ?>
        </div>
        <div class="col-lg-9 col-md-9">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Stripe payment ID</th>
                    <th>License plate</th>
                    <th>Date of visit</th>
                    <th>Vehicle type</th>
                    <th>Email</th>
                    <th>Charged</th>
                </tr>
                </thead>
                <tbody class="game_search_results">
                <?php
                $results = YuriyController::showAllParking();
                foreach ($results as $item) { ?>
                    <tr>
                        <td><?= $item->id; ?></td>
                        <td><?= $item->licence_plate; ?></td>
                        <td><?= $item->date_of_visit; ?></td>
                        <td><?= $item->vehicle_type; ?></td>
                        <td><?= $item->email; ?></td>
                        <td><?= $item->charged; ?></td>
                        <td>
                            <a href='<?= Routes::getBaseUrl() . "parking_update/" . $item->id; ?>' class='btn btn-primary' title='View or Update this contact'>View/Update</a>
                            <a href='<?= Routes::getBaseUrl() . "parking_delete/" . $item->id; ?>' class='btn btn-danger' title='Delete this booking'>Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>