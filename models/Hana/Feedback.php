<?php
class Feedback extends PDO_DB {

  public static function addFeedBack($name,$dob,$email,$phone,$date_of_visit,$question1,$question2,
  $question3,$question4,$question5,$question6,$question7,$message) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("INSERT INTO feedback(name,dob,email,phone,date_of_visit,question1,question2,
        question3,question4,question5,question6,question7,message)
      VALUES(:n,:d,:e,:p,:v,:q1,:q2,:q3,:q4,:q5,:q6,:q7,:m)");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':n',$name);
      $cmd->bindParam(':d',$dob);
      $cmd->bindParam(':e',$email);
      $cmd->bindParam(':p',$phone);
      $cmd->bindParam(':v',$date_of_visit);
      $cmd->bindParam(':q1',$question1);
      $cmd->bindParam(':q2',$question2);
      $cmd->bindParam(':q3',$question3);
      $cmd->bindParam(':q4',$question4);
      $cmd->bindParam(':q5',$question5);
      $cmd->bindParam(':q6',$question6);
      $cmd->bindParam(':q7',$question7);
      $cmd->bindParam(':m',$message);
      return $cmd->execute();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

    public static function showFeedback() {
      try {
        $conn = self::connectDB();
        $conn->query("SET NAMES utf8");
        $cmd = $conn->prepare("SELECT * FROM feedback ORDER BY id DESC");
        $cmd->setFetchMode(PDO::FETCH_OBJ);
        $cmd->execute();
        return $cmd->fetchAll(); //return
      } catch (PDOException $e) {
        return $e->getMessage();
      }
    }

  //READ
    public static function detail($id) {
      try {
         $conn = self::connectDB();
         $conn->query("SET NAMES utf8");
         $cmd = $conn->prepare("SELECT * FROM feedback WHERE id = :i");
         $cmd->setFetchMode(PDO::FETCH_OBJ);
         $cmd->bindParam(':i', $id);
         $cmd->execute();
         return $cmd->fetchAll();
       } catch (PDOException $e) {
         return $e->getMessage();
       }
    }

  //UPDATE
    public static function editFeedback($id, $name,$dob,$email,$phone,$date_of_visit,$question1,$question2,$question3,
    $question4,$question5,$question6,$question7,$message) { //added id
      try {
        $conn = self::connectDB();
        $conn->query("SET NAMES utf8");
        $cmd = $conn->prepare("UPDATE feedback SET name = :n, dob = :db, email = :e, phone = :p, date_of_visit = :dv, question1 = :q1,
          question2 = :q2, question3 = :q3, question4 = :q4, question5 = :q5, question6 = :q6, question7 = :q7, message = :m WHERE id= :i");
        $cmd->bindParam(':n', $name);
        $cmd->bindParam(':db', $dob);
        $cmd->bindParam(':e', $email);
        $cmd->bindParam(':p', $phone);
        $cmd->bindParam(':dv', $date_of_visit);
        $cmd->bindParam(':q1', $question1);
        $cmd->bindParam(':q2', $question2);
        $cmd->bindParam(':q3', $question3);
        $cmd->bindParam(':q4', $question4);
        $cmd->bindParam(':q5', $question5);
        $cmd->bindParam(':q6', $question6);
        $cmd->bindParam(':q7', $question7);
        $cmd->bindParam(':m', $message);
        $cmd->bindParam(':i', $id);
        $count = $cmd->execute();
        return $count;
      } catch (PDOException $e) {
        return $e->getMessage();
      }
    }

  //DELETE
    public static function deleteFeedback($id) {
      try {
        $conn = self::connectDB();
        $cmd = $conn->prepare("DELETE FROM feedback WHERE id = :i");
        $cmd->bindParam(':i', $id);
        $count = $cmd->execute();
        return $count;
      } catch (PDOException $e) {
        return $e->getMessage();
      }
    }




}
 ?>
