<?php
if(isset($_SESSION['shopping_carts'])){
  unset($_SESSION['shopping_carts']);
  header("Location: home");
}
 ?>
