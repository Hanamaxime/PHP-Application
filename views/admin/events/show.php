<div class="container-fluid">
    <h1>Events Admin Page</h1>
    <hr>
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <?php AndreiController::addView("Shared/_admin_navigation"); ?>
        </div>
        <div class="col-lg-9 col-md-9">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>Finish Date</th>
                </tr>
                </thead>
                <tbody class="game_search_results">
                <?php
                $results = AndreiController::showAllEvents();
                foreach ($results as $item) { ?>
                    <tr>
                        <td><?= $item->ID; ?></td>
                        <td><?= $item->event_title; ?></td>
                        <td><?= date("Y-m-d", strtotime($item->event_date_start)); ?></td>
                        <td><?= date("Y-m-d", strtotime($item->event_date_finish)); ?></td>
                        <td>
                        <a href='<?= Routes::getBaseUrl() . "event_update/" . $item->ID; ?>' class='btn btn-primary' title='View or Update this event'>View / Update</a>
                        <a href='<?= Routes::getBaseUrl() . "event_delete/" . $item->ID; ?>' class='btn btn-danger' title='Delete this event'>Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <a href="<?php echo Routes::getBaseUrl(); ?>event_add" class="btn btn-primary" title="Add new event">Add new Event</a>
        </div>
    </div>
</div>