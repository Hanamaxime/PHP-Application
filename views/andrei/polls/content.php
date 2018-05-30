<div class="container-fluid">
    <div class="dining-banner poll-banner">
        <div class="headliner">
            <div class="headliner-content">
                <h1>Vote for the best option</h1>
                <p class="related">
                    Take a minute to decide which amenities you would enjoy.
                    <a class="gold-btn" href="#polldesc">VOTE
                        &nbsp;<i class="fas fa-angle-right arrow"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['poll_id'])) {
    // update results
    AndreiController::addPollResult($_POST['poll_id'], $_POST['poll_group_id'], 17);
    ?>

    <div class="container">
        <h2 class="feature_event_title pb-4">Results</h2>
    <div class="row">
    <?php
    foreach (AndreiController::showAllPollGroups() as $group) {


        $polls = array();
        $polls['total'] = 0;
        $i = 0;
        // show results of polls
        foreach (AndreiController::getPollResultsByGroup($group->ID) as $results) {
//        echo "poll ID " . $results->poll_id . " has " . $results->total_votes . " votes<br/>";
            $name = AndreiController::getPollById($results->poll_id);
            $polls[$i]['poll_name'] = $name->poll_title;
            $polls[$i]['poll_id'] = $results->poll_id;
            $polls[$i]['total_votes'] = $results->total_votes;
            $polls['total'] += $results->total_votes;
            $i++;
        }
        // calculate total and precentages
        for ($i = 0; $i < 3; $i++) {
            $polls[$i]['percent'] = ($polls[$i]['total_votes'] / $polls['total']) * 100;
        }

        ?>

        <div id="bar-chart" class="col-sm-4">
            <h2 class="feature_event_title pb-4"><?= $group->group_title; ?></h2>
        <div class="graph">
            <ul class="y-axis">
                <li><span>100</span></li>
                <li><span>75</span></li>
                <li><span>50</span></li>
                <li><span>25</span></li>
                <li><span>0</span></li>
            </ul>
            <div class="bars">
                <div class="bar-group">
                    <?php
                    for ($i = 0; $i < 3; $i++) {
                        ?>
                        <div class="bar bar-<?php echo $i + 1; ?> stat-<?php echo $i + 1; ?>"
                             style="height: <?php echo $polls[$i]['percent']; ?>%;">
                            <span><?php echo $polls[$i]['total_votes']; ?></span>
                        </div>
                        <?php
                    }
                    ?>
                </div> <!-- end of div class="bar-group" -->
            </div> <!-- end of div class="bars" -->
        </div> <!-- end of div class="graph" -->
        <?php
        for ($i = 0; $i < 3; $i++) {
            ?>
            <div class="legend">
                <div class="legend__col legend__col-<?= $i; ?>">
                    <?php echo $polls[$i]['poll_name'], ", votes: ", $polls[$i]['total_votes']; ?>
                    <?php //echo $polls[$i]['total_votes']; ?>
                </div>

            </div>
            <?php
        }
        ?>
        </div> <!-- end of div id="bar-chart" -->

        <?php
    }
        ?>

    </div> <!-- end of div class=results-container-->
    </div>
    <a class="btn btn-light" href="<?php echo Routes::getBaseUrl(). 'polls'; ?>">Back to all polls</a>

    <?php
} else {
?>
<div class="album py-5 bg-light">
    <div class="container">
        <span><a href="<?= Routes::getBaseUrl() . "home"; ?>"><i class="fas fa-home"></i></a> / <a href="<?= Routes::getBaseUrl() . "polls"; ?>">polls</a></span>
        <section class="poll-wrapper">
            <h2 class="feature_event_title" id="polldesc">Your voice matters</h2>
            <p class="lead">Take a minute to decide which amenities you would like see introduced in our theme park in the near future. Your opinion matters.</p>

        <?php
        $i = 1;
        foreach (AndreiController::$viewBag['poll_groups'] as $group) {

            ?>
            <p class="lead font-weight-bold"><?php echo $group->group_title; ?></p>
            <div class="choices-wrapper">

            <?php

            foreach (AndreiController::$viewBag['polls'] as $item) {
//                var_dump($item);
                if ($group->ID == $item->poll_group_id) {
                    ?>
                    <div class="poll-item ch<?php echo $i; ?>">
                        <div class="item-details">
                            <h3><?php echo $item->poll_description; ?></h3>
                            <h1 class="poll_title"><?php echo $item->poll_title; ?></h1>
                            <form name="form-poll-<?php echo $item->ID; ?>" method="post" action="">
                                <input type="hidden" name="poll_id" value="<?php echo $item->ID; ?>"/>
                                <input type="hidden" name="poll_group_id" value="<?php echo $group->ID; ?>"/>
                                <input type="submit" class="btn btn-light vote" name="btn-poll-<?php echo $item->ID; ?>" value="Vote"/>
                            </form>

                        </div>
                    </div>
                    <?php
                    $i++;
                }

            }
            ?>
            </div>
                <?php
        }
        ?>





</section>
<!--<section class="poll-details">-->
<!--    <p class="lead">We have three options for you: A canoe trip, a bicycle ride or a professional photo session. Please choose one and see the results.</p>-->
<!--</section>-->
</div>
</div>
<?php }
?>