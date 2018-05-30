
<div class="container">
  <h1>Add new Job</h1>
  <hr>
  <div class="err_msg"><?php echo AqsController::$viewBag['err_msg']; ?></div>
  <form action="#" method="post">
    <fieldset>
      <legend>Details</legend>

      <div class="form-group">
        <label for="job_title">Job title</label>
        <input type="text" class="form-control" name="job_title" id="job_title" value="<?php echo AqsController::$viewBag['job_title']; ?>">
      </div>
      <div class="form-group">
        <label for="job_salary">Job Salary</label>
        <input type="number" class="form-control" name="job_salary" id="job_salary" value="<?php echo AqsController::$viewBag['job_salary']; ?>">
      </div>
      <div class="form-group">
        <label for="job_type">Job Type</label>
        <select name="job_type" id="job_type" class="form-control">
          <option value="Full-time">Full-time</option>
          <option value="Part-time">Part-time</option>
        </select>
      </div>
    <div class="form-group">
      <label for="job_desc">Job Description</label>
      <textarea class="form-control adm-textarea" name="job_desc" id="job_desc"><?php echo AqsController::$viewBag['job_desc']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="job_requirements">Job Requirements</label>
      <textarea class="form-control adm-textarea" name="job_requirements" id="job_requirements"><?php echo AqsController::$viewBag['job_requirements']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="job_benefits">Job Benefits</label>
      <textarea class="form-control adm-textarea" name="job_benefits" id="job_benefits"><?php echo AqsController::$viewBag['job_benefits']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="job_start_date">Start date</label>
      <input type="date" class="form-control" name="job_start_date" id="job_start_date" value="<?php echo AqsController::$viewBag['job_start_date']; ?>">
    </div>
    <div class="form-group">
      <label for="job_expire_date">Expire date</label>
      <input type="date" class="form-control" name="job_expire_date" id="job_expire_date" value="<?php echo AqsController::$viewBag['job_expire_date']; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="btnSubmit" id="btnSubmit" value="Create"/>
    <a href="<?php echo Routes::getBaseUrl(); ?>career_admin" class="btn btn-primary">Go back</a>
    </fieldset>
  </form>
</div>
