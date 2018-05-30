<div class="container">
    <h1>Update Booking</h1>
    <hr>
    <div class="err_msg"><?php echo AndreiController::$viewBag['err_msg']; ?></div>
    <form action="#" method="post">
        <fieldset>
            <legend>Details</legend>

            <input type="hidden" name="event_id" value="<?php echo AndreiController::$viewBag['event_id']; ?>"/>
            <input type="hidden" name="user_id" value="<?php echo AndreiController::$viewBag['user_id']; ?>"/>

            <div class="form-group">
                <label for="event_title">Event</label>
                <input type="text" readonly class="form-control" id="event_title" name="event_title" value="<?php if (isset(AndreiController::$viewBag['event_title'])) echo AndreiController::$viewBag['event_title']; ?>">
            </div>

            <div class="form-group">
                <label for="user_login">User</label>
                <input type="text" readonly class="form-control" id="user_login" name="user_login" value="<?php if (isset(AndreiController::$viewBag['user_login'])) echo AndreiController::$viewBag['user_login']; ?>">
            </div>

            <div class="form-group">
                <label for="book_date">Date of Booking</label>
                <input type="text" class="form-control" id="book_date" name="book_date" value="<?php if (isset(AndreiController::$viewBag['book_date'])) echo date("Y-m-d", strtotime(AndreiController::$viewBag['book_date'])); ?>">
            </div>

            <div class="form-group">
                <label for="book_places">Number of people</label>
                <input type="text" class="form-control" id="book_places" name="book_places" value="<?php if (isset(AndreiController::$viewBag['book_places'])) echo AndreiController::$viewBag['book_places']; ?>">
            </div>

            <div class="form-group">
                <label for="book_status">Status of Booking</label>
                <input type="text" class="form-control" id="book_status" name="book_status" value="<?php if (isset(AndreiController::$viewBag['book_status'])) echo AndreiController::$viewBag['book_status']; ?>">
            </div>

            <div class="form-group">
                <label for="book_comment">Comment to Booking</label>
                <input type="text" class="form-control" id="book_comment" name="book_comment" value="<?php if (isset(AndreiController::$viewBag['book_comment'])) echo AndreiController::$viewBag['book_comment']; ?>">
            </div>

            <input type="submit" class="btn btn-success" value="Update booking" name="btnSubmit" title="Update this booking event"/>

            <a href="<?php echo Routes::getBaseUrl(); ?>events_book_admin" class="btn btn-primary" title="Go back to all booking events in admin">Go back</a>
        </fieldset>
    </form>
</div>