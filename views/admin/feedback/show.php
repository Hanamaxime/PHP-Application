<div class="container-fluid">
    <hr>
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <?php HanaController::addView("Shared/_admin_navigation"); ?>
        </div>
        <div class="col-lg-9 col-md-9">
          <h1>Feedback Admin Page</h1>
          <p>
            Welcome to the feedback repository of Dazzlin Star Island.
          </p>
          Both visitor and admin can submit feedback regarding the park.
          All questions have to be marked. To update or delete a submitted feedback
          form, click on the action associated to a particular form.
          </p>
          <a href="<?php echo Routes::getBaseUrl(); ?>feedback" class="btn btn-primary">Submit Feedback</a>
          <div class="table-responsive">
            <br/>
            <table class="table table-striped">
                <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of Visit</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $results = HanaController::showFeedback();
                foreach ($results as $item) { ?>
                    <tr>
                      <td><?= $item->id; ?></td>
                      <td><?= $item->name; ?></td>
                      <td><?= $item->dob; ?></td>
                      <td><?= $item->email; ?></td>
                      <td><?= $item->phone; ?></td>
                      <td><?= date("Y-m-d", strtotime($item->date_of_visit)); ?></td>
                        <td>
                        <a href='<?= Routes::getBaseUrl() . "feedback_update/" . $item->id; ?>' class='btn btn-primary'>Update</a>
                        <a href='<?= Routes::getBaseUrl() . "feedback_delete/" . $item->id; ?>' class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
          </div>
<h3>Question-Wise Feedback Review</h3>
<p>
  Based on the feeback forms submitted by visitors, glance through the answers
  mentioned and understand what can be done to improve overall rating of Dazzlin
  Star Island Amusement Park.
</p>
<div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Question 1</th>
                    <th>Question 2</th>
                    <th>Question 3</th>
                    <th>Question 4</th>
                    <th>Question 5</th>
                    <th>Question 6</th>
                    <th>Question 7</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $results = HanaController::showFeedback();
                foreach ($results as $item) { ?>
                    <tr>
                      <td><?= $item->id; ?></td>
                      <td><?= $item->question1; ?></td>
                      <td><?= $item->question2; ?></td>
                      <td><?= $item->question3; ?></td>
                      <td><?= $item->question4; ?></td>
                      <td><?= $item->question5; ?></td>
                      <td><?= $item->question6; ?></td>
                      <td><?= $item->question7; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
              </div>

              <h3>Written Feedback Review</h3>
              <p>
                Based on the feeback forms submitted by visitors, glance through
                the written feedback submitted for Dazzlin Star Island Amusement Park.
              </p>
              <div class="table-responsive">
                          <table class="table table-striped">
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Message</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $results = HanaController::showFeedback();
                              foreach ($results as $item) { ?>
                                  <tr>
                                    <td><?= $item->id; ?></td>
                                    <td><?= $item->message; ?></td>
                                  </tr>
                                  <?php
                              }
                              ?>
                              </tbody>
                          </table>
                            </div>

        </div>
    </div>
</div>
