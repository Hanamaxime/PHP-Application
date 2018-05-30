<?php

/* DO NOT MAKE ANY CHANGE IN THIS FILE
CODED BY LILCASOFT.INFO 2018
*/

//CALL PAYPAL API LIB
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require "paypal_app.php";


if(!isset($_SESSION['shopping_carts']) || count($_SESSION['shopping_carts']) <= 0){
  die("Shopping cart is empty. Please <a href='".Routes::getBaseUrl()."checkout'>Click here</a> to go back to home page!");
}

$shipping = 0;
$tax = 0;
$currency = "CAD";
$subtotal = 0;
$total = 0;

$payer = new Payer();
$payer->setPaymentMethod('paypal');


//CREATE ITEM AND STORE TO ITEMS ARRAY
$items = array();
for ($i=0; $i < count($_SESSION['shopping_carts']); $i++) {

  $item[$i] = new Item();
  $item[$i]->setName($_SESSION['shopping_carts'][$i]['product_name'])
            ->setCurrency($currency)
            ->setQuantity($_SESSION['shopping_carts'][$i]['product_quantity'])
            ->setPrice($_SESSION['shopping_carts'][$i]['product_price']);

    $subtotal += ($_SESSION['shopping_carts'][$i]['product_price'] * $_SESSION['shopping_carts'][$i]['product_quantity']);

  array_push($items,$item[$i]);
}



//CREATE ITEM LIST AND ADD ITEMS TO THE LIST
$itemList = new ItemList();
$itemList->setItems($items);


//CREATE ITEM INFO
$tax = $subtotal * 0.13; //amount of tax item

$details = new Details();
$details->setShipping($shipping)
        ->setTax($tax)
        ->setSubtotal($subtotal);
$total = $subtotal + $tax + $shipping;

//CREATE AMOUNT TO PAY
$amount = new Amount();
$amount->setCurrency($currency)
       ->setTotal($total)
       ->setDetails($details);


//CREATE TRANSACTION
$transaction = new Transaction();
$transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Online purchase from Dazzlin Star')
            ->setInvoiceNumber(uniqid());

//CREATE CUSTOM REDIRECT URL
$redirectURLs = new RedirectUrls();
$redirectURLs->setReturnUrl(SITE_URL.'payment_status?success=true')
             ->setCancelUrl(SITE_URL.'payment_status?success=false');


//SET PAYMENT
$payment = new Payment();
$payment->setIntent('sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirectURLs)
        ->setTransactions([$transaction]);

//MAKE PAYMENT
try {
    $payment->create($paypal);
} catch(Exception $e) {
  die($e);
}
$_SESSION['order_total']= number_format($total,2);
$approvalUrl = $payment->getApprovalLink();
header("Location: ".$approvalUrl);
 ?>
