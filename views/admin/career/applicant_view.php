<div class="container">
  <div class="jumbotron">
    <?php foreach(AqsController::$viewBag as $item) : ?>
      <ul>
        <li><strong>Full Name:</strong> <?php echo $item->full_name; ?></li>
        <li><strong>Address:</strong> <?php echo $item->address; ?></li>
        <li><strong>Contact number:</strong> <?php echo $item->phone; ?></li>
        <li><strong>Email:</strong> <?php echo $item->email; ?></li>
        <li><strong>Job from:</strong> <?php echo $item->job_from; ?></li>
        <li><strong>Available from:</strong> <?php echo $item->start_working_date; ?></li>
        <li><strong>Resume URL:</strong> <a href="<?php echo $item->resume_url; ?>">Click to view</a></li>

      </ul>
    <?php endforeach; ?>
  </div>
  <a href="<?php echo Routes::getBaseUrl(); ?>career_admin" class="btn btn-primary">Go back</a>
</div>
