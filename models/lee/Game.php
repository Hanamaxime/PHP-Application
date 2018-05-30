<?php
class Game extends PDO_DB {
  public static function showTop10Score() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM game_logs ORDER BY user_score DESC LIMIT 10");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function search_game_by_admin($usr) {
    try {
      $usr = "%".$usr."%";
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM game_logs WHERE user_name LIKE :u");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':u', $usr,PDO::PARAM_STR);
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
      $cmd = $conn->prepare("SELECT * FROM game_logs WHERE id = :i");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':i',$id);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function checkExistUser($usr) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM game_logs WHERE user_name = :u");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':u',$usr);
      $cmd->execute();
      return $cmd->fetchColumn();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function checkBackScore($user_name, $current_score) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM game_logs WHERE user_score < :s AND user_name = :u");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':s',$current_score);
      $cmd->bindParam(':u',$user_name);
      $cmd->execute();
      return $cmd->fetchColumn();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }



  public static function addScore($game_title,$user_name, $user_score, $played_date,$game_level) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("INSERT INTO game_logs(game_title,user_name,user_score,played_date,game_level) VALUES(:t,:u,:s,:d,:l)");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':t',$game_title);
      $cmd->bindParam(':u',$user_name);
      $cmd->bindParam(':s',$user_score);
      $cmd->bindParam(':d',$played_date);
      $cmd->bindParam(':l',$game_level);
      return $cmd->execute();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function updateScore($user_name, $user_score, $played_date,$game_level) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("UPDATE game_logs SET user_score = :s, played_date = :d, game_level = :l WHERE user_name = :u");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':s',$user_score);
      $cmd->bindParam(':d',$played_date);
      $cmd->bindParam(':l',$game_level);
      $cmd->bindParam(':u',$user_name);
      return $cmd->execute();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function deleteUser($id) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("DELETE FROM game_logs WHERE id = :i");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':i',$id);
      return $cmd->execute();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }




}
 ?>
