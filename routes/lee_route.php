<?php
Routes::addPage("giftshop", function() { //Gift Shop Page
    $data = array('categories' => LeeController::showCategories(),
                  'list_product' => LeeController::showProduct());

    LeeController::addView("Shared/_header");
    LeeController::addView("Shared/_navigation");
    LeeController::addView("lee/giftshop/content",$data);
    LeeController::addView("Shared/_footer");
});

Routes::addPage("ajax_category", function() { //AJAX CONTENT RELATE TO SELECTED CATEGORY ITEM
  $category_val = $_POST['product_category'];
  $data = "";
  if($category_val == "View All") { //check if select item is view all then show all products
    $data = LeeController::showProduct();
  }else{ //otherwise show related product to category
    $data = LeeController::ajaxCategory($category_val);
  }

  LeeController::addView("lee/giftshop/ajax/load_category",$data); //display data to the view
});



Routes::addPage("giftshop_detail", function() { //Product Detail Page
    if(!empty(Routes::url_segment(2)) && !empty(Routes::url_segment(3))){

      /* get segment index from url
         giftshop_detail/category/product_id
         giftshop_detail is segment 1 which is the page
         $category value is segment 2
         $id value will is segment 3
      */
      $id = Routes::url_segment(3);
      $category = Routes::url_segment(2);
      $data = array('product_detail' => LeeController::showProductDetail($id),
                    'sizes' => LeeController::showSizes(),
                    'similar_products' => LeeController::getSimilarProducts($id,$category));

      LeeController::addView("Shared/_header");
      LeeController::addView("Shared/_navigation");
      LeeController::addView("lee/giftshop/detail",$data);
      LeeController::addView("Shared/_footer");
    }else{
      header("Location: giftshop");
    }
});


Routes::addPage("ticket_booking", function() {
  $data = array('list_tickets' => LeeController::showAllTickets());
  $data['err_msg'] = "";


  LeeController::addView("Shared/_header");
  LeeController::addView("Shared/_navigation");
  LeeController::addView("lee/ticket_booking/content",$data);
  LeeController::addView("Shared/_footer");
});


Routes::addPage("game", function() { //Add Page: game
    LeeController::addView("Shared/_header");
    LeeController::addView("Shared/_navigation");
    LeeController::addView("lee/game/content");
    LeeController::addView("Shared/_footer");
});

Routes::addPage("ajax_addscore", function() { //ADD Score to DB when user click stop btn on game screen
    if(isset($_POST['username']) && isset($_POST['score'])) {
      $username = $_POST['username'];
      $score = $_POST['score'];
      $game_tile = "Whack a mole";
      $game_level = $_POST['game_level'];
      $played_date = date("Y-m-d"); //get today date
      $sys_msg = "";
      //check if user exist then updateScore
      if(LeeController::checkUsr($username) > 0) { //user exist
        if(LeeController::checkScore($username,$score) > 0) { //current score > previous score
          $count = LeeController::updateScore($username, $score, $played_date,$game_level);
          $sys_msg = "Congratulation. Your new score has been updated!";
        }else{
          $sys_msg = "Thanks for playing. Please come back anytime to play!";
        }
      }else{ //user does not exist
        if(!empty($username)) {
          $count = LeeController::addScore($game_tile,$username, $score, $played_date,$game_level);
          $sys_msg = $count > 0 ? "Score saved!" : "Failed to save score!";
        }else {
          $sys_msg = "Thanks for playing. Please come back anytime to play!";
        }
      }
      echo $sys_msg;
    }

});

Routes::addPage("ajax_loadscore", function() { //load score to achievement board
  $data = array('top_score' => LeeController::displayTopScore());
    LeeController::addView("lee/game/ajax/load_score",$data);
});



/* ADMIN PAGE */

Routes::addPage("payment_history", function() {
    Routes::setAdminSession(true); //use it func to set admin session check

    LeeController::addView("Shared/_header");
    LeeController::addView("Shared/_navigation");
    LeeController::addView("admin/payment_history");
    LeeController::addView("Shared/_footer");
});

