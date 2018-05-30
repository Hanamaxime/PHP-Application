<div class="container-fluid">
  <h1 class="admin_h1">TICKET MANAGEMENT PAGE</h1>
  <hr>
  <div class="row">
    <div class="col-lg-3 col-md-3">
      <?php LeeController::addView("Shared/_admin_navigation"); ?>
    </div>
  <div class="col-lg-9 col-md-9">
    <div>
      <a href="<?php echo Routes::getBaseUrl(); ?>ticket_add_new" class="btn btn-success">Create new</a>
      <a href="<?php echo Routes::getBaseUrl(); ?>ticket_payments" class="btn btn-info">View Payments</a>
    </div>
    <div>
      <form action="#" method="post" role="search" id="ticket-search-frm" class="search-form">
                       <input type="submit" value="" id="btn-submit" class="search-submit">
                       <input type="search" name="search" id="search" class="search-text" placeholder="Search by product name..." autocomplete="off">
                   </form>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Thumbnail</th>
          <th>Product Price</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="ticket_search_results">
        <?php
          $results = LeeController::showAllTickets();
          foreach($results as $item){
            echo "<tr>
            <td>".$item->ticket_title."</td>
            <td><img style='width:20%;' src='".Routes::getBaseUrl().$item->ticket_thumbnail."' class='img-fluid'/></td>
            <td>$".$item->ticket_price."</td>
            <td>
            <a href='".Routes::getBaseUrl()."ticket_update/".$item->id."' class='btn btn-primary'>Update</a>
            <a href='".Routes::getBaseUrl()."ticket_delete/".$item->id."/".$item->ticket_thumbnail."' class='btn btn-danger'>Delete</a>
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
                $("#ticket-search-frm").submit(function (event) {
            var search = $("#search").val();
            if (search == null || search == "") {
                alert("Please enter product name to search...");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Routes::getBaseUrl(); ?>search_ticket_by_name',
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
