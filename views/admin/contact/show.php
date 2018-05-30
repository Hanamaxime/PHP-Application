<div class="container-fluid">
    <h1>Contact Admin Page</h1>
    <hr>
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <?php YuriyController::addView("Shared/_admin_navigation"); ?>
        </div>
        <div class="col-lg-9 col-md-9">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody class="game_search_results">
                <?php
                $results = YuriyController::showAllContacts();
                foreach ($results as $item) { ?>
                    <tr>
                        <td><?= $item->name; ?></td>
                        <td><?= $item->email; ?></td>
                        <td><?= $item->phone; ?></td>
                        <td><?= $item->subject; ?></td>
                        <td><?= $item->message; ?></td>
                        <td>
                            <a href='<?= Routes::getBaseUrl() . "contact_update/" . $item->id; ?>' class='btn btn-primary' title='View or Update this contact'>View/Update</a>
                            <a href='<?= Routes::getBaseUrl() . "contact_delete/" . $item->id; ?>' class='btn btn-danger' title='Delete this booking'>Delete</a>
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