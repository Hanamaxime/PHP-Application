<div class="container-fluid">
  <h1>PAYMENT HISTORY</h1>
  <hr>
  <div class="row">
    <div class="col-lg-3 col-md-3">
      <?php LeeController::addView("Shared/_admin_navigation"); ?>
    </div>
  <div class="col-lg-9 col-md-9">
    <div>
      <form action="#" method="post" role="search" id="payment-search-frm" class="search-form">
                       <input type="submit" value="" id="btn-submit" class="search-submit">
                       <input type="search" name="search" id="search" class="search-text" placeholder="Search by payment id..." autocomplete="off">
                   </form>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Payment ID</th>
          <th>Product Name</th>
          <th>Product Price</th>
          <th>Payment Page</th>
          <th>Made by</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="payment_search_results">
        <?php
          $results = HomeController::showAllPayments();
          foreach($results as $item){
            echo "<tr>
            <td>".$item->payment_id."</td>
            <td>".$item->product_name."</td>
            <td>".$item->product_price."</td>
            <td>".$item->payment_from_page."</td>
            <td>".$item->customer_name."</td>
            <td>
            <a href='".Routes::getBaseUrl()."payment_view/".$item->id."' class='btn btn-primary'>View</a>
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
                $("#payment-search-frm").submit(function (event) {
            var search = $("#search").val();
            if (search == null || search == "") {
                alert("Please enter Payment ID to search...");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Routes::getBaseUrl(); ?>search_payment_by_id',
                    data: { search: search },
                    success: function (data) {
                    $(".payment_search_results").html(data);
                    }
                    });
                    }
                    event.preventDefault();
                    });
    });
</script>
