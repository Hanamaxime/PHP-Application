<div class="container-fluid">
  <h1 class="admin_h1">Add FAQ Details</h1>
  <hr/>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <?php LeeController::addView("Shared/_admin_navigation"); ?>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-12">
            <form action="#" method="post">
              <fieldset>
                <div class="err_msg">
                  <?php echo AqsController::$viewBag['err_msg']; ?>
                </div>
                <p>
                  In order to add an FAQ, you need to enter question and answer
                  and assign category to it. You also need to provide your username
                  in the author field and click on 'CREATE' to add the FAQ.
                </p>
                <div class="form-group">
                  <label for="faq_categories">Categories</label>
                  <select class="form-control" name="faq_categories" id="faq_categories">
                    <?php
                    $categories = AqsController::showAllCategories();
                    foreach($categories as $item){
                      echo "<option value='".$item->category_item."'>".$item->category_item."</option>";
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
                  <textarea class="form-control adm-textarea" name="question" id="question"><?php echo AqsController::$viewBag['question'];; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="answer">Answer</label>
                  <textarea class="form-control adm-textarea" name="answer" id="answer"><?php echo AqsController::$viewBag['answer']; ?></textarea>
                </div>
                <input type="submit" class="btn btn-success" name="btnSubmit" id="btnSubmit" value="CREATE"/>
                <a href="<?php echo Routes::getBaseUrl(); ?>faq_admin" class="btn btn-primary">GO BACK</a>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
