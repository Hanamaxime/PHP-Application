<div class="container-fluid">
      <h1 class="admin_h1">UPDATE BOOK MASCOT</h1>
      <hr />
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="err_msg">
            <?php LeeController::addView("Shared/_admin_navigation"); ?>
          </div>
          </div>
          <div class="col-lg-9 col-md-9">
          <form action="#" method="post">
            <fieldset>
              <legend>Edit Mascot Booking Details</legend>
              <p>
                In the fields below, you can re-type information for selected Mascot Bookings
                and click on 'UPDATE' to submit the edited version. The updated Mascot Booking will
                be added to the admin page.
              </p>
            <div class='err_msg'><?php echo HanaController::$viewBag['err_msg']; ?></div>
          <div class="form-group">
           <label for="name">Name</label>
           <input type="text" class="form-control" name="name" value="<?php echo HanaController::$viewBag['name']; ?>" placeholder="Enter Full Name" />
          </div>
          <div class="form-group">
           <label for="group_size">How many people are in your group?</label>
           <input type="text" class="form-control" name="group_size" value="<?php echo HanaController::$viewBag['group_size']; ?>" placeholder="Enter Group Size: Max - 12" />
          </div>
          <div class="form-group">
           <label for="date_of_meet">Date of Meet</label>
           <input type="date" class="form-control" name="date_of_meet" value="<?php echo HanaController::$viewBag['date_of_meet']; ?>" />
          </div>
          <label for="time_of_meet">Select Time Slot</label>
            <fieldset>
              <?php
              $time_slots = array('02:00 PM','02:15 PM','02:30 PM','02:45 PM','03:00 PM','03:15 PM','03:30 PM','03:45 PM','04:00 PM','04:15 PM','04:30 PM','04:45 PM','05:00 PM');
              $checked = "";
              for ($i=0; $i < count($time_slots); $i++) {
                $checked = $time_slots[$i] == HanaController::$viewBag['time_of_meet'] ? "checked" : "";
                echo "<br><input type='radio' ".$checked." name='time_of_meet' value= '".$time_slots[$i]."' />".$time_slots[$i] ;
              }
              ?>
          </fieldset>
          </p>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name ="email" value="<?php echo HanaController::$viewBag['email']; ?>" placeholder="spaceadventurer@galaxy.com">
          </div>
          <div class="form-group">
           <label for="phone">Phone Number</label>
           <input type="text" class="form-control" name="phone"  value="<?php echo HanaController::$viewBag['phone']; ?>" placeholder="999-9999-999">
          </div>
          <br/>
          <input type="submit" class="btn btn-success" name="btnSubmit" id="btnSubmit" value="UPDATE"/>
          <a href="<?php echo Routes::getBaseUrl(); ?>mascot_admin" class="btn btn-primary">GO BACK</a>
        </fieldset>
        </form>
