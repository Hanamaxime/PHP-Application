<div class="product_content">

  <div class="container">
    <?php
      foreach(LeeController::$viewBag['product_detail'] as $item) {

        echo "<div class='direction'>
            <a href='".Routes::getBaseUrl()."home'><i class='fas fa-home'></i></a> / <a href='".Routes::getBaseUrl()."giftshop'>Giftshop</a> / Product
          </div>";

        echo "<div class='row'>
          <div class='col-lg-7'><img src='".Routes::getBaseUrl().$item->product_thumbnail."' alt='this is product thumbnail' title='".$item->product_name."' class='img-fluid' /></div>
          <div class='col-lg-5'>
            <h1>".$item->product_name."</h1>
            <div class='product_content_price'>$".$item->product_price."</div>
            <form action='".Routes::getBaseUrl()."add_to_cart' method='post'>
              <div>
              <input type='hidden' name='payment_from_page' id='payment_from_page' value='Gift shop' />
              <input type='hidden' name='product_name' id='product_price' value='".$item->product_name."' />
              <input type='hidden' name='product_price' id='product_price' value='".$item->product_price."' />
              <input type='hidden' name='product_thumbnail' id='product_thumbnail' value='".$item->product_thumbnail."' />
              <select name='product_quantity' class='product_content_quantity'>
                <option value='1'>Please select quantity</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
              </select>
              </div>
              <div>
              <input type='submit' name='btnGiftShopSubmit' id='btnAddToCart' value='Add to Cart' class='product_content_btn'/>
              </div>
            </form>
          </div>
        </div>

        <div class='row'>
          <div class='col-lg-12'>
            <div class='accordion'>
              <h3>Product Details</h3>
              <div><p>".$item->product_desc."</p></div>
              <h3>Shipping & Delivery</h3>
              <div><p>".$item->shipping_delivery."</p></div>
            </div>
          </div>
        </div>
        ";
      }
     ?>

     <!--LOAD SIMILAR PRODUCT-->
     <div class="related-products d-none d-sm-block">
       <h2 style="margin:1em;">More You May Like</h2>
      <div class="slider autoplay">
        <?php
          $result = LeeController::$viewBag['similar_products'];
          for ($i=0; $i < count($result); $i++) {
            echo "<div class='similar-product col-lg-4 col-md-6'>
            <a href='".Routes::getBaseUrl()."giftshop_detail/".$result[$i]->product_category."/".$result[$i]->id."'><img class='thumbnail_product' src='".Routes::getBaseUrl().$result[$i]->product_thumbnail."'/></a>
            <div class='title_product'>".$result[$i]->product_name."</div>
            <div class='price_product'>$".$result[$i]->product_price."</div>
            </div>";
          }
         ?>

     </div>
     </div>


  </div>
</div>

<script>
$('.autoplay').slick({
slidesToShow: 3,
slidesToScroll: 1,
autoplay: true,
autoplaySpeed: 1000,
});
</script>
