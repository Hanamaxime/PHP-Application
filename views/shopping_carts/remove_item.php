<?php
  if(count($_SESSION['shopping_carts']) <= 1){
    unset($_SESSION['shopping_carts']);
  }else{
    unset($_SESSION['shopping_carts'][HomeController::$viewBag]);
    $_SESSION['shopping_carts'] = array_merge($_SESSION['shopping_carts']);
  }

  header("Location: ".Routes::getBaseUrl()."checkout");
 ?>
