<?php
class FAQ extends PDO_DB {

  public static function show() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM faqs ORDER BY id DESC LIMIT 30");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function search_by_question($question) {
    try {
      $question = "%".$question."%";
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM faqs WHERE question LIKE :q");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':q', $question,PDO::PARAM_STR);
       $cmd->execute();
       return $cmd->fetchAll();
     } catch (PDOException $e) {
       return $e->getMessage();
     }
  }

  public static function search_by_category($category) {
    try {
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM faqs WHERE category = :c");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':c', $category);
       $cmd->execute();
       return $cmd->fetchAll();
     } catch (PDOException $e) {
       return $e->getMessage();
     }
  }

  public static function detail($id) {
    try {
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM faqs WHERE id = :i");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':i', $id);
       $cmd->execute();
       return $cmd->fetchAll();
     } catch (PDOException $e) {
       return $e->getMessage();
     }
  }

  public static function add($category, $question, $answer, $date_created,$author) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("INSERT INTO faqs(category, question, answer, date_created, author) VALUES(:c, :q, :a, :d, :au)");
      $cmd->bindParam(':c', $category);
      $cmd->bindParam(':q', $question);
      $cmd->bindParam(':a', $answer);
      $cmd->bindParam(':d', $date_created);
      $cmd->bindParam(':au', $author);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function update($id, $category, $question, $answer, $date_created,$author) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("UPDATE faqs SET category = :c, question = :q, answer = :a, date_created = :d, author = :au WHERE id= :i");
      $cmd->bindParam(':c', $category);
      $cmd->bindParam(':q', $question);
      $cmd->bindParam(':a', $answer);
      $cmd->bindParam(':d', $date_created);
      $cmd->bindParam(':au', $author);
      $cmd->bindParam(':i', $id);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function delete($id) {
    try {
      $conn = self::connectDB();
      $cmd = $conn->prepare("DELETE FROM faqs WHERE id = :i");
      $cmd->bindParam(':i', $id);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function get_faq_category() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM faq_categories ORDER BY category_item ASC");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
?>
