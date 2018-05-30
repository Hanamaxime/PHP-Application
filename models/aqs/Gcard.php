<?php
class Gcard extends PDO_DB {

  public static function show() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM giftcards ORDER BY id DESC LIMIT 30");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function search_by_sender($sender) {
    try {
      $sender = "%".$sender."%";
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM giftcards WHERE sender LIKE :s");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':s', $sender,PDO::PARAM_STR);
       $cmd->execute();
       return $cmd->fetchAll();
     } catch (PDOException $e) {
       return $e->getMessage();
     }
  }


  public static function add($amount, $sender, $receiver, $email) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("INSERT INTO giftcards(amount, sender, receiver, email) VALUES(:a, :s, :r, :e)");
      $cmd->bindParam(':a', $amount);
      $cmd->bindParam(':s', $sender);
      $cmd->bindParam(':r', $receiver);
      $cmd->bindParam(':e', $email);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }



}
?>
