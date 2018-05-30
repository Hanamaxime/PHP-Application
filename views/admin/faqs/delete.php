<div class="container-fluid">
  <h1 class="admin_h1">Delete FAQ</h1>
  <hr />
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12">
      <?php LeeController::addView("Shared/_admin_navigation"); ?>
    </div>
  <div class="col-lg-9 col-md-9">
    <?php
      echo "<p>".AqsController::$viewBag['err_msg']."</p>";
      echo "<p> <a class='btn btn-info btn-back' href='".Routes::getBaseUrl()."faq_admin'>Go Back</a></p>";
      ?>
    </div>
  </div>
</div>
