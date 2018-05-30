<?php
require_once('./views/yuriy/vip/vendor/autoload.php');

$stripe = array(
    "secret_key"      => "sk_test_yrdRrNeBUXtJ4cuKRLuENacl",
    "publishable_key" => "pk_test_IreQWVEsceNn2tniEUIMDFea"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);