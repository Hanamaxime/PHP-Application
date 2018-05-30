<div class="container-fluid">
    <h1>Polls Admin Page</h1>
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
                    <th>Poll Group</th>
                    <th>Title</th>
                    <th>Poll Author</th>
                    <th>Votes</th>
                </tr>
                </thead>
                <tbody class="game_search_results">
                <?php
                $results = AndreiController::showPollsWithResults();
                foreach ($results as $item) { ?>
                    <tr>
                        <td><?= $item->poll_id; ?></td>
                        <td><?= substr($item->group_title, 0, 20) . "..."; ?></td>
                        <td><?= $item->poll_title; ?></td>
                        <td><?= $item->user_login; ?></td>
                        <td><?= $item->total_votes; ?></td>
                        <td>
                            <a href='<?= Routes::getBaseUrl() . "polls_update/" . $item->poll_id; ?>' class='btn btn-primary'>Update</a>

                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <p>No functionality to delete/add Poll, because it will mess up front-end.</p>
        </div>
    </div>
</div>