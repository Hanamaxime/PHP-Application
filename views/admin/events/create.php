
<div class="container">
    <h1>Create Event</h1>
    <hr>
    <div class="err_msg"><?php echo AndreiController::$viewBag['err_msg']; ?></div>
    <form action="#" method="post">
        <fieldset>
            <legend>Details</legend>

            <div class="inpt">
                <label for="author">Author: </label>
                <select name="author">
                    <?php
                    $users = AndreiController::showAllUsers();
                    foreach ($users as $item) {
                        ?>
                        <option value="<?php echo $item->ID?>"><?php echo $item->user_login; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="inpt">
                <label for="dstart">Date Start: </label>
                <input id="dstart" type="date" name="dstart" value="<?= date("Y-m-d")?>"/>
            </div>
            <div class="inpt">
                <label for="finish">Date Finish: </label>
                <input id="finish" type="date" name="finish" value="<?= date("Y-m-d")?>"/>
            </div>
            <div class="inpt">
                <label for="title">Title: </label>
                <input id="title" type="text" name="title" value=""/>
            </div>
            <div class="inpt">
                <label for="desc">Description: </label>
                <input id="desc" type="text" name="desc" value=""/>
            </div>
            <div class="inpt">
                <label for="status">Status: </label>
                <input id="status" type="text" name="status" value=""/>
            </div>
            <div class="inpt">
                <label for="category">Category: </label>
                <input id="category" type="text" name="category" value=""/>
            </div>
            <div class="inpt">
                <label for="location">Location: </label>
                <select name="location">
                    <?php
                    $users = AndreiController::showAllLocations();
                    foreach ($users as $item) {
                        ?>
                        <option value="<?php echo $item->ID?>"><?php echo $item->loc_name; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Create event" name="btnSubmit"/>

            <a href="<?php echo Routes::getBaseUrl(); ?>events_admin" class="btn btn-primary">Go back</a>
        </fieldset>
    </form>
</div>