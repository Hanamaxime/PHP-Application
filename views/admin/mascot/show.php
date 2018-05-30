<div class="container-fluid">
    <h1>Mascot Admin Page</h1>
    <hr>
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <?php HanaController::addView("Shared/_admin_navigation"); ?>
        </div>
        <div class="col-lg-9 col-md-9">
          <a href="<?php echo Routes::getBaseUrl(); ?>mascot" class="btn btn-primary">Mascot Booking</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Group Size</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $results = HanaController::showMascot();
                foreach ($results as $item) { ?>
                    <tr>
                      <td><?= $item->id; ?></td>
                      <td><?= $item->name; ?></td>
                      <td><?= $item->group_size; ?></td>
                      <td><?= date("Y-m-d", strtotime($item->date_of_meet)); ?></td>
                      <td><?= $item->time_of_meet; ?></td>
                      <td><?= $item->email; ?></td>
                      <td><?= $item->phone; ?></td>
                        <td>
                        <a href='<?= Routes::getBaseUrl() . "mascot_update/" . $item->id; ?>' class='btn btn-primary'>Update</a>
                        <a href='<?= Routes::getBaseUrl() . "mascot_delete/" . $item->id; ?>' class='btn btn-danger'>Delete</a>
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
