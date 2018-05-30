<?php
/*
  CORE ROUTES. DO NOT TOUCH THIS FILE
  CODED BY LILCASOFT.INFO
*/
class Routes extends RewriteEngine {
  private static $base_url;
  private static $item_types;
  private static $img_dir;
  private static $admin_session = false;

  public static function setBaseUrl($url){
    self::$base_url = $url;
  }
  public static function getBaseUrl() {
    return self::$base_url;
  }

  public static function setImgTypes($img_type){
    self::$item_types = $img_type;
  }
  public static function getImgTypes() {
    return self::$item_types;
  }

  public static function setImgDir($img_dir){
    self::$img_dir = $img_dir;
  }
  public static function getImgDir() {
    return self::$img_dir;
  }


  public static function setAdminSession($adm){
    self::$admin_session = $adm;
  }
  public static function getAdminSession() {
    return self::$admin_session;
  }

  public static function checkAdminSession($adm,$redirect_page) {
    if(self::getAdminSession() == true){
      if(!isset($_SESSION['user'])){
        header("Location: ".self::getBaseUrl().$redirect_page);
      }
    }
  }

  function __construct($input_url,$img_types, $img_dir) {
    self::setBaseUrl($input_url);
    self::setImgTypes($img_types);
    self::setImgDir($img_dir);
  }




  public static function addPage($route, $func) {
    try {
      $re = new RewriteEngine(); //intialize rewrite engine
      if(isset($_SERVER['PATH_INFO'])){
        $page = $re->url_segment(1);
        $routeArr = array();
        if(!empty($page)){
          if($page == $route) {
            $routeArr[] = $route;
            $func->__invoke();
          }
        }else{
          header("Location: home"); //default route action will be home
        }
      }else{
          header("Location: home");
      }
    } catch(Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
  }

}

 ?>
