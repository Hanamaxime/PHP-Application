<?php
class Mascot extends PDO_DB {

//THIS ADDS TO THE DATABASE
    public static function addMascot($name, $group_size, $date_of_meet, $time_of_meet, $email, $phone) {
      try {
        $conn = self::connectDB();
        $conn->query("SET NAMES utf8");
        $cmd = $conn->prepare("INSERT INTO mascot(name, group_size, date_of_meet, time_of_meet, email, phone)
        VALUES(:n, :g, :d, :t, :e, :p)");
        $cmd->setFetchMode(PDO::FETCH_OBJ);
        $cmd->bindParam(':n', $name);
        $cmd->bindParam(':g', $group_size);
        $cmd->bindParam(':d', $date_of_meet);
        $cmd->bindParam(':t', $time_of_meet);
        $cmd->bindParam(':e', $email);
        $cmd->bindParam(':p', $phone);
        return $cmd->execute();
      } catch (PDOException $e) {
        return $e->getMessage();
      }
    }

//BUILDS LAYOUT FOR CRUD
  public static function showMascot() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM mascot ORDER BY id DESC");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll(); //return
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  //DELETE
    public static function deleteMascot($id) {
      try {
        $conn = self::connectDB();
        $cmd = $conn->prepare("DELETE FROM mascot WHERE id = :i");
        $cmd->bindParam(':i', $id);
        $count = $cmd->execute();
        return $count;
      } catch (PDOException $e) {
        return $e->getMessage();
      }
    }

    //UPDATE
      public static function editMascot($id, $name, $group_size, $date_of_meet, $time_of_meet, $email, $phone) {
        try {
          $conn = self::connectDB();
          $conn->query("SET NAMES utf8");
          $cmd = $conn->prepare("UPDATE mascot SET name = :n, group_size = :gs, date_of_meet = :dm,
          time_of_meet = :tm, email = :e, phone = :p WHERE id= :i");
          $cmd->bindParam(':n', $name);
          $cmd->bindParam(':gs', $group_size);
          $cmd->bindParam(':dm', $date_of_meet);
          $cmd->bindParam(':tm', $time_of_meet);
          $cmd->bindParam(':e', $email);
          $cmd->bindParam(':p', $phone);
          $cmd->bindParam(':i', $id);
          $count = $cmd->execute();
          return $count;
        } catch (PDOException $e) {
          return $e->getMessage();
        }
      }


//READ
  public static function detail($id) {
    try {
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM mascot WHERE id = :i");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':i', $id);
       $cmd->execute();
       return $cmd->fetchAll();
     } catch (PDOException $e) {
       return $e->getMessage();
     }
  }








}

?>
