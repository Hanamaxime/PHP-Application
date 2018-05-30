
<div class="container">
  <h1>Update Product</h1>
  <hr>
  <div class="err_msg"><?php echo LeeController::$viewBag['err_msg']; ?></div>
  <form action="#" method="post">
    <fieldset>
      <legend>Details</legend>

      <div class="form-group">
        <label for="product_name">Product name</label>
        <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo LeeController::$viewBag['product_name']; ?>">
      </div>
      <div class="form-group">
        <label for="product_price">Price</label>
        <input type="text" class="form-control" name="product_price" id="product_price" value="<?php echo LeeController::$viewBag['product_price']; ?>">
      </div>
    <div class="form-group">
      <label for="ticket_thumbnail">Thumbnail</label>
      <input type="text" class="form-control" name="product_thumbnail" id="product_thumbnail" value="<?php echo LeeController::$viewBag['product_thumbnail']; ?>">
    </div>
    <div class="form-group">
      <label for="product_category">Category</label>
      <select name="product_category" class="form-control" id="product_category">
        <?php foreach(LeeController::showCategories() as $item):
          $selected = LeeController::$viewBag['product_category'] == $item->product_category ? "selected" : "";
        ?>
          <option <?php echo $selected; ?> value="<?php echo $item->product_category; ?>"><?php echo $item->product_category; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="in_stock">Stock Available</label>
      <select name="in_stock" class="form-control" id="in_stock">
        <option value="1">Yes</option>
        <option value="0">No</option>
      </select>
    </div>
    <div class="form-group">
      <label for="product_desc">Description</label>
      <textarea class="form-control adm-textarea" name="product_desc" id="product_desc"><?php echo LeeController::$viewBag['product_desc']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="shipping_delivery">Shipping details</label>
      <textarea class="form-control adm-textarea" name="shipping_delivery" id="shipping_delivery"><?php echo LeeController::$viewBag['shipping_delivery']; ?></textarea>
    </div>
    <input type="submit" class="btn btn-success" name="btnSubmit" id="btnSubmit" value="Update"/>
    <a href="<?php echo Routes::getBaseUrl(); ?>giftshop_admin" class="btn btn-primary">Go back</a>
    </fieldset>
  </form>
</div>
