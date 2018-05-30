<?php
  $item = HomeController::$viewBag;
  //add item to shopping cart
  array_push($_SESSION['shopping_carts'],$item);
 ?>


 <div class="container">
   <div class="jumbotron">
     <h1>Congratulation! You have added the following items to the shopping cart:</h1>
     <p><strong>Product name:</strong> <?php echo $item['product_name']; ?></p>
     <p><strong>Quantity:</strong> <?php echo $item['product_quantity']; ?></p>
     <p><strong>Product Price:</strong> $<?php echo $item['product_price']; ?></p>
     <p>
       <a href="<?php echo Routes::getBaseUrl() ?>checkout">Click here</a> to Check Out page
     </p>
   </div>
 </div>