Routes::addPage("payment_view", function() {
    Routes::setAdminSession(true); //use it func to set admin session check
    $data = array();
    if(!empty(Routes::url_segment(2))){
      $payment_id = Routes::url_segment(2);
      $data['payment_details'] = HomeController::findPaymentById($payment_id);
    }
    LeeController::addView("Shared/_header");
    LeeController::addView("Shared/_navigation");
    LeeController::addView("admin/payment_view",$data);
    LeeController::addView("Shared/_footer");
});

Routes::addPage("search_payment_by_id", function() { //AJAX SEARCH BOX
  if(isset($_POST['search'])){
    $search_term = $_POST['search'];
    $data = LeeController::search_payment_by_id($search_term);
    LeeController::addView("admin/ajax/search_payment_by_id",$data);
  }else{
    echo "Nothing found!";
  }

});




/* GIFTSHOP ADMIN PAGE */

Routes::addPage("giftshop_admin", function() {
  Routes::setAdminSession(true); //use it func to set admin session check

  LeeController::addView("Shared/_header");
  LeeController::addView("Shared/_navigation");
  LeeController::addView("admin/giftshop/show");
  LeeController::addView("Shared/_footer");
});


Routes::addPage("giftshop_create", function() {
  Routes::setAdminSession(true); //use it func to set admin session check

  $data['err_msg'] = "";
  $data['product_name'] = "";
  $data['product_desc'] = "";
  $data['product_price'] = "";
  $data['product_category'] = "";
  $data['product_thumbnail'] = "";
  $data['shipping_delivery'] = "";
  $data['in_stock'] = ""; // 1 or 0

  if(isset($_POST['btnSubmit'])) {

    $data['product_name'] = $_POST['product_name'];
    $data['product_desc'] = $_POST['product_desc'];
    $data['product_price'] = $_POST['product_price'];
    $data['product_category'] = $_POST['product_category'];
    $data['product_thumbnail'] = $_FILES['product_thumbnail'];
    $data['shipping_delivery'] = $_POST['shipping_delivery'];
    $data['in_stock'] = @$_POST['in_stock']; // 1 or 0

    if(empty($data['product_name'])) {
      $data['err_msg'] = "Please enter product name!";
    }else if(empty($data['product_price'])) {
      $data['err_msg'] = "Please enter your product price!";
    }else if(empty($data['product_thumbnail'])) {
      $data['err_msg'] = "Please enter product description!";
    }else if(empty($data['product_desc'])) {
      $data['err_msg'] = "Please enter product description!";
    }else if(empty($data['shipping_delivery'])) {
      $data['err_msg'] = "Please enter shipping information!";
    }else{
      //upload thumbnail and add data to DB
      if(!in_array(strtolower($data['product_thumbnail']['type']),Routes::getImgTypes())){
      $data['err_msg'] = "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='close'>&times;</button>Image type are not allowed!</div>";
      }else{
        //add data to DB
      $count = LeeController::addProduct($data['product_name'],$data['product_desc'],$data['product_price'],$data['product_category'],"images/giftshop/".$data['product_thumbnail']['name'],$data['shipping_delivery'],$data['in_stock']);
      if($count <= 0){
        $err_msg = "Fail to create new product. Please try again!";
      }else{
        move_uploaded_file($data['product_thumbnail']['tmp_name'], Routes::getImgDir()."giftshop/".$data['product_thumbnail']['name']);

        //reset all fields
        $data['product_name'] = "";
        $data['product_desc'] = "";
        $data['product_price'] = "";
        $data['product_category'] = "";
        $data['product_thumbnail'] = "";
        $data['shipping_delivery'] = "";
        $data['in_stock'] = ""; // 1 or 0
        $data['err_msg'] = "Post success!";
      }

    }


    }
  }


  LeeController::addView("Shared/_header");
  LeeController::addView("Shared/_navigation");
  LeeController::addView("admin/giftshop/create",$data);
  LeeController::addView("Shared/_footer");
});


