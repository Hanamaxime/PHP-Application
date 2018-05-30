<div class="container-fluid">

      <hr />
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="err_msg">
            <?php LeeController::addView("Shared/_admin_navigation"); ?>
          </div>
          </div>
          <div class="col-lg-9 col-md-9">
          <form action="#" method="post">
              <h1 class="admin_h1">Update Feedback Information</h1>
              <p>
                In the fields below, you can re-type information for selected Guest Feedback
                and click on 'UPDATE' to submit the edited version. The updated Guest Feedback will
                be added to the admin page.
              </p>
              <div class="col-lg-12">
                <!-- to divide a page, first declare class row -->
                  <form action="#" method="post">

                    <!-- Name -->
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" value="<?php echo HanaController::$viewBag['name']; ?>" placeholder="Enter Name">
                    </div>

                    <!-- Date of Birth -->
                    <div class="form-group">
                      <label for="dob">Date of Birth</label>
                      <input type="date" name="dob" class="form-control" value="<?php echo HanaController::$viewBag['dob']; ?>" placeholder="Enter Date of Birth">
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control" value="<?php echo HanaController::$viewBag['email']; ?>" placeholder="spaceadventurer@galaxy.com">
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="text" name="phone" class="form-control" value="<?php echo HanaController::$viewBag['phone']; ?>" placeholder="999-9999-999">
                    </div>

                    <!-- Date of Visit -->
                    <div class="form-group">
                      <label for="date_of_visit">Date of Visit:</label>
                      <input type="date" name="date_of_visit" class="form-control" value="<?php echo HanaController::$viewBag['date_of_visit'];?>" placeholder="Enter Day of Visit">
                    </div>

                    <!-- Feedback Question #1-->
                    <p>
                      <label for="question1" id="question1">
                        1. How would you rate your overall experience at the park?
                      </label>
                        <fieldset>
                          <?php
                          $question_list = array('Amazing','Good','Average','Poor');
                            $checked = "";
                            for ($i=0; $i < count($question_list); $i++) {
                              $checked = $question_list[$i] == HanaController::$viewBag['question1'] ? "checked" : "";
                                echo "<input type='radio' ".$checked." name='question1' value= '".$question_list[$i]."' />".$question_list[$i] ;
                            }
                          ?>
                      </fieldset>
                    </p>

                    <!-- Feedback Question #2-->
                    <p>
                      <label for="question2" id="question2">
                        2. How would you rate the quality of the attractions at ZDT's?
                      </label>
                        <fieldset>
                          <?php
                          $question_list = array('Amazing','Good','Average','Poor');
                            $checked = "";
                            for ($i=0; $i < count($question_list); $i++) {
                              $checked = $question_list[$i] == HanaController::$viewBag['question2'] ? "checked" : "";
                                echo "<input type='radio' ".$checked." name='question2' value= '".$question_list[$i]."' />".$question_list[$i] ;
                            }
                          ?>
                      </fieldset>
                    </p>

                    <!-- Feedback Question #3-->
                    <p>
                      <label for="question3" id="question3">
                        3. How would you rate your expirience purchasing tickets for entry into the park?
                      </label>
                        <fieldset>
                          <?php
                          $question_list = array('Amazing','Good','Average','Poor');
                            $checked = "";
                            for ($i=0; $i < count($question_list); $i++) {
                              $checked = $question_list[$i] == HanaController::$viewBag['question3'] ? "checked" : "";
                                echo "<input type='radio' ".$checked." name='question3' value= '".$question_list[$i]."' />".$question_list[$i] ;
                            }
                          ?>
                      </fieldset>
                    </p>

                    <!-- Feedback Question #4-->
                    <p>
                      <label for="question4" id="question4">
                        4. If you tried our food, how would you rate the quality?
                      </label>
                        <fieldset>
                          <?php
                          $question_list = array('Amazing','Good','Average','Poor');
                            $checked = "";
                            for ($i=0; $i < count($question_list); $i++) {
                              $checked = $question_list[$i] == HanaController::$viewBag['question4'] ? "checked" : "";
                                echo "<input type='radio' ".$checked." name='question4' value= '".$question_list[$i]."' />".$question_list[$i] ;
                            }
                          ?>
                      </fieldset>
                    </p>

                    <!-- Feedback Question #5-->
                    <p>
                      <label for="question5" id="question5">
                        5. How would you rate the pricing of the food?
                      </label>
                        <fieldset>
                          <?php
                          $question_list = array('Expensive','Reasonable','Average');
                            $checked = "";
                            for ($i=0; $i < count($question_list); $i++) {
                              $checked = $question_list[$i] == HanaController::$viewBag['question5'] ? "checked" : "";
                                echo "<input type='radio' ".$checked." name='question5' value= '".$question_list[$i]."' />".$question_list[$i] ;
                            }
                          ?>
                      </fieldset>
                    </p>

                    <!-- Feedback Question #6-->
                    <p>
                      <label for="question6" id="question6">
                        6. How would you rate the overall appearance and/or theming of the outdoor sections of the park?
                      </label>
                        <fieldset>
                          <?php
                          $question_list = array('Attractive','Good','Average','Unpleasant');
                            $checked = "";
                            for ($i=0; $i < count($question_list); $i++) {
                              $checked = $question_list[$i] == HanaController::$viewBag['question6'] ? "checked" : "";
                                echo "<input type='radio' ".$checked." name='question6' value= '".$question_list[$i]."' />".$question_list[$i] ;
                            }
                          ?>
                      </fieldset>
                    </p>

                    <!-- Feedback Question #7-->
                    <p>
                      <label for="question7" id="question7">
                        7. How would you rate the customer service you received while at the park?
                      </label>
                        <fieldset>
                          <?php
                          $question_list = array('Outstanding','Good','Average','Poor');
                            $checked = "";
                            for ($i=0; $i < count($question_list); $i++) {
                              $checked = $question_list[$i] == HanaController::$viewBag['question7'] ? "checked" : "";
                                echo "<input type='radio' ".$checked." name='question7' value= '".$question_list[$i]."' />".$question_list[$i] ;
                            }
                          ?>
                      </fieldset>
                    </p>

                    <!-- Message -->
                    <div class="form-group">
                      <label for="message">Additional Comments (optional)</label>
                      <textarea class="form-control" name="message" id="message"><?php echo HanaController::$viewBag['message']; ?></textarea>
                    </div>


                    <!-- Error Message -->
                    <div class='err_msg text-center'><?php echo HanaController::$viewBag['err_msg']; ?></div>

                    <!-- Submit Button -->
                    <input type="submit" name="btnSubmit" id="btnSubmit" value="Update Feedback" class="btn btn-primary"/>

                 </form>

                 </div>
                 </div>
                 </div>
                 </div>
                 <style>
                 input[type=radio] {
                     margin: 1em;
                 }
                 </style>
