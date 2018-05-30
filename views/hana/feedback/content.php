<div class="container-fluid">
  <div class="feedback-banner">
    <div class="headliner">
      <div class="headliner-content">
        <h1>Talk to us!</h1>
        <p class="related">
          Want to tell us more about your expirience at the park? Follow the link below and let us know!
            <a class="gold-btn" href="#desc">VIEW MORE
              &nbsp;<i class="fas fa-angle-right arrow"></i></a>
          </p>
        </div>
      </div>
  </div>
    <div class="container">
      <div class="feature-event">
        <div class="row">
          <div class="col-regular">
            <div class="feature-content">
              <span><i class="fas fa-home"></i> / support / feedback</span>
              <h2 id="desc">Feedback</h2>
                <p>As our valued space explorers, we are always looking to improve your advantures here at Dazzlin Star Island.
                  We would love to hear from you how we can further better your visit at the park and what your favourite expiriences are!
                </p>
                <div class="col-lg-12">
                  <!-- to divide a page, first declare class row -->
    	              <form action="#" method="post" class="contact-form">

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

                      <div class="text-center">
                      <!-- Error Message -->
                      <div class='err_msg'><?php echo HanaController::$viewBag['err_msg']; ?></div>

                      <!-- Submit Button -->
                      <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit Feedback" class="btn btn-success"/>
                      </div>
                   </form>
            </div>
          </div>
        </div>
      </div>
      <p class="alert alert-success">
        The park is open 7 days a week and is operational between
        08:00 AM to 09:00 PM, but the timing of rides and restaurants might vary.
      </p>
    </div>
  </div>
</div>

<style>
input[type=radio] {
    margin: 1em;
}
</style>
