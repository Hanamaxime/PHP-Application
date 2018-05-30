<?php
/* DO NOT MAKE ANY CHANGE IN THIS FILE
CODED BY LILCASOFT.INFO 2018
*/
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "paypal_app.php";
require "mail_app.php";

if(!isset($_GET['success'],$_GET['paymentId'], $_GET['PayerID'])){
  die();
}

if((bool)$_GET['success'] === false) {
  header("Location: ".SITE_URL."home");
}

$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

$payment = Payment::get($paymentId, $paypal);
$execute = new PaymentExecution();
$execute->setPayerId($payerId);

try {
    $result = $payment->execute($execute,$paypal);
} catch (Exception $e) {
  $data = json_decode($e->getData());
  echo $data->message;
  die();
}


/* ADD ORDER TO payment_histories TABLE*/

for ($i=0; $i < count($_SESSION['shopping_carts']); $i++) {

    //add to ticket_booking_histories table if transaction comes from ticket booking page
    if($_SESSION['shopping_carts'][$i]['payment_from_page'] == "Ticket Booking"){
      LeeController::saveTickets($_SESSION['shopping_carts'][$i]['customer_name'],
                                 $_SESSION['shopping_carts'][$i]['customer_email'],
                                 $_SESSION['shopping_carts'][$i]['customer_phone'],
                                 $_SESSION['shopping_carts'][$i]['customer_visit_date'],
                                 $_SESSION['shopping_carts'][$i]['product_type']);
    }

    //add to giftcards table if transaction comes from giftcard page
    if($_SESSION['shopping_carts'][$i]['payment_from_page'] == "Gift card"){
      AqsController::addPayment($_SESSION['shopping_carts'][$i]['product_price'],
                                $_SESSION['shopping_carts'][$i]['sender_name'],
                                $_SESSION['shopping_carts'][$i]['receipt_name'],
                                $_SESSION['shipping_info']['customer_email']);
    }

    //add to payment_histories table
    HomeController::savePayment($paymentId,
                         $_SESSION['shopping_carts'][$i]['product_name'],
                         $_SESSION['shopping_carts'][$i]['product_quantity'],
                         $_SESSION['shopping_carts'][$i]['product_price'],
                         $_SESSION['shopping_carts'][$i]['payment_from_page'],
                         $_SESSION['shipping_info']['customer_name'],
                         $_SESSION['shipping_info']['customer_email'],
                         $_SESSION['shipping_info']['customer_number'],
                         $_SESSION['shipping_info']['customer_address']);
}


  // initialize mail order structure

  $customer_name = $_SESSION['shipping_info']['customer_name'];
  $customer_email = $_SESSION['shipping_info']['customer_email'];

  $subject = "Your order ".$paymentId." has been paid successfully";
  $msg = "";
  $msg .= "<h1 style='color:#f60;'>Payment successfully made</h1>
  <br>Dear ".ucwords($customer_name).",<br><br>
  Thank you for making purchase at <strong>Dazzlin Online Store</strong>.<br>
  Payment for Order no. <strong>".$paymentId."</strong> has been accepted.<br>
  Your order has been received and is on the way to you. It will usually take 3-5 business days.<br>
  The amount of <strong>$".$_SESSION['order_total']."</strong> will be charged to your account under DazzlinOnlineStore.<br>
  The following items that you have purchased from us:<br><br>
  <table style='border-collapse: collapse;width:100%; text-align:center;'>
  <thead>
  <tr>
  <th style='border: 1px solid #d3d3d3;'><strong>Product Name</strong></th>
  <th style='border: 1px solid #d3d3d3;'><strong>Product Price</strong></th>
  <th style='border: 1px solid #d3d3d3;'><strong>Product Quantity</strong></th>
  </tr>
  </thead>
  <tbody>
  ";
  for ($i=0; $i < count($_SESSION['shopping_carts']); $i++) {
    $msg .="<tr>
      <td style='border: 1px solid #d3d3d3;'>".$_SESSION['shopping_carts'][$i]['product_name']."</td>
      <td style='border: 1px solid #d3d3d3;'>$".$_SESSION['shopping_carts'][$i]['product_price']."</td>
      <td style='border: 1px solid #d3d3d3;'>".$_SESSION['shopping_carts'][$i]['product_quantity']."</td>
    </tr>";
  }
  $msg .="<tr>
  <td style='border: 1px solid #d3d3d3;' colspan='2'><strong>Total after HST Tax(13%)</strong></td>
  <td style='border: 1px solid #d3d3d3;' colspan='2'>$".$_SESSION['order_total']."</td>
  </tr></tbody>
  </table>
  <br><br>
  If you have any question regarding to the recent order <strong>".$paymentId."</strong>, don't hesitate to contact us.<br><br>
  Your sincerely,<br><br>
  <strong>Dazzlin Sales Team</strong>";
  //send mail to customer
  send_mail("dinhconganh@gmail.com", $customer_email, $subject, $msg);


//clear all session after payment made.
unset($_SESSION['shopping_carts']);
unset($_SESSION['order_total']);
unset($_SESSION['shipping_info']);

//redirect user back to home page after payment has been made.
echo "<div class='container'>
     <h1>Thank you for making purchase with us.</h1>
     <h3>Please <a href='".Routes::getBaseUrl()."home'>click here</a> to go back to home page!</h3>
</div>";
 ?>
