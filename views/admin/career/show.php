<div class="container-fluid">
  <h1>CAREER MANAGEMENT PAGE</h1>
  <hr>
  <div class="row">
    <div class="col-lg-3 col-md-3">
      <?php LeeController::addView("Shared/_admin_navigation"); ?>
    </div>
  <div class="col-lg-9 col-md-9">
    <div>
      <a href="<?php echo Routes::getBaseUrl(); ?>career_create" class="btn btn-success">Add New Job</a>
      <a href="<?php echo Routes::getBaseUrl(); ?>applicant_lists" class="btn btn-dark">View Applicants</a>
    </div>
    <div>
      <form action="#" method="post" role="search" id="career-search-frm" class="search-form">
                       <input type="submit" value="" id="btn-submit" class="search-submit">
                       <input type="search" name="search" id="search" class="search-text" placeholder="Search by job title..." autocomplete="off">
                   </form>
    </div>
    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th>Post</th>
          <th>Type</th>
          <th>Deadline</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="ticket_search_results">
        <?php
          $results = AqsController::showAllJobs();
          foreach($results as $item){
            echo "<tr>
            <td>".$item->job_title."</td>
            <td>".$item->job_type."</td>
            <td>".$item->job_expire_date."</td>
            <td>
            <a href='".Routes::getBaseUrl()."career_update/".$item->id."' class='btn btn-primary'>Update</a>
            <a href='".Routes::getBaseUrl()."career_delete/".$item->id."' class='btn btn-danger'>Delete</a>
            </td>
            </tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
  </div>
</div>

<script>
    $(function () {
                $("#career-search-frm").submit(function (event) {
            var search = $("#search").val();
            if (search == null || search == "") {
                alert("Please enter job title to search...");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Routes::getBaseUrl(); ?>search_job_by_name',
                    data: { search: search },
                    success: function (data) {
                    $(".ticket_search_results").html(data);
                    }
                    });
                    }
                    event.preventDefault();
                    });
    });
</script>
