<div class="container">
    <h1>Update Contact</h1>
    <hr>
    <div class="err_msg"><?php echo YuriyController::$viewBag['err_msg']; ?></div>
    <form action="#" method="post">
        <fieldset>
            <legend>Details</legend>

            <input type="hidden" name="id" value="<?php echo YuriyController::$viewBag['id']; ?>"/>


            <div class="form-group">
                <label for="event_title">Name</label>
                <input type="text" class="form-control" name="name" value="<?php if (isset(YuriyController::$viewBag['name'])) echo YuriyController::$viewBag['name']; ?>">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" value="<?php if (isset(YuriyController::$viewBag['email'])) echo YuriyController::$viewBag['email']; ?>">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php if (isset(YuriyController::$viewBag['phone'])) echo YuriyController::$viewBag['phone']; ?>">
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" name="subject" value="<?php if (isset(YuriyController::$viewBag['subject'])) echo YuriyController::$viewBag['subject']; ?>">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea type="text" class="form-control" name="message"><?php if (isset(YuriyController::$viewBag['message'])) echo YuriyController::$viewBag['message']; ?></textarea>
            </div>

            <input type="submit" class="btn btn-success" value="Update booking" name="btnSubmit" title="Update this contact"/>

            <a href="<?php echo Routes::getBaseUrl(); ?>contact_admin" class="btn btn-primary" title="Go back to all contacts">Go back</a>
        </fieldset>
    </form>
</div>