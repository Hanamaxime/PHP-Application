
<div class="container">
  <h1>Add new Product</h1>
  <hr>
  <div class="err_msg"><?php echo LeeController::$viewBag['err_msg']; ?></div>
  <form action="#" method="post" enctype="multipart/form-data">
    <fieldset>
      <legend>Details</legend>

      <div class="form-group">
        <label for="ticket_title">Product name</label>
        <input type="text" class="form-control" name="ticket_title" id="ticket_title" value="<?php echo LeeController::$viewBag['ticket_title']; ?>">
      </div>
      <div class="form-group">
        <label for="ticket_price">Price</label>
        <input type="text" class="form-control" name="ticket_price" id="ticket_price" value="<?php echo LeeController::$viewBag['ticket_price']; ?>">
      </div>
    <div class="form-group">
      <label for="ticket_thumbnail">Thumbnail</label>
      <input type="file" class="form-control" name="ticket_thumbnail" id="ticket_thumbnail">
    </div>
    <div class="form-group">
      <label for="ticket_desc">Description</label>
      <textarea class="form-control adm-textarea" name="ticket_desc" id="ticket_desc"><?php echo LeeController::$viewBag['ticket_desc']; ?></textarea>
    </div>

    <input type="submit" class="btn btn-success" name="btnSubmit" id="btnSubmit" value="Create"/>
    <a href="<?php echo Routes::getBaseUrl(); ?>ticket_booking_admin" class="btn btn-primary">Go back</a>
    </fieldset>
  </form>
</div>
