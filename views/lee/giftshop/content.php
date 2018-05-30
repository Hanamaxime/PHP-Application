
<div class="giftshop">
<div class="container-fluid">
<div class="banner row">
  <div class="tag-line col-lg-6 col-md-6">
    <h1>Welcome to Dazzlin Store</h1>
    <p>What to wear everywhere? These are key in all closets.</p>
  </div>
</div>
<div class="content">
  <div class="category-list">
    <select name="product_list" class="product_list">
      <?php
        foreach(LeeController::$viewBag['categories'] as $item) {
          echo "<option value='".$item->product_category."'>".$item->product_category."</option>";
        }
        echo "<option value='View All'>View All</option>";
       ?>
    </select>
  </div>
  <div class="row product_results">
    <?php
    foreach(LeeController::$viewBag['list_product'] as $item2) {
      echo "<div class='detail_product col-lg-4 col-md-6'>
      <a href='".Routes::getBaseUrl()."giftshop_detail/".$item2->product_category."/".$item2->id."'><img class='thumbnail_product' src='".Routes::getBaseUrl().$item2->product_thumbnail."'/></a>
      <div class='title_product'>".$item2->product_name."</div>
      <div class='price_product'>$".$item2->product_price."</div>
      </div>";
    }
     ?>
  </div>
</div>
<div class="promotion">
  <h2>Dazzlin Visa® Card</h2>
  <p>New Cardmembers earn a $100 statement credit. Restrictions apply.
  </p>
</div>
</div>

<script>
$(function() {
  $('.product_list').change( function() {
   $(this).find(":selected").each(function () {
     $.ajax( {
       method: 'post',
       url: 'ajax_category',
       data: {product_category: $(this).val()},
       success: function(data) {
         $('.product_results').html(data);
       }
     });
    });
 });

});
</script>
