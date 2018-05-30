<?php
if (!isset($_SESSION['shopping_carts'])) {
    $_SESSION['shopping_carts'] = array();
}
if (!isset($_SESSION['shipping_info'])) {
    $_SESSION['shipping_info'] = array();
}
Routes::checkAdminSession(true,"home");
?>

<!doctype html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Team SuperCoder">
<meta charset="utf-8">
<title>Dazzlin Star Island - Toronto's #1 Space Theme Park</title>
<!--STYLE SHEET INCLUDED BOOTSTRAP 4.0-->
<link rel='stylesheet prefetch' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
<link rel='shortcut icon' type='image/x-icon' href='<?php echo Routes::getBaseUrl(); ?>images/favicon.ico' />
<link rel="stylesheet" type="text/css" href="<?php echo Routes::getBaseUrl(); ?>css/style.css?v=1.93">
<link rel="stylesheet" type="text/css" href="<?php echo Routes::getBaseUrl(); ?>css/lee.css?v=1.26">
<link rel="stylesheet" type="text/css" href="<?php echo Routes::getBaseUrl(); ?>css/aqs.css?v=1.2">
<link rel="stylesheet" type="text/css" href="<?php echo Routes::getBaseUrl(); ?>css/yuri.css">
<link rel="stylesheet" type="text/css" href="<?php echo Routes::getBaseUrl(); ?>css/hana.css">
<link rel="stylesheet" type="text/css" href="<?php echo Routes::getBaseUrl(); ?>css/andrei.css">
<link rel="stylesheet" href="<?php echo Routes::getBaseUrl(); ?>css/fontawesome-all.min.css">
<link rel="stylesheet" href="<?php echo Routes::getBaseUrl(); ?>css/bootstrap.min.css?v=1.15"> <!--BOOTSTRAP CSS 4.0 -->
<link rel="stylesheet" type="text/css" href="<?php echo Routes::getBaseUrl(); ?>css/slick.css"/> <!--slick lib-->
<link rel="stylesheet" type="text/css" href="<?php echo Routes::getBaseUrl(); ?>css/slick-theme.css"/> <!--slick theme lib-->


<!-- TEXT EDITOR LIB -->
<!-- Include external CSS. -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<!-- Include Editor style. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_style.min.css" rel="stylesheet" type="text/css" />


<!--JAVASCRIPT LIBRARY INCLUDED JQUERY, BOOSTRAP 4.0-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo Routes::getBaseUrl(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo Routes::getBaseUrl(); ?>js/andrei.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
<!-- INCLUDE TimelineLite JAVASCRIPT LIB -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
<script src="<?php echo Routes::getBaseUrl(); ?>js/slick.min.js"></script>
<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/js/froala_editor.pkgd.min.js"></script>
<script> $(function() { $('.adm-textarea').froalaEditor() }); </script>
</head>
<body>
