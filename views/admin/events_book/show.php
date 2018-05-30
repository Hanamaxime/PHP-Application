<div class="container-fluid">
    <h1>Events Bookings Admin Page</h1>
    <hr>
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <?php AndreiController::addView("Shared/_admin_navigation"); ?>
        </div>
        <div class="col-lg-9 col-md-9">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Event</th>
                    <th>User</th>
                    <th>Book Date</th>
                    <th>Plces</th>
                </tr>
                </thead>
                <tbody class="game_search_results">
                <?php
                $results = AndreiController::showAllBookings();
                foreach ($results as $item) { ?>
                    <tr>
                        <td><?= $item->event_title; ?></td>
                        <td><?= $item->user_login; ?></td>
                        <td><?= date("Y-m-d", strtotime($item->book_date)); ?></td>
                        <td><?= $item->book_places; ?></td>
                        <td>
                            <a href='<?= Routes::getBaseUrl() . "event_book_update/" . $item->event_id . "/" . $item->user_id; ?>' class='btn btn-primary' title='View or Update this booking'>View/Update</a>
                            <a href='<?= Routes::getBaseUrl() . "event_book_delete/" . $item->event_id . "/" . $item->user_id; ?>' class='btn btn-danger' title='Delete this booking'>Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <a href="<?php echo Routes::getBaseUrl(); ?>event_book_add" class="btn btn-primary" title="Add new booking">Add new Booking</a>
        </div>
    </div>
</div>