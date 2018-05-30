<div class="container">
  <h1 class="text-center admin_h1">DSI Admin Portal</h1>
  <form class="login-frm" name="login-frm" method="post" action="#">
    <div class="row">
      <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
    </div>
    <div class="form-check">
      <input type="checkbox" name="remember_box" id="remember_box" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Remember me</label>
    </div>
    <div class="err_msg text-center">
      <?php echo HomeController::$viewBag['err_msg']; ?>
    </div>
    <div class="text-center">
    <input type="submit" name="btn_login" class="btn btn-primary" value="Login">
    </div>
    <div>
      <?php
      if(isset($_SESSION['remember_me'])){
        if($_SESSION['remember_me'] == true)
        echo "Welcome back, <strong>".$_SESSION['user']."</strong><br><a href='".Routes::getBaseUrl()."faq_admin'>Click here</a> to admin portal";
      }
       ?>
    </div>
  </form>
</div>
</div>
</div>
