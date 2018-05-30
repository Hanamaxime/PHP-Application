<div class="container">
    <h1>Update Poll</h1>
    <hr>
    <div class="err_msg"><?php echo AndreiController::$viewBag['err_msg']; ?></div>
    <form action="#" method="post">
        <fieldset>
            <legend>Details</legend>

            <input type="hidden" name="ID" value="<?php echo AndreiController::$viewBag['ID']; ?>"/>

            <div class="form-group">
                <label for="author">Author: </label>
                <select id="author" name="poll_author" class="form-control">
                    <?php
                    $users = AndreiController::showAllUsers();
                    foreach ($users as $item) {
                        ?>
                        <option value="<?php echo $item->ID?>" <?php if (isset(AndreiController::$viewBag['poll_author'])) {
                            if (AndreiController::$viewBag['poll_author'] == $item->ID) {
                                echo "selected";
                            }
                        } ?>><?php echo $item->user_login; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="poll_title">Poll Title</label>
                <input type="text" class="form-control" id="poll_title" name="poll_title" value="<?php if (isset(AndreiController::$viewBag['poll_title'])) echo AndreiController::$viewBag['poll_title']; ?>">
            </div>

            <div class="form-group">
                <label for="poll_description">Description</label>
                <input type="text" class="form-control" id="poll_description" name="poll_description" value="<?php if (isset(AndreiController::$viewBag['poll_description'])) echo AndreiController::$viewBag['poll_description']; ?>">
            </div>

            <div class="form-group">
                <label for="poll_status">Status</label>
                <input type="text" class="form-control" id="poll_status" name="poll_status" value="<?php if (isset(AndreiController::$viewBag['poll_status'])) echo AndreiController::$viewBag['poll_status']; ?>">
            </div>

            <div class="form-group">
                <label for="allow_mult">Can user have multiple choices?</label>
                <select id="allow_mult" name="allow_mult" class="form-control">
                    <option value="Y" <?php
                    if ('Y' == AndreiController::$viewBag['allow_mult']) {
                        echo "selected";
                    }
                    ?>>Yes</option>
                    <option value="N" <?php
                    if ('N' == AndreiController::$viewBag['allow_mult']) {
                        echo "selected";
                    }
                    ?>>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="allow_again">Can user answer once again?</label>
                <select id="allow_again" name="allow_again" class="form-control">
                    <option value="Y" <?php
                    if ('Y' == AndreiController::$viewBag['allow_again']) {
                        echo "selected";
                    }
                    ?>>Yes</option>
                    <option value="N" <?php
                    if ('N' == AndreiController::$viewBag['allow_again']) {
                        echo "selected";
                    }
                    ?>>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="group_id">Poll group</label>
                <input type="text" readonly class="form-control" id="group_id" name="group_id" value="<?php if (isset(AndreiController::$viewBag['group_id'])) echo AndreiController::$viewBag['group_id']; ?>">

            </div>


            <input type="submit" class="btn btn-success" value="Update Poll" name="btnSubmit"/>

            <a href="<?php echo Routes::getBaseUrl(); ?>polls_admin" class="btn btn-primary">Go back</a>
        </fieldset>
    </form>
</div>