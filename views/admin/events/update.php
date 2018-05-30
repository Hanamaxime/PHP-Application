
<div class="container">
    <h1>Update Event</h1>
    <hr>
    <div class="err_msg"><?php echo AndreiController::$viewBag['err_msg']; ?></div>
    <form action="#" method="post">
        <fieldset>
            <legend>Details</legend>

            <input type="hidden" name="id" value="<?php echo AndreiController::$viewBag['ID']; ?>"/>
            <div class="form-group">
                <label for="author">Author: </label>
                <select name="author" class="form-control">
                    <?php
                    $users = AndreiController::showAllUsers();
                    foreach ($users as $item) {
                        ?>
                        <option value="<?php echo $item->ID?>" <?php if (isset(AndreiController::$viewBag['event_author'])) {
                            if (AndreiController::$viewBag['event_author'] == $item->ID) {
                                echo "selected";
                            }
                        } ?>><?php echo $item->user_login; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="dstart">Date Start: </label>
                <input id="dstart" type="date" class="form-control" name="dstart" value="<?php if (isset(AndreiController::$viewBag['event_date_start'])) echo date("Y-m-d", strtotime(AndreiController::$viewBag['event_date_start'])); ?>"/>
            </div>
            <div class="form-group">
                <label for="finish">Date Finish: </label>
                <input id="finish" type="date" class="form-control" name="finish" value="<?php if (isset(AndreiController::$viewBag['event_date_finish'])) echo date("Y-m-d", strtotime(AndreiController::$viewBag['event_date_finish'])); ?>"/>
            </div>
            <div class="form-group">
                <label for="title">Title: </label>
                <input id="title" type="text" class="form-control" name="title" value="<?php if (isset(AndreiController::$viewBag['event_title'])) echo AndreiController::$viewBag['event_title']; ?>"/>
            </div>
            <div class="form-group">
                <label for="desc">Description: </label>
                <input id="desc" type="text" class="form-control" name="desc" value="<?php if (isset(AndreiController::$viewBag['event_description'])) echo AndreiController::$viewBag['event_description']; ?>"/>
            </div>
            <div class="form-group">
                <label for="status">Status: </label>
                <input id="status" type="text" class="form-control" name="status" value="<?php if (isset(AndreiController::$viewBag['event_status'])) echo AndreiController::$viewBag['event_status']; ?>"/>
            </div>
            <div class="form-group">
                <label for="category">Category: </label>
                <input id="category" type="text" class="form-control" name="category" value="<?php if (isset(AndreiController::$viewBag['event_category'])) echo AndreiController::$viewBag['event_category']; ?>"/>
            </div>
            <div class="form-group">
                <label for="location">Location: </label>
                <select name="location" class="form-control">
                    <?php
                    $users = AndreiController::showAllLocations();
                    foreach ($users as $item) {
                        ?>
                        <option value="<?php echo $item->ID?>" <?php if (isset($location)) {
                            if ($location == $item->ID) {
                                echo "selected";
                            }
                        } ?>><?php echo $item->loc_name; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Update event" name="btnSubmit" title="Update this event"/>

            <a href="<?php echo Routes::getBaseUrl(); ?>events_admin" class="btn btn-primary" title="Go back to all events in admin">Go back</a>
        </fieldset>
    </form>
</div>