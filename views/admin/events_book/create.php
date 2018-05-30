<div class="container">
    <h1>Update Booking</h1>
    <hr>
    <div class="err_msg"><?php echo AndreiController::$viewBag['err_msg']; ?></div>
<form class="form-control" action="" method="post">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="user_id">Select User</label>
            <select class="form-control" id="user_id" name="user_id" required>
                <?php
                foreach (AndreiController::$viewBag['users'] as $user) {
                    ?>
                    <option value="<?= $user->ID; ?>"><?= $user->user_login; ?></option>
                    <?php
                }
                ?>

            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label for="event_id">Select Event</label>
            <select class="form-control" id="event_id" name="event_id" required>
                <?php
                foreach (AndreiController::$viewBag['events'] as $user) {
                    ?>
                    <option value="<?= $user->ID; ?>"><?= $user->event_title; ?></option>
                    <?php
                }
                ?>

            </select>
        </div>


    </div>


    <div class="mb-3">
        <label for="visitDate">Date of Visit</label>
        <input type="date" class="form-control" id="visitDate" name="book_date" value="<?php echo date("Y-m-d");?>" required>
    </div>

    <div class="mb-3">
        <label for="people">How many people will come</label>
        <select id="people" name="book_places" class="form-control" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="comment">Comment</label>
        <textarea class="form-control" id="comment" name="book_comment" placeholder="Your comments"></textarea>
    </div>

    <input type="hidden" id="book_status" name="book_status" value="open">

    <button class="btn btn-primary btn-lg btn-block" type="submit" id="res-btn" name="btnSubmit">Create booking</button>
</form>
</div>