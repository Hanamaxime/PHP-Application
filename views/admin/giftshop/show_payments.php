<div class="container-fluid">
  <h1 class="admin_h1">TICKET PAYMENT HISTORY PAGE</h1>
  <hr>
  <div class="row">
    <div class="col-lg-3 col-md-3">
      <?php LeeController::addView("Shared/_admin_navigation"); ?>
    </div>
  <div class="col-lg-9 col-md-9">
    <div>
      <form action="#" method="post" role="search" id="ticket-payment-search-frm" class="search-form">
                       <input type="submit" value="" id="btn-submit" class="search-submit">
                       <input type="search" name="search" id="search" class="search-text" placeholder="Search by customer name..." autocomplete="off">
                   </form>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Customer Name</th>
          <th>Customer Email</th>
          <th>Customer Phone</th>
          <th>Date of visit</th>
          <th>Ticket purchased</th>
        </tr>
      </thead>
      <tbody class="ticket_search_results">
        <?php
          $results = LeeController::showAllPayments();
          foreach($results as $item): ?>
            <tr>
            <td><?php echo $item->customer_name; ?></td>
            <td><?php echo $item->customer_email; ?></td>
            <td><?php echo $item->customer_phone; ?></td>
            <td><?php echo $item->date_of_visit; ?></td>

            <?php foreach(LeeController::findTicketById($item->ticket_id) as $item1): ?>
            <td><?php echo $item1->ticket_title; ?></td>
            <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  </div>
</div>

<script>
    $(function () {
                $("#ticket-payment-search-frm").submit(function (event) {
            var search = $("#search").val();
            if (search == null || search == "") {
                alert("Please enter customer name to search...");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Routes::getBaseUrl(); ?>search_payment_ticket',
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
