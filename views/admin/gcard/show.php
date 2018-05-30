<div class="container-fluid">
  <h1 class="admin_h1">GIFTCARD ORDERS</h1>
  <hr/>
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12">
      <?php LeeController::addView("Shared/_admin_navigation"); ?>
    </div>
  <div class="col-lg-9 col-md-9 col-sm-12">
    <div>
      <form action="#" method="post" role="search" id="gcard-search-frm" class="search-form">
        <input type="submit" value="" id="btn-submit" class="search-submit">
        <input type="search" name="search" id="search" class="search-text" placeholder="Search by sender name..." autocomplete="off">
      </form>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Sender</th>
          <th>Receiver</th>
          <th>Amount</th>
          <th>Receiver Email</th>
        </tr>
      </thead>
      <tbody class="gcard_search_results">
        <?php
          $results = AqsController::showAllOrders();
          foreach($results as $item){
            echo "<tr>
            <td>".$item->sender."</td>
            <td>".$item->receiver."</td>
            <td>$".$item->amount."</td>
            <td>".$item->email."</td>
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
                $("#gcard-search-frm").submit(function (event) {
            var search = $("#search").val();
            if (search == null || search == "") {
                alert("Please enter sender name to search...");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Routes::getBaseUrl(); ?>search_by_sender_name',
                    data: { search: search },
                    success: function (data) {
                    $(".gcard_search_results").html(data);
                    }
                    });
                    }
                    event.preventDefault();
                    });
    });
</script>