Routes::addPage("giftshop_update", function() {
  Routes::setAdminSession(true); //use it func to set admin session check

  $data['err_msg'] = "";
  $data['product_name'] = "";
  $data['product_desc'] = "";
  $data['product_price'] = "";
  $data['product_category'] = "";
  $data['product_thumbnail'] = "";
  $data['shipping_delivery'] = "";
  $data['in_stock'] = ""; // 1 or 0
  $product_id = 0;

  if(!empty(Routes::url_segment(2))){
    $product_id = Routes::url_segment(2);
  }

  foreach(LeeController::showProductDetail($product_id) as $item) {
    $data['product_name'] = $item->product_name;
    $data['product_desc'] = $item->product_desc;
    $data['product_price'] = $item->product_price;
    $data['product_category'] = $item->product_category;
    $data['product_thumbnail'] = $item->product_thumbnail;
    $data['shipping_delivery'] = $item->shipping_delivery;
    $data['in_stock'] = $item->in_stock; // 1 or 0
  }

  if(isset($_POST['btnSubmit'])) {

    $data['product_name'] = $_POST['product_name'];
    $data['product_desc'] = $_POST['product_desc'];
    $data['product_price'] = $_POST['product_price'];
    $data['product_category'] = $_POST['product_category'];
    $data['product_thumbnail'] = $_POST['product_thumbnail'];
    $data['shipping_delivery'] = $_POST['shipping_delivery'];
    $data['in_stock'] = @$_POST['in_stock']; // 1 or 0

    if(empty($data['product_name'])) {
      $data['err_msg'] = "Please enter product name!";
    }else if(empty($data['product_price'])) {
      $data['err_msg'] = "Please enter your product price!";
    }else if(empty($data['product_thumbnail'])) {
      $data['err_msg'] = "Please enter product description!";
    }else if(empty($data['product_desc'])) {
      $data['err_msg'] = "Please enter product description!";
    }else if(empty($data['shipping_delivery'])) {
      $data['err_msg'] = "Please enter shipping information!";
    }else{

      $count = LeeController::updateProduct($product_id,$data['product_name'],$data['product_desc'],$data['product_price'],$data['product_category'],$data['product_thumbnail'],$data['shipping_delivery'],$data['in_stock']);

      if($count <= 0){
        $err_msg = "Fail to update this product. Please try again!";
      }else{
        $data['err_msg'] = "Product ".$product_id." updated successfully!";
      }


    }
  }



  LeeController::addView("Shared/_header");
  LeeController::addView("Shared/_navigation");
  LeeController::addView("admin/giftshop/update",$data);
  LeeController::addView("Shared/_footer");
});

Routes::addPage("giftshop_delete", function() {
  Routes::setAdminSession(true); //use it func to set admin session check


  $data['err_msg'] = "";
  if(!empty(Routes::url_segment(2)) && !empty(Routes::url_segment(3))){
    $product_id = Routes::url_segment(2);
    $product_thumbnail = Routes::url_segment(3)."/".Routes::url_segment(4)."/".Routes::url_segment(5);
    if(@unlink($product_thumbnail)) {

      $count = LeeController::deleteProduct($product_id);
      $data['err_msg'] = "Product ".$product_id." deleted successfully!";

    }else{
      $data['err_msg'] = "Cannot delete this product. Please try again!";
    }
  }


  LeeController::addView("Shared/_header");
  LeeController::addView("Shared/_navigation");
  LeeController::addView("admin/giftshop/delete",$data);
  LeeController::addView("Shared/_footer");

});

Routes::addPage("search_product_by_name", function() { //AJAX SEARCH BOX
  if(isset($_POST['search'])){
    $search_term = $_POST['search'];
    $data = LeeController::search_product_by_name($search_term);
    LeeController::addView("admin/giftshop/ajax/search_product_by_name",$data);
  }else{
    echo "Nothing found!";
  }

});






/* TICKET BOOKING */

Routes::addPage("ticket_booking_admin", function() {
  Routes::setAdminSession(true); //use it func to set admin session check

  LeeController::addView("Shared/_header");
  LeeController::addView("Shared/_navigation");
  LeeController::addView("admin/ticket_booking/show");
  LeeController::addView("Shared/_footer");
});

