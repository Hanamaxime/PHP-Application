<?php

if (isset($_POST['resbtn'])) {

    AndreiController::addUser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['user_role'], $_POST['user_registered']);
    $userId = AndreiController::showUserByName($_POST['username']);
    AndreiController::addBooking($_POST['event_id'], $userId->ID, $_POST['visitDate'], $_POST['people'], $_POST['book_status'], $_POST['comment']);
//    AndreiController::addUserMeta($userId->ID, 'fname', $_POST['fname']);
//    AndreiController::addUserMeta($userId->ID, 'lname', $_POST['lname']);
//    $items =  AndreiController::showAllUsers();
     echo "<div class=\"container marketing\"><div class='alert alert-success'>
  Thank you,<strong> $userId->user_login</strong>, for registration!</div></div> ";
}
?>
<div class="container-fluid">
    <div class="dining-banner events-banner">

    </div>
</div>
<div class="container marketing">
    <div class="row featurette">

      <div class="col-lg-6">
          <small class="text-muted"><?php echo date("F j, Y", strtotime(AndreiController::$viewBag['event']->event_date_start)); ?></small>
          <h2 class="featurette-heading"><?= AndreiController::$viewBag['event']->event_title; ?></h2>
          <img class="featurette-image img-fluid mx-auto" src="<?= Routes::getBaseUrl() . AndreiController::$viewBag['event']->event_img; ?>" alt="<?php echo AndreiController::$viewBag['event']->event_title; ?>"
               title="<?php if (isset(AndreiController::$viewBag['event']->meta_key)) {
                   if ('credit' == AndreiController::$viewBag['event']->meta_key) {
                       echo AndreiController::$viewBag['event']->meta_value;
                   }
               }   ?>">
          <p class="lead"><?= AndreiController::$viewBag['event']->event_description; ?></p>
          <a class="btn btn-info" href="<?php echo Routes::getBaseUrl(). 'events'; ?>" title="Go back to all events">Back to Event Calendar</a>
      </div>



        <div class="col-lg-6">
            <h4 class="mb-3">Register for this Event</h4>
            <form class="form-control" action="" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="fname" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lname" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        <div class="invalid-feedback">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                    <div class="invalid-feedback">
                        Please enter your password.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="visitDate">Date of Visit</label>
                    <input type="date" class="form-control" id="visitDate" name="visitDate" value="<?php echo date("Y-m-d");?>" required>
                </div>

                <div class="mb-3">
                    <label for="people">How many people will come</label>
                    <select id="people" name="people" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" id="comment" name="comment" placeholder="Your comments"></textarea>
                </div>
                <input type="hidden" id="event_id" name="event_id" value="<?= AndreiController::$viewBag['event']->ID; ?>">
                <input type="hidden" id="book_status" name="book_status" value="open">
                <input type="hidden" id="user_role" name="user_role" value="public">
                <input type="hidden" id="user_registered" name="user_registered" value="<?php echo date("Y-m-d");?>">

                <button class="btn btn-primary btn-lg btn-block" type="submit" id="res-btn" name="resbtn" title="Reserve your visit to this event">Make a reservation</button>
            </form>
        </div>

        </div>

    </div>
</div>
