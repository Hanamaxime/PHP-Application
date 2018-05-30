<?php
class LeeController extends CoreController {


  //GIFTSHOP SECTION
  public static function showProduct() {
    self::loadModel("lee/Giftshop");
    return Giftshop::show();
  }

  public static function showProductDetail($id) {
    self::loadModel("lee/Giftshop");
    return Giftshop::findById($id);
  }

  public static function showSizes() { //populate size data to drop down list
    self::loadModel("lee/Giftshop");
    return Giftshop::loadProductSizes();
  }

  public static function showCategories() { //populate category to drop down list
    self::loadModel("lee/Giftshop");
    return Giftshop::loadProductCategories();

  }

  public static function getSimilarProducts($id,$category_val) {
    self::loadModel("lee/Giftshop");
    return Giftshop::getSimilarProducts($id,$category_val);
  }

  public static function ajaxCategory($category_val) {
    self::loadModel("lee/Giftshop");
    return Giftshop::getProductsByCategory($category_val);
  }

  public static function addProduct($product_name,$product_desc,$product_price,$product_category,$product_thumbnail,$shipping_delivery,$in_stock) {
    self::loadModel("lee/Giftshop");
    return Giftshop::addProduct($product_name,$product_desc,$product_price,$product_category,$product_thumbnail,$shipping_delivery,$in_stock);
  }

  public static function updateProduct($id,$product_name,$product_desc,$product_price,$product_category,$product_thumbnail,$shipping_delivery,$in_stock) {
    self::loadModel("lee/Giftshop");
    return Giftshop::updateProduct($id,$product_name,$product_desc,$product_price,$product_category,$product_thumbnail,$shipping_delivery,$in_stock);
  }

  public static function deleteProduct($id) {
    self::loadModel("lee/Giftshop");
    return Giftshop::deleteProduct($id);
  }

  public static function search_product_by_name($product_name) {
    self::loadModel("lee/Giftshop");
    return Giftshop::search_product_by_name($product_name);
  }




  //TICKET BOOKING SECTION

  public static function saveTickets($customer_name, $customer_email, $customer_phone, $date_of_visit,$ticket_id) {
    self::loadModel("lee/TicketBooking");
    return TicketBooking::saveTicketBooking($customer_name, $customer_email, $customer_phone, $date_of_visit,$ticket_id);
  }

  public static function addTicket($ticket_title,$ticket_thumbnail,$ticket_desc,$ticket_price) {
    self::loadModel("lee/TicketBooking");
    return TicketBooking::addTicket($ticket_title,$ticket_thumbnail,$ticket_desc,$ticket_price);
  }

  public static function updateTicket($id,$ticket_title,$ticket_thumbnail,$ticket_desc,$ticket_price) {
    self::loadModel("lee/TicketBooking");
    return TicketBooking::updateTicket($id,$ticket_title,$ticket_thumbnail,$ticket_desc,$ticket_price);
  }

  public static function deleteTicket($id) {
    self::loadModel("lee/TicketBooking");
    return TicketBooking::deleteTicket($id);
  }

  public static function showAllTickets() {
    self::loadModel("lee/TicketBooking");
    return TicketBooking::show();
  }

  public static function findTicketById($id) {
    self::loadModel("lee/TicketBooking");
    return TicketBooking::findById($id);
  }

  public static function showAllPayments() {
    self::loadModel("lee/TicketBooking");
    return TicketBooking::showTicketHistory();
  }

  public static function findTicketByName($product_name) {
    self::loadModel("lee/TicketBooking");
    return TicketBooking::findTicketByName($product_name);
  }

  public static function findTicketByCustomer($customer_name) {
    self::loadModel("lee/TicketBooking");
    return TicketBooking::findTicketByCustomer($customer_name);
  }







  //GAME SECTION

  public static function displayTopScore() {
    self::loadModel("lee/Game");
    return Game::showTop10Score();
  }

  public static function addScore($game_title,$user_name, $user_score, $played_date,$game_level) {
    self::loadModel("lee/Game");
    return Game::addScore($game_title,$user_name, $user_score, $played_date,$game_level);
  }

  public static function updateScore($user_name, $user_score, $played_date,$game_level) {
    self::loadModel("lee/Game");
    return Game::updateScore($user_name, $user_score, $played_date,$game_level);
  }

  public static function deleteUser($id) {
    self::loadModel("lee/Game");
    return Game::deleteUser($id);
  }

  public static function findUserById($id){
    self::loadModel("lee/Game");
    return Game::findById($id);
  }

  public static function search_game_by_admin($usr){
    self::loadModel("lee/Game");
    return Game::search_game_by_admin($usr);
  }
  
  public static function checkUsr($username) {
    self::loadModel("lee/Game");
    return Game::checkExistUser($username);
  }

  public static function checkScore($username, $userscore) {
    self::loadModel("lee/Game");
    return Game::checkBackScore($username, $userscore);
  }
}
 ?>