Routes::addPage("ticket_add_new", function() {
  Routes::setAdminSession(true); //use it func to set admin session check

  $data['err_msg'] = "";
  $data['ticket_title'] = "";
  $data['ticket_price'] = "";
  $ticket_thumbnail = "";
  $data['ticket_desc'] = "";

  if(isset($_POST['btnSubmit'])) {

    $data['ticket_title'] = $_POST['ticket_title'];
    $data['ticket_price'] = $_POST['ticket_price'];
    $ticket_thumbnail = $_FILES['ticket_thumbnail'];
    $data['ticket_desc'] = $_POST['ticket_desc'];

    if(empty($data['ticket_title'])) {
      $data['err_msg'] = "Please enter product name!";
    }else if(empty($data['ticket_price'])) {
      $data['err_msg'] = "Please enter product price!";
    }else if(empty($ticket_thumbnail)) {
      $data['err_msg'] = "Please upload your product thumbnail!";
    }else if(empty($data['ticket_desc'])) {
      $data['err_msg'] = "Please enter product description!";
    }else{
      //upload thumbnail and add data to DB
      if(!in_array(strtolower($ticket_thumbnail['type']),Routes::getImgTypes())){
      $data['err_msg'] = "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='close'>&times;</button>Image types are not allowed!</div>";
      }else{

      $count = LeeController::addTicket($data['ticket_title'],"images/".$ticket_thumbnail['name'],$data['ticket_desc'],$data['ticket_price']);
      if($count <= 0){
        $err_msg = "Fail to create new product. Please try again!";
      }else{
        move_uploaded_file($ticket_thumbnail['tmp_name'], Routes::getImgDir().$ticket_thumbnail['name']);
        $data['ticket_title'] = "";
        $data['ticket_price'] = "";
        $ticket_thumbnail = "";
        $data['ticket_desc'] = "";
        $data['err_msg'] = "Post success!";
      }

    }


    }
  }

  LeeController::addView("Shared/_header");
  LeeController::addView("Shared/_navigation");
  LeeController::addView("admin/ticket_booking/create",$data);
  LeeController::addView("Shared/_footer");
});

Routes::addPage("ticket_delete", function() {
  Routes::setAdminSession(true);
  $data['err_msg'] = "";
  if(!empty(Routes::url_segment(2)) && !empty(Routes::url_segment(3))){
    $product_id = Routes::url_segment(2);
    $product_thumbnail = Routes::url_segment(3)."/".Routes::url_segment(4);
    if(@unlink($product_thumbnail)) {

      $count = LeeController::deleteTicket($product_id);
      $data['err_msg'] = "Product ".$product_id." deleted successfully!";

    }else{
      $data['err_msg'] = "Cannot delete this product. Please try again!";
    }
  }


  LeeController::addView("Shared/_header");
  LeeController::addView("Shared/_navigation");
  LeeController::addView("admin/ticket_booking/delete",$data);
  LeeController::addView("Shared/_footer");

});

Routes::addPage("ticket_update", function() {
  Routes::setAdminSession(true); //use it func to set admin session check

  $data['err_msg'] = "";
  $data['ticket_title'] = "";
  $data['ticket_price'] = "";
  $data['ticket_thumbnail'] = "";
  $data['ticket_desc'] = "";
  $product_id = 0;

  if(!empty(Routes::url_segment(2))){
    $product_id = Routes::url_segment(2);
  }

  foreach(LeeController::findTicketById($product_id) as $item) {
    $data['ticket_title'] = $item->ticket_title;
    $data['ticket_price'] = $item->ticket_price;
    $data['ticket_thumbnail'] = $item->ticket_thumbnail;
    $data['ticket_desc'] = $item->ticket_desc;
  }

  if(isset($_POST['btnSubmit'])) {

    $data['ticket_title'] = $_POST['ticket_title'];
    $data['ticket_price'] = $_POST['ticket_price'];
    $data['ticket_thumbnail'] = $_POST['ticket_thumbnail'];
    $data['ticket_desc'] = $_POST['ticket_desc'];

    if(empty($data['ticket_title'])) {
      $data['err_msg'] = "Please enter product name!";
    }else if(empty($data['ticket_price'])) {
      $data['err_msg'] = "Please enter product price!";
    }else if(empty($data['ticket_thumbnail'])) {
      $data['err_msg'] = "Please upload your product thumbnail!";
    }else if(empty($data['ticket_desc'])) {
      $data['err_msg'] = "Please enter product description!";
    }else{

      $count = LeeController::updateTicket($product_id,$data['ticket_title'],$data['ticket_thumbnail'],$data['ticket_desc'],$data['ticket_price']);
      if($count <= 0){
        $err_msg = "Fail to update this product. Please try again!";
      }else{
        $data['err_msg'] = "Product ".$product_id." updated successfully!";
      }


    }
  }

  LeeController::addView("Shared/_header");
  LeeController::addView("Shared/_navigation");
  LeeController::addView("admin/ticket_booking/update",$data);
  LeeController::addView("Shared/_footer");
});


