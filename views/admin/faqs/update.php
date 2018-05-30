<div class="container-fluid">
      <h1 class="admin_h1">Edit/ Update FAQ</h1>
      <hr />
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="err_msg">
            <?php LeeController::addView("Shared/_admin_navigation"); ?>
          </div>
          </div>
          <div class="col-lg-9 col-md-9">
          <form action="#" method="post">
            <?php echo AqsController::$viewBag['err_msg']; ?>
            <fieldset>
              <p>
                In the fields below, you can re-type information for selected FAQ
                and click on 'UPDATE' to submit the edited version. The updated FAQ will
                be added to both public and admin page.
              </p>
              <div class="form-group">
                <label for="faq_categories">Categories</label>
                <select class="form-control" name="faq_categories" id="faq_categories">
                  <?php
                  $categories = AqsController::showAllCategories();
                  foreach($categories as $item){
                    $selected = AqsController::$viewBag['category'] == $item->category_item ? 'selected' : '';
                    echo "<option value='".$item->category_item."' ".$selected.">".$item->category_item."</option>";
                  }
                  ?>
                </select>
              </div>

      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author" id="author" value="<?php echo AqsController::$viewBag['author']; ?>">
      </div>
    <div class="form-group">
      <label for="question">Question</label>
      <textarea class="form-control adm-textarea" name="question" id="question"><?php echo AqsController::$viewBag['question']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="answer">Answer</label>
      <textarea class="form-control adm-textarea" name="answer" id="answer"><?php echo AqsController::$viewBag['answer']; ?></textarea>
    </div>

    <input type="submit" class="btn btn-success" name="btnSubmit" id="btnSubmit" value="UPDATE"/>
    <a href="<?php echo Routes::getBaseUrl(); ?>faq_admin" class="btn btn-primary">GO BACK</a>
    </fieldset>
  </form>
</div></div></div>
