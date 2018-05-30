<div class="container-fluid">
      <h1 class="admin_h1">FAQ MANAGEMENT SYSTEM</h1>
  <hr/>
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12">
      <?php LeeController::addView("Shared/_admin_navigation"); ?>
    </div>
  <div class="col-lg-9 col-md-9 col-sm-12">
    <div>
      <p>
        Welcome to FAQ Management System for Dazzlin Star Island Amusement Park.
      </p>
      <p>
        The repository contains all FAQs present in the database. You can perform CRUD operations here.
        To add a new question, click on 'CREATE NEW' below and you will be guided to a new page.
      </p>
      <a href="<?php echo Routes::getBaseUrl(); ?>faq_create" class="btn btn-success">CREATE NEW</a>
    </div>
    <div>
      <br/>
      <p>
        To search for a previously added or edited FAQ, enter the keyword or phrase
        in the search box below and press enter.
      </p>
      <form action="#" method="post" role="search" id="faq-search-frm" class="search-form">
                       <input type="submit" value="" id="btn-submit" class="search-submit">
                       <input type="search" name="search" id="search" class="search-text" placeholder="Search by question..." autocomplete="off">
                   </form>
    </div>
    <p>
      To edit or remove an FAQ, click on the action buttons in the last column i.e. 'UPDATE' and 'DELETE'.
    </p>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Question</th>
          <th>Category</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="faq_search_results">
        <?php
          $results = AqsController::showAllQuestion();
          foreach($results as $item){
            echo "<tr>
            <td>".$item->question."</td>
            <td>".$item->category."</td>
            <td>
            <a href='".Routes::getBaseUrl()."faq_update/".$item->id."' class='btn btn-primary btn-update'>UPDATE</a>
            <a href='".Routes::getBaseUrl()."faq_delete/".$item->id."' class='btn btn-danger btn-delete'>DELETE</a>
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
                $("#faq-search-frm").submit(function (event) {
            var search = $("#search").val();
            if (search == null || search == "") {
                alert("Please enter question to search...");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Routes::getBaseUrl(); ?>search_faq_by_admin',
                    data: { search: search },
                    success: function (data) {
                    $(".faq_search_results").html(data);
                    }
                    });
                    }
                    event.preventDefault();
                    });
    });
</script>
