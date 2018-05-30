<?php
if(count($_SESSION['shopping_carts']) <= 0){
  die("Shopping cart is empty. Please <a href='".Routes::getBaseUrl()."checkout'>Click here</a> to go back to home page!");
}

//add shipping session HERE
  $_SESSION['shipping_info']['customer_name'] = HomeController::$viewBag['firstname']." ".HomeController::$viewBag['lastname'];
  $_SESSION['shipping_info']['customer_email'] = HomeController::$viewBag['email'];
  $_SESSION['shipping_info']['customer_number'] = HomeController::$viewBag['phone'];
  $_SESSION['shipping_info']['customer_address'] = HomeController::$viewBag['address'].", ".HomeController::$viewBag['postcode'];

 ?>

<div class="container">
  <h1>Shipping Information</h1>
  <ul>
    <li>Please fill in all information below</li>
    <li>Shipping time may vary depending on your location. It usually takes 3-5 of business day!</li>
  </ul>
  <form action="#" method="post" name="shipping-frm" id="shipping-frm">
    <div class="err_msg">
      <?php echo HomeController::$viewBag['err_msg']; ?>
    </div>
    <div class="form-group">
      <label for="firstname">First name</label>
      <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo HomeController::$viewBag['firstname']; ?>" placeholder="Enter your first name.."/>
    </div>
    <div class="form-group">
      <label for="lastname">Last name</label>
      <input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo HomeController::$viewBag['lastname']; ?>" placeholder="Enter your last name.."/>
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input class="form-control" type="email" name="email" id="email" value="<?php echo HomeController::$viewBag['email']; ?>" placeholder="Enter your email.."/>
    </div>
    <div class="form-group">
      <label for="phone">Contact number</label>
      <input class="form-control" type="text" name="phone" id="phone" value="<?php echo HomeController::$viewBag['phone']; ?>" placeholder="Enter your contact number.."/>
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input class="form-control" type="text" name="address" id="address" value="<?php echo HomeController::$viewBag['address']; ?>" placeholder="Enter your shipping address.."/>
    </div>
    <div class="form-group">
      <label for="postcode">Postcode</label>
      <input class="form-control" type="text" name="postcode" id="postcode" value="<?php echo HomeController::$viewBag['postcode']; ?>" placeholder="Enter your postcode.."/>
    </div>
    <div class="err_msg"></div>
    <input type="submit" name="btn-proceed" id="btn-proceed" class="btn btn-success" value="Pay Now"/>
    <a href="<?php echo Routes::getBaseUrl() ?>checkout" class="btn btn-info">Back to Check Out</a>
  </form>
</div>
