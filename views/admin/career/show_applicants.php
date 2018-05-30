<div class="container-fluid">
  <h1>CAREER MANAGEMENT PAGE</h1>
  <hr>
  <div class="row">
    <div class="col-lg-3 col-md-3">
      <?php LeeController::addView("Shared/_admin_navigation"); ?>
    </div>
  <div class="col-lg-9 col-md-9">

    <div>
      <form action="#" method="post" role="search" id="applicant-search-frm" class="search-form">
                       <input type="submit" value="" id="btn-submit" class="search-submit">
                       <input type="search" name="search" id="search" class="search-text" placeholder="Search by applicant name..." autocomplete="off">
                   </form>
    </div>
    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Position</th>
          <th>Email</th>
          <th>CV/ Resume Link</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="ticket_search_results">
        <?php
          $results = AqsController::showApplicants();
          foreach($results as $item){
            echo "<tr>
            <td>".$item->full_name."</td>";

            foreach(AqsController::findJobByID($item->career_fk_id) as $item1){
              echo "<td>".$item1->job_title."</td>";
            }


            echo "<td>".$item->email."</td>
            <td><a href='".$item->resume_url."' target='_blank'>View Applicant</a></td>
            <td>
            <a href='".Routes::getBaseUrl()."applicant_view/".$item->id."' class='btn btn-primary'>Open</a>
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
                $("#applicant-search-frm").submit(function (event) {
            var search = $("#search").val();
            if (search == null || search == "") {
                alert("Please enter product name to search...");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Routes::getBaseUrl(); ?>search_applicant_by_name',
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