Routes::addPage("ticket_payments", function() {
  Routes::setAdminSession(true);
  $data = array('list_payments' => LeeController::showAllPayments());

  LeeController::addView("Shared/_header");
  LeeController::addView("Shared/_navigation");
  LeeController::addView("admin/ticket_booking/show_payments",$data);
  LeeController::addView("Shared/_footer");

});

Routes::addPage("search_ticket_by_name", function() { //AJAX SEARCH BOX
  if(isset($_POST['search'])){
    $search_term = $_POST['search'];
    $data = LeeController::findTicketByName($search_term);
    LeeController::addView("admin/ticket_booking/ajax/search_ticket_by_name",$data);
  }else{
    echo "Nothing found!";
  }

});

Routes::addPage("search_payment_ticket", function() { //AJAX SEARCH BOX
  if(isset($_POST['search'])){
    $search_term = $_POST['search'];
    $data = LeeController::findTicketByCustomer($search_term);
    LeeController::addView("admin/ticket_booking/ajax/search_payment_ticket",$data);
  }else{
    echo "Nothing found!";
  }

});




/* GAME ADMIN PAGE */
Routes::addPage("game_admin", function() {
    Routes::setAdminSession(true); //use it func to set admin session check

    LeeController::addView("Shared/_header");
    LeeController::addView("Shared/_navigation");
    LeeController::addView("admin/game/show");
    LeeController::addView("Shared/_footer");
});

Routes::addPage("search_game_by_admin", function() { //AJAX SEARCH BOX
  if(isset($_POST['search'])){
    $search_term = $_POST['search'];
    $data = LeeController::search_game_by_admin($search_term);
    LeeController::addView("admin/game/ajax/search_game_by_admin",$data);
  }else{
    echo "Nothing found!";
  }

});


Routes::addPage("game_update", function() {
  Routes::setAdminSession(true);
  $err_msg = "";
  $data = array();
  if(!empty(Routes::url_segment(2))){
    $id = Routes::url_segment(2); //get id
    $results = LeeController::findUserById($id);
    foreach($results as $item) {
      $data['game_title'] = $item->game_title;
      $data['username'] = $item->user_name;
      $data['score'] = $item->user_score;
      $data['played_date'] = $item->played_date;
    }
  }else{
    $data = array("game_title" => "",
                  "username" => "",
                  "score" => "",
                  "err_msg" => $err_msg);
  }

  if(isset($_POST['btnSubmit'])) {

    $data['username'] = $_POST['username'];
    $data['score'] = $_POST['score'];
    $data['played_date'] = date("Y-m-d");
    $data['game_title'] = "Whack a mole";
    if(empty($data['username'])){
      $err_msg = "Username is required!";
    }else if(empty($data['score'])) {
      $err_msg = "Score is required!";
    }else{
        $count = LeeController::updateScore($data['username'], $data['score'], $data['played_date']);
        if($count <= 0){
          $err_msg = "Cannot update this user. Please try again!";
        }else{
          header("Location: ".Routes::getBaseUrl()."game_admin");
        }
    }
  }
  $data['err_msg'] = $err_msg;
  LeeController::addView("Shared/_header");
  LeeController::addView("Shared/_navigation");
  LeeController::addView("admin/game/update",$data);
  LeeController::addView("Shared/_footer");
});

Routes::addPage("game_delete", function() {
  Routes::setAdminSession(true);
    $err_msg = "";
    $data = array();
    if(!empty(Routes::url_segment(2))){
      $id = Routes::url_segment(2); //get id
      $count = LeeController::deleteUser($id);
      if($count <= 0){
        $data['err_msg'] = "Unable to delete this user. Please try again!";
      }else{
        $data['err_msg'] = "User deleted!";
      }
    }else{
        $data['err_msg'] = "";
    }
    LeeController::addView("Shared/_header");
    LeeController::addView("Shared/_navigation");
    LeeController::addView("admin/game/delete",$data);
    LeeController::addView("Shared/_footer");
});





 ?>
