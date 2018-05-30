<?php
class Giftshop extends PDO_DB {

  public static function show() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM giftshop_stores ORDER BY id DESC");
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
      $cmd = $conn->prepare("SELECT * FROM giftshop_stores WHERE id = :id");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':id', $id);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }

  }

  public static function search_product_by_name($product_name) {
    try {
      $product_name = "%".$product_name."%";
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM giftshop_stores WHERE product_name LIKE :pn");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':pn', $product_name,PDO::PARAM_STR);
       $cmd->execute();
       return $cmd->fetchAll();
     } catch (PDOException $e) {
       return $e->getMessage();
     }
  }

  public static function loadProductCategories() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT product_category FROM store_categories ORDER BY id DESC");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function loadProductSizes() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT product_size FROM product_size ORDER BY id DESC");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function getProductsByCategory($category_name) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM giftshop_stores WHERE product_category = :c");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':c', $category_name);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }

  }


  public static function getSimilarProducts($id,$category_name) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM giftshop_stores WHERE product_category = :c AND id != :i");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':c', $category_name);
      $cmd->bindParam(':i', $id);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }


  //ADMIN CRUD FUNC
  public static function addProduct($product_name,$product_desc,$product_price,$product_category,$product_thumbnail,$shipping_delivery,$in_stock) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("INSERT INTO giftshop_stores(product_name,product_desc,product_price,product_category,product_thumbnail,shipping_delivery,in_stock) VALUES(:pn, :pd, :pp, :pc, :pt, :sd, :is)");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':pn',$product_name);
      $cmd->bindParam(':pd',$product_desc);
      $cmd->bindParam(':pp',$product_price);
      $cmd->bindParam(':pc',$product_category);
      $cmd->bindParam(':pt',$product_thumbnail);
      $cmd->bindParam(':sd',$shipping_delivery);
      $cmd->bindParam(':is',$in_stock);
      return $cmd->execute();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function updateProduct($id,$product_name,$product_desc,$product_price,$product_category,$product_thumbnail,$shipping_delivery,$in_stock) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("UPDATE giftshop_stores SET product_name = :pn, product_desc = :pd, product_price = :pp, product_category = :pc, product_thumbnail = :pt, shipping_delivery = :sd, in_stock = :is   WHERE id = :i");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':pn',$product_name);
      $cmd->bindParam(':pd',$product_desc);
      $cmd->bindParam(':pp',$product_price);
      $cmd->bindParam(':pc',$product_category);
      $cmd->bindParam(':pt',$product_thumbnail);
      $cmd->bindParam(':sd',$shipping_delivery);
      $cmd->bindParam(':is',$in_stock);
      $cmd->bindParam(':i',$id);
      return $cmd->execute();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function deleteProduct($id) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("DELETE FROM giftshop_stores WHERE id = :i");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->bindParam(':i',$id);
      return $cmd->execute();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }



}
 ?>
