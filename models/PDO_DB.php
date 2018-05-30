<?php
class PDO_DB {
  private static $host = "mysql:host=dazzlin.xyz; dbname=dazzlin";
  private static $user = "test_user"; //change username to match your sql user
  private static $pass = "QweQwe123!"; //change password to match your sql pass

  public function __construct() {
    /* nothing to initilize */
  }

  public static function connectDB() { //USE: self::connectDB() to initialize connection
    try {
      $conn = new PDO(self::$host, self::$user, self::$pass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      return $e->getMessage();
    }
    return $conn;
  }

  public static function checkLogin($username,$password) {
    try {
      $password = hash('sha512',$password);
      $conn = self::connectDB();
      $cmd = $conn->prepare("SELECT * FROM users WHERE user_login = :u AND user_pass = :p");
      $cmd->bindParam(":u",$username);
      $cmd->bindParam(":p",$password);
      $cmd->execute();
      return $cmd->fetchColumn();
    } catch (PDOException $e) {
      return $e->getMessage();
    }

  }

  public static function save_payment($payment_id,$product_name,$product_quantity,$product_price,$payment_from_page,$customer_name, $customer_email, $customer_number, $customer_address){  //add payment history to DB
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("INSERT INTO payment_histories(payment_id,product_name,product_quantity,product_price,payment_from_page,customer_name, customer_email, customer_number, customer_address) VALUES(:i,:n, :q, :p, :pf, :cn, :ce, :cp, :ca)");
      $cmd->bindParam(':i', $payment_id);
      $cmd->bindParam(':n', $product_name);
      $cmd->bindParam(':q', $product_quantity);
      $cmd->bindParam(':p', $product_price);
      $cmd->bindParam(':pf', $payment_from_page);
      $cmd->bindParam(':cn', $customer_name);
      $cmd->bindParam(':ce', $customer_email);
      $cmd->bindParam(':cp', $customer_number);
      $cmd->bindParam(':ca', $customer_address);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }

  }

  public static function showAllPayments() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM payment_histories ORDER BY id DESC");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function findPaymentById($id) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM payment_histories WHERE id = :id");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':id', $id);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }

  }

  public static function search_payment_by_id($id) {
    try {
      $id = "%".$id."%";
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM payment_histories WHERE payment_id LIKE :i");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':i', $id,PDO::PARAM_STR);
       $cmd->execute();
       return $cmd->fetchAll();
     } catch (PDOException $e) {
       return $e->getMessage();
     }
  }





  /* THE FOLLOWING IS BUILT IN PDO CRUD FUNCTION. COPY THE FUNCTION AND PASTE TO YOUR OWN MODEL TO USE */


  /* DISPLAY ROW FUNCTION in PDO
  public static function show() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM table_name ORDER BY id DESC");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
  */

  /* FIND ROW BY ID FUNCTION in PDO
  public static function findById($id) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM table_name WHERE id = :id");
      $cmd->setFetchMode(PDO::FETCH_ASSOC);
      $cmd->bindParam(':id', $id);
      $cmd->execute();
      return $cmd->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e->getMessage();
    }

  }
  */

    /* CREATE ROW FUNCTION in PDO
  public static function create($val){
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("INSERT INTO table_name(column_name) VALUES(:val)");
      $cmd->bindParam(':val', $val);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }

  }

  */

  /* UPDATE ROW FUNCTION in PDO

  public static function update($val) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("UPDATE table_Name SET column_name = :val WHERE id= :id");
      $cmd->bindParam(':val', $val);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }

  }

  */

  /* DELETE ROW FUNCTION in PDO

  public static function delete($id) {
    try {
      $conn = self::connectDB();
      $cmd = $conn->prepare("DELETE FROM table_name WHERE id = :id");
      $cmd->bindParam(':id', $id);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }

  }
  */
}
 ?>
