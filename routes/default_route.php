<?php
Routes::addPage("home", function() { //DEFAULT HOME PAGE. DONT REMOVE. If you change default page name "home" to different name. Please make change in _core folder/Routes.php as well.
    HomeController::addView("Shared/_header"); //File belongs to Shared folders are considered as partial view.
    HomeController::addView("Shared/_navigation");
    HomeController::addView("content"); //Pass data to view content
    HomeController::addView("Shared/_footer"); //File belongs to Shared folders are considered as partial view.
});

//ADMIN Page
Routes::addPage("admin_portal", function() {

    $err_msg = "";
    $username = "";
    $password = "";
    $data = array();
  if(isset($_POST['btn_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username)) {
      $err_msg = "Username is required!";
    }else if(empty($password)){
      $err_msg = "Password is required!";
    }else{

      $results = HomeController::checkUserLogin($username,$password);
      if($results <= 0) {
        $err_msg = "Login failed. Please try again!";
      }else{
        if(@$_POST['remember_box'] == "on"){
          $_SESSION['remember_me'] = true;
        }
        $_SESSION['user'] = $username;
        header("Location: faq_admin");
      }
    }
  }
    $data['err_msg'] = $err_msg;
    HomeController::addView("Shared/_header");
    HomeController::addView("Shared/_navigation");
    HomeController::addView("admin/content",$data);
    HomeController::addView("Shared/_footer");
});

Routes::addPage("admin_logout", function() {
    HomeController::addView("admin/logout");
});


/* CHECK OUT PAGE */



Routes::addPage("checkout", function() { //checkout page
    HomeController::addView("Shared/_header");
    HomeController::addView("Shared/_navigation");
    HomeController::addView("shopping_carts/checkout");
    HomeController::addView("Shared/_footer");
});


Routes::addPage("add_shipping_info", function() {
    $data['err_msg'] = "";
    $data['firstname'] = "";
    $data['lastname'] = "";
    $data['email'] = "";
    $data['phone'] = "";
    $data['address'] = "";
    $data['postcode'] = "";

  if(isset($_POST['btn-proceed'])){
    $data['firstname'] = $_POST['firstname'];
    $data['lastname'] = $_POST['lastname'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['address'] = $_POST['address'];
    $data['postcode'] = $_POST['postcode'];

    if(empty($data['firstname'])){
      $data['err_msg'] = "Your first name is required!";
    }else if(empty($data['lastname'])){
      $data['err_msg'] = "Your last name is required!";
    }else if(empty($data['email'])){
      $data['err_msg'] = "Your email is required!";
    }else if(Validation::testFormat($data['email'],'email') == false){
      $data['err_msg'] = "Your email is not valid!";
    }else if(empty($data['phone'])){
      $data['err_msg'] = "Your contact number is required!";
    }else if(Validation::testFormat($data['phone'],'phone') == false){
      $data['err_msg'] = "Your number must contain 10 numbers!";
    }else if(empty($data['address'])){
      $data['err_msg'] = "Your shipping address is required!";
    }else if(empty($data['postcode'])){
      $data['err_msg'] = "Your postcode is required!";
    }else if(Validation::testFormat($data['postcode'],'postcode') == false){
      $data['err_msg'] = "Your postcode is not valid!";
    }else{

        header("Location: ".Routes::getBaseUrl()."pay_now");
    }
  }

  HomeController::addView("Shared/_header");
  HomeController::addView("Shared/_navigation");
  HomeController::addView("shopping_carts/add_shipping_info",$data);
  HomeController::addView("Shared/_footer");
});

Routes::addPage("clear_cart", function() { //clear all item from shopping cart
    HomeController::addView("shopping_carts/clear_cart");
});

Routes::addPage("remove_from_cart", function() { //remove specific item from shopping cart

      $id = Routes::url_segment(2);
      HomeController::addView("shopping_carts/remove_item",$id);

});


Routes::addPage("add_to_cart", function() { //add item to shopping cart

  $item = array();

  if(isset($_POST['btnGiftShopSubmit'])) { ////GIFTSHOP SUBMIT
    $item['product_name'] = $_POST['product_name'];
    $item['product_price'] = $_POST['product_price'];
    $item['product_quantity'] = $_POST['product_quantity'];
    $item['payment_from_page'] = $_POST['payment_from_page']; //Gift shop
    $item['product_thumbnail'] = Routes::getBaseUrl().$_POST['product_thumbnail'];

  }else if(isset($_POST['btnTicketSubmit'])){ //TICKET BOOKING SUBMIT
      $item['product_name'] = $_POST['product_name'];
      $item['product_price'] = $_POST['product_price'];
      $item['product_quantity'] = $_POST['product_quantity'];
      $item['payment_from_page'] = $_POST['payment_from_page']; //Ticket Booking
      $item['product_thumbnail'] = $_POST['product_thumbnail'];
      $item['product_type'] = $_POST['product_type'];

      //CUSTOMER INFO
      $item['customer_name'] = $_POST['name'];
      $item['customer_email'] = $_POST['email'];
      $item['customer_phone'] = $_POST['phone'];
      $item['customer_visit_date'] = $_POST['visit_date'];

  }else if(isset($_POST['giftcardBtnSubmit'])){ //GIFTCARD SUBMIT
      $item['product_name'] = $_POST['product_name'];
      $item['product_price'] = $_POST['product_price'];
      $item['product_quantity'] = $_POST['product_quantity'];
      $item['customised_gcard'] = $_POST['customised_gcard'];
      $item['payment_from_page'] = $_POST['payment_from_page']; //Gift card
      $item['product_thumbnail'] = $_POST['customised_gcard'];

      //GIFTCARD INFO
      $item['sender_name'] = $_POST['sender_name'];
      $item['receipt_name'] = $_POST['receipt_name'];

  }
//  else if (isset($_POST['parkingBtnSubmit'])){
//      $item['product_name'] = "Parking pass";
//      $item['product_price'] = $_POST['type'];
//      $item['product_quantity'] = 1;
//
//      $item['customer_name'] = $_POST['name'];
//      $item['customer_email'] = $_POST['email'];
//      $item['customer_phone'] = $_POST['phone'];
//      $item['customer_plate'] = $_POST['plate'];
//      $item['customer_visit_date'] = $_POST['date'];
//  }
  else{
    header("Location: ".Routes::getBaseUrl()."home");
  }


    //need to create separate post for the payment page

      HomeController::addView("Shared/_header");
      HomeController::addView("Shared/_navigation");
      HomeController::addView("shopping_carts/add_to_cart",$item);
      HomeController::addView("Shared/_footer");



});

Routes::addPage("pay_now", function() {
    HomeController::addView("shopping_carts/pay_now");
});

Routes::addPage("payment_status", function() {
    HomeController::addView("Shared/_header");
    HomeController::addView("Shared/_navigation");
    HomeController::addView("shopping_carts/payment_status");
    HomeController::addView("Shared/_footer");
});


 ?>
