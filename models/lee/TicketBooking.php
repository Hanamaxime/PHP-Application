<?php
class TicketBooking extends PDO_DB {
  public static function show() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM ticket_sales ORDER BY id DESC");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function findById($id) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM ticket_sales WHERE id = :i");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':i',$id);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }


  public static function findTicketByName($product_name) {
    try {
       $product_name = "%".$product_name."%";
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM ticket_sales WHERE ticket_title LIKE :tt");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':tt', $product_name,PDO::PARAM_STR);
       $cmd->execute();
       return $cmd->fetchAll();
     } catch (PDOException $e) {
       return $e->getMessage();
     }
  }

  public static function findTicketByCustomer($customer_name) {
    try {
       $customer_name = "%".$customer_name."%";
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM ticket_booking_histories WHERE customer_name LIKE :cn");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':cn', $customer_name,PDO::PARAM_STR);
       $cmd->execute();
       return $cmd->fetchAll();
     } catch (PDOException $e) {
       return $e->getMessage();
     }
  }



  public static function saveTicketBooking($customer_name, $customer_email, $customer_phone, $date_of_visit,$ticket_id) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("INSERT INTO ticket_booking_histories(customer_name, customer_email, customer_phone, date_of_visit,ticket_id) VALUES(:cn,:ce,:cp,:dv,:ti)");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':cn',$customer_name);
      $cmd->bindParam(':ce',$customer_email);
      $cmd->bindParam(':cp',$customer_phone);
      $cmd->bindParam(':dv',$date_of_visit);
      $cmd->bindParam(':ti',$ticket_id);
      return $cmd->execute();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  //ADMIN CRUD FUNC

  public static function showTicketHistory() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM ticket_booking_histories ORDER BY id DESC");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function addTicket($ticket_title,$ticket_thumbnail,$ticket_desc,$ticket_price) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("INSERT INTO ticket_sales(ticket_title,ticket_thumbnail,ticket_desc,ticket_price) VALUES(:title, :thumb, :de, :pr)");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':title',$ticket_title);
      $cmd->bindParam(':thumb',$ticket_thumbnail);
      $cmd->bindParam(':de',$ticket_desc);
      $cmd->bindParam(':pr',$ticket_price);
      return $cmd->execute();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function updateTicket($id,$ticket_title,$ticket_thumbnail,$ticket_desc,$ticket_price) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("UPDATE ticket_sales SET ticket_title = :title, ticket_thumbnail = :thumb, ticket_desc = :de, ticket_price = :pr WHERE id = :i");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':title',$ticket_title);
      $cmd->bindParam(':thumb',$ticket_thumbnail);
      $cmd->bindParam(':de',$ticket_desc);
      $cmd->bindParam(':pr',$ticket_price);
      $cmd->bindParam(':i',$id);
      return $cmd->execute();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function deleteTicket($id) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("DELETE FROM ticket_sales WHERE id = :i");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':i',$id);
      return $cmd->execute();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }


}
 ?>
