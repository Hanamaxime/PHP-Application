<div class="container">
  <div class="jumbotron">
    <?php foreach(HomeController::$viewBag['payment_details'] as $item) : ?>
      <ul>
        <li><strong>Payment ID:</strong> <?php echo $item->payment_id; ?></li>
        <li><strong>Product Name:</strong> <?php echo $item->product_name; ?></li>
        <li><strong>Quantity:</strong> <?php echo $item->product_quantity; ?></li>
        <li><strong>Amount:</strong> $<?php echo $item->product_price; ?></li>
        <li><strong>Payment from:</strong> <?php echo $item->payment_from_page; ?></li>
        <li><strong>Customer Name:</strong> <?php echo $item->customer_name; ?></li>
        <li><strong>Customer Email:</strong> <?php echo $item->customer_email; ?></li>
        <li><strong>Contact Number:</strong> <?php echo $item->customer_number; ?></li>
        <li><strong>Address:</strong> <?php echo $item->customer_address; ?></li>

      </ul>
    <?php endforeach; ?>
  </div>
  <a href="<?php echo Routes::getBaseUrl(); ?>payment_history" class="btn btn-primary">Go back</a>
</div>
