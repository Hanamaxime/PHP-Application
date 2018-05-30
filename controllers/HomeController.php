<?php

//THIS IS DEFAULT CONTROLLER
class HomeController extends CoreController {

  public static function index($val) { //function return a string
      return $val;
  }

  public static function checkUserLogin($username,$password){
    return PDO_DB::checkLogin($username,$password);
  }

  public static function savePayment($payment_id,$product_name,$product_quantity,$product_price,$payment_from_page,$customer_name, $customer_email, $customer_number, $customer_address) {
    return PDO_DB::save_payment($payment_id,$product_name,$product_quantity,$product_price,$payment_from_page,$customer_name, $customer_email, $customer_number, $customer_address);
  }

  public static function showAllPayments() {
    return PDO_DB::showAllPayments();
  }

  public static function findPaymentById($id) {
    return PDO_DB::findPaymentById($id);
  }

  public static function search_payment_by_id($id) {
    return PDO_DB::search_payment_by_id($id);
  }



}
 ?>
