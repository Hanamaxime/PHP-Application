<div class="container-fluid">
  <h1 class="admin_h1">Delete Mascot Meetup Booking</h1>
  <hr />
  <div class="row">
    <div class="col-lg-3 col-md-3">
      <?php HanaController::addView("Shared/_admin_navigation"); ?>
    </div>
  <div class="col-lg-9 col-md-9">
    <?php
      echo "<p>".HanaController::$viewBag['err_msg']."</p>";
      //go back button
      echo "<p> <a class='btn btn-info btn-back' href='".Routes::getBaseUrl()."mascot_admin'>Go Back</a></p>";
      ?>
    </div>
  </div>
</div>
