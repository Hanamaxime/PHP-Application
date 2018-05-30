<?php
require "vendor/autoload.php";
define('SITE_URL',Routes::getBaseUrl());
$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
      'AUH1WT3eRlQBxtWYh4IpC7QQPuwzH3p44GbPIQrlCMyRdxnkQL892HvgIrOzsfxQXocSG8or8weDOONa',
      'ED5gIgx3rRQE1tOBfjE1xWsMeA6woyOEFHmbarNjNzClj-RRpD-8f6MnBMaF-DlCI364eIogNLVDdQzD'
      )
);
 ?>
