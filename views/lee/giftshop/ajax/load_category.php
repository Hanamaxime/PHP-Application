<?php
$result =  LeeController::$viewBag;
if(empty($result)){
  echo "<div class='alert alert-warning' role='alert'>No related product found!</div>";
}else{
  foreach($result as $item) {
    echo "<div class='detail_product col-lg-4 col-md-6'>
    <a href='".Routes::getBaseUrl()."giftshop_detail/".$item->product_category."/".$item->id."'><img class='thumbnail_product' src='".Routes::getBaseUrl().$item->product_thumbnail."'/></a>
    <div class='title_product'>".$item->product_name."</div>
    <div class='price_product'>$".$item->product_price."</div>
    </div>";
  }
}

 ?>
