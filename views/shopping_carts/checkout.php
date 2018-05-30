<?php
//DEFINE PAYMENT VAL
$subtotal = 0;
$hst = 0;
$shipping = 0;
 ?>
<div class="container">
  <h1>Welcome to Dazzlin Checkout Page </h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Product name</th>
        <th>Product price</th>
        <th>Quantity</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(count($_SESSION['shopping_carts']) <= 0){
          echo "<tr>
          <td colspan='4'><strong>Your Shopping Cart is empty.</strong></td>
          </tr>";
        }else{
          for ($i=0; $i < count($_SESSION['shopping_carts']); $i++) {
            echo "<tr>
              <td>".$_SESSION['shopping_carts'][$i]['product_name']."<br>
                  <img style='width:15%;' src='".$_SESSION['shopping_carts'][$i]['product_thumbnail']."' class='img-fluid d-none d-sm-block'/></td>
              <td>$".$_SESSION['shopping_carts'][$i]['product_price']."</td>
              <td>".$_SESSION['shopping_carts'][$i]['product_quantity']."</td>
              <td><a href='".Routes::getBaseUrl()."remove_from_cart/".$i."' class='btn btn-danger'><i class='fas fa-minus'></i></a></td>
            </tr>";
          }
        }
       ?>
       <tr>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
       <tr>
         <td colspan='3'><strong>Subtotal</strong> </td>
         <?php
            if(count($_SESSION['shopping_carts']) <= 0){
              echo "<td>0</td>";
            }else{
              for ($i=0; $i < count($_SESSION['shopping_carts']); $i++) {
                  $subtotal += ($_SESSION['shopping_carts'][$i]['product_price'] * $_SESSION['shopping_carts'][$i]['product_quantity']);
              }
              echo "<td>$".$subtotal."</td>";
            }
          ?>
       </tr>
       <tr>
         <td colspan='3'><strong>HST 13%</strong> </td>
         <?php
          $hst = number_format($subtotal*0.13,2);
          if(count($_SESSION['shopping_carts']) <= 0){
            echo "<td>0</td>";
          }else{
            echo "<td>$".$hst."</td>";
          }
          ?>
       </tr>
       <tr>
         <td colspan='3'><strong>Total</strong> </td>
         <?php
         $total = $subtotal + $hst + $shipping;
          if(count($_SESSION['shopping_carts']) <= 0){
            echo "<td>0</td>";
          }else{
            echo "<td>$".$total."</td>";
          }
          ?>
       </tr>
    </tbody>
  </table>
  <?php
    if(count($_SESSION['shopping_carts']) > 0){
      echo "<div>
        <a class='btn btn-success paynow-btn' href='".Routes::getBaseUrl()."add_shipping_info'>Proceed</a>
        <a class='btn btn-danger' href='".Routes::getBaseUrl()."clear_cart'>Clear Cart</a>
      </div>";
    }
   ?>
</div>
