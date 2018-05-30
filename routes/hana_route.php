<?php
//Public
Routes::addPage("feedback", function() {
    //PHP login will be placing here
    //HanaController::$viewBag['err_msg']: this will be get value from route that passing through here
    //and it passes the array called $data with some index value insdie it
    //initialize global $data var array

    $data['err_msg'] = "";
    $data['name'] = "";
    $data['dob'] = "";
    $data['email'] = "";
    $data['phone'] = "";
    $data['date_of_visit'] = "";
    $data['question1'] = "";
    $data['question2'] = "";
    $data['question3'] = "";
    $data['question4'] = "";
    $data['question5'] = "";
    $data['question6'] = "";
    $data['question7'] = "";
    $data['message'] = "";

    //PHP get POST value by form element name not the ID. Only jquery get value by ID
    if(isset($_POST['btnSubmit'])) { // chieck if btn is pressed then do following logic inside

        //assign $_POST value to the array $data;
        $data['name'] = $_POST['name'];
        $data['dob'] = $_POST['dob'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['message'] = $_POST['message'];
        $data['date_of_visit'] = $_POST['date_of_visit'];
        $data['question1'] = @$_POST['question1'];
        $data['question2'] = @$_POST['question2'];
        $data['question3'] = @$_POST['question3'];
        $data['question4'] = @$_POST['question4'];
        $data['question5'] = @$_POST['question5'];
        $data['question6'] = @$_POST['question6'];
        $data['question7'] = @$_POST['question7'];
        //do if statement to check format and length

        if(empty($data['name'])) {
          $data['err_msg'] = "Please enter your name";
        }else if(Validation::testFormat($_POST['name'], 'name') == false) {
          $data['err_msg'] = "Your name cannot contain numbers";
        }else if(empty($data['dob'])){
          $data['err_msg'] = "Please enter your date of birth";
        }else if(Validation::testFormat($_POST['dob'], 'date') == false) {
          $data['err_msg'] = "Please enter date in this format YYYY-MM-DD";
        }else if(empty($data['email'])){
          $data['err_msg'] = "Please enter your email address";
        }else if(Validation::testFormat($_POST['email'], 'email') == false) {
          $data['err_msg'] = "Please enter valid email address";
        }else if(empty($data['phone'])){
          $data['err_msg'] = "Please enter your phone number";
        }else if(Validation::testFormat($_POST['phone'], 'phone') == false) {
          $data['err_msg'] = "Please enter valid phone number";
        }else if(empty($data['date_of_visit'])){
          $data['err_msg'] = "Please enter date of visit";
        }else if(Validation::testFormat($_POST['date_of_visit'], 'date') == false) {
          $data['err_msg'] = "Please enter date in this format YYYY-MM-DD";
        }else if(empty($data['question1'])){
          $data['err_msg'] = "Select one option for Question 1";
        }else if(empty($data['question2'])){
          $data['err_msg'] = "Select one option for Question 2";
        }else if(empty($data['question3'])){
          $data['err_msg'] = "Select one option for Question 3";
        }else if(empty($data['question4'])){
          $data['err_msg'] = "Select one option for Question 4";
        }else if(empty($data['question5'])){
          $data['err_msg'] = "Select one option for Question 5";
        }else if(empty($data['question6'])){
          $data['err_msg'] = "Select one option for Question 6";
        }else if(empty($data['question7'])){
          $data['err_msg'] = "Select one option for Question 7";
        }else{
          //this block will be executed once all the validation above passed!
          $count = HanaController::addFeedBack($data['name'],$data['dob'],$data['email'],$data['phone'],$data['date_of_visit'],$data['question1'],$data['question2'],$data['question3'],$data['question4'],$data['question5'],$data['question6'],
          $data['question7'],$data['message']);

          //pass all value to the insert function to DB
          if($count <= 0){
            $data['err_msg'] = "Failed to save in DB";
          }else{
            $data['err_msg'] = "Form is submited. Thanks for your feedback";
          }
        }
    }

    HanaController::addView("Shared/_header");
    HanaController::addView("Shared/_navigation");
    HanaController::addView("hana/feedback/content",$data);
    HanaController::addView("Shared/_footer");
});
Routes::addPage("dining", function() {
    HanaController::addView("Shared/_header");
    HanaController::addView("Shared/_navigation");
    HanaController::addView("hana/dining/content");
    HanaController::addView("Shared/_footer");
});
Routes::addPage("dining1", function() {
    HanaController::addView("Shared/_header");
    HanaController::addView("Shared/_navigation");
    HanaController::addView("hana/dining1/content");
    HanaController::addView("Shared/_footer");
});
Routes::addPage("dining2", function() {
    HanaController::addView("Shared/_header");
    HanaController::addView("Shared/_navigation");
    HanaController::addView("hana/dining2/content");
    HanaController::addView("Shared/_footer");
});
Routes::addPage("dining3", function() {
    HanaController::addView("Shared/_header");
    HanaController::addView("Shared/_navigation");
    HanaController::addView("hana/dining3/content");
    HanaController::addView("Shared/_footer");
});
Routes::addPage("dining4", function() {
    HanaController::addView("Shared/_header");
    HanaController::addView("Shared/_navigation");
    HanaController::addView("hana/dining4/content");
    HanaController::addView("Shared/_footer");
});
Routes::addPage("dining5", function() {
    HanaController::addView("Shared/_header");
    HanaController::addView("Shared/_navigation");
    HanaController::addView("hana/dining5/content");
    HanaController::addView("Shared/_footer");
});


Routes::addPage("mascot", function() {

  $data['err_msg'] = "";
  $data['name'] = "";
  $data['group_size'] = "";
  $data['date_of_meet'] = "";
  $data['time_of_meet'] = "";
  $data['email'] = "";
  $data['phone'] = "";

  if(isset($_POST['btnSubmit'])){

    //assign $_POST value to the array $data;
    $data['name'] = $_POST['name'];
    $data['group_size'] = $_POST['group_size'];
    $data['date_of_meet'] = $_POST['date_of_meet'];
    $data['time_of_meet'] = @$_POST['time_of_meet'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];


      if(empty($data['name'])){
        $data['err_msg'] = "Please enter your name ";
      }else if(Validation::testFormat($_POST['name'], 'name') == false) {
        $data['err_msg'] = "Your name cannot contain numbers";
      }else if (empty($data['group_size'])) {
        $data['err_msg'] = "Please enter group size";
      }else if(Validation::testFormat($_POST['group_size'], 'group_size') == false) {
        $data['err_msg'] = "Maximum Group Size is 12";
      }else if (empty($data['date_of_meet'])) {
        $data['err_msg'] = "Please enter a date";
      }else if(Validation::testFormat($_POST['date_of_meet'], 'date') == false) {
        $data['err_msg'] = "Not a valid date";
      }else if (empty($data['time_of_meet'])) {
        $data['err_msg'] = "Please enter a time to meet the mascot";
      }else if (empty($data['email'])) {
        $data['err_msg'] = "Please enter email";
      }else if(Validation::testFormat($_POST['email'], 'email') == false) {
        $data['err_msg'] = "Not a valid email";
      }else if (empty($data['phone'])) {
        $data['err_msg'] = "Please enter phone number";
      }else if(Validation::testFormat($_POST['phone'], 'phone') == false) {
        $data['err_msg'] = "Not a valid phone number";

      }else{

      $count = HanaController::addMascot($data['name'],$data['group_size'],$data['date_of_meet'],$data['time_of_meet'],$data['email'],$data['phone']);

      if($count <= 0){
        $data['err_msg'] = "Failed to save in DB";

      }else{
        $data['err_msg'] = "Thanks, your booking for meeting the Mascot has been confirmed!";
      }
    }
}

  HanaController::addView("Shared/_header");
  HanaController::addView("Shared/_navigation");
  HanaController::addView("hana/mascot/content",$data);
  HanaController::addView("Shared/_footer");
});

//---------- MASCOT ADMIN------------------------



//ROUTING OF ADMIN PAGES
Routes::addPage("mascot_admin", function() {
    Routes::setAdminSession(true); //use it func to set admin session check
    HanaController::addView("Shared/_header");
    HanaController::addView("Shared/_navigation");
    HanaController::addView("admin/mascot/show");
    HanaController::addView("Shared/_footer");
});


Routes::addPage("mascot_update", function() {
  Routes::setAdminSession(true);

  $err_msg = "";
  $data = array();
  if(!empty(Routes::url_segment(2))){
    $id = Routes::url_segment(2); //get id
    $results = HanaController::findById($id);
    foreach($results as $item) { //assign value to $data

      $data['id'] = $item->id;
      $data['name'] = $item->name;
      $data['group_size'] = $item->group_size;
      $data['date_of_meet'] = $item->date_of_meet;
      $data['time_of_meet'] = $item->time_of_meet;
      $data['email'] = $item->email;
      $data['phone'] = $item->phone;
    }
  }else{
    $data = array("name" => "",
                  "group_size" => "",
                  "date_of_meet" => "",
                  "time_of_meet" => "",
                  "email" => "",
                  "phone" => "",
                  "err_msg" => $err_msg);
  }
  if(isset($_POST['btnSubmit'])) {

    $data['id'] = $_POST['id'];
    $data['name'] = $_POST['name'];
    $data['group_size'] = $_POST['group_size'];
    $data['date_of_meet'] = $_POST['date_of_meet'];
    $data['time_of_meet'] = $_POST['time_of_meet'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];

    if(empty($data['name'])){
      $err_msg = "Please enter a name";
    }else if(empty($data['group_size'])) {
      $err_msg = "Please enter group size";
    }else if(empty($data['date_of_meet'])) {
      $err_msg = "Please enter date of meet";
    }else if(empty($data['time_of_meet'])) {
      $err_msg = "Please enter time of meet";
    }else if(empty($data['email'])) {
      $err_msg = "Please enter email";
    }else if(empty($data['phone'])) {
      $err_msg = "Please enter phone number";
    }else{
        $count = HanaController::editMascot($id, $data['name'], $data['group_size'], $data['date_of_meet'], //call on the controller function editMascot
        $data['time_of_meet'],$data['email'],$data['phone']);
        if($count <= 0){
          $err_msg = "Cannot update information. Please try again!";
        }else{
          header("Location: ".Routes::getBaseUrl()."mascot_admin");
        }
    }
  }
  $data['err_msg'] = $err_msg;


    HanaController::addView("Shared/_header");
    HanaController::addView("Shared/_navigation");
    HanaController::addView("admin/mascot/update", $data);
    HanaController::addView("Shared/_footer");
});

Routes::addPage("mascot_delete", function() {
  Routes::setAdminSession(true);

    $data['err_msg'] = "";
    //finds the id in the URL which is the second segment
    if(!empty(Routes::url_segment(2))){
      $id = Routes::url_segment(2); //get id
      $count = HanaController::deleteMascot($id);

      if($count <= 0){
        $data['err_msg'] = "Unable to delete. Please try again!";
      }else{
        $data['err_msg'] = "Mascot Booking deleted!";
      }
    }else{
        header("Location: ".Routes::getBaseUrl()."home");
    }

    HanaController::addView("Shared/_header");
    HanaController::addView("Shared/_navigation");
    HanaController::addView("admin/mascot/delete",$data);
    HanaController::addView("Shared/_footer");
});

// Routes::addPage("mascot_add", function() {
//     Routes::setAdminSession(true);
//
//     HanaController::addView("Shared/_header");
//     HanaController::addView("Shared/_navigation");
//     HanaController::addView("admin/mascot/show");
//     HanaController::addView("Shared/_footer");
// });


//---------------FEEDBACK ADMIN------------------------


Routes::addPage("feedback_admin", function() {
    Routes::setAdminSession(true); //use it func to set admin session check
    HanaController::addView("Shared/_header");
    HanaController::addView("Shared/_navigation");
    HanaController::addView("admin/feedback/show");
    HanaController::addView("Shared/_footer");
});


Routes::addPage("feedback_delete", function() {
  Routes::setAdminSession(true);

    $data['err_msg'] = "";
    //finds the id in the URL which is the second segment
    if(!empty(Routes::url_segment(2))){
      $id = Routes::url_segment(2); //get id
      $count = HanaController::deleteFeedback($id);

      if($count <= 0){
        $data['err_msg'] = "Unable to delete. Please try again!";
      }else{
        $data['err_msg'] = "Feedback entry deleted!";
      }
    }else{
        header("Location: ".Routes::getBaseUrl()."home");
    }

    HanaController::addView("Shared/_header");
    HanaController::addView("Shared/_navigation");
    HanaController::addView("admin/feedback/delete",$data);
    HanaController::addView("Shared/_footer");
});


Routes::addPage("feedback_update", function() {
  Routes::setAdminSession(true);

  $err_msg = "";
  $data = array();
  if(!empty(Routes::url_segment(2))){
    $id = Routes::url_segment(2); //get id
    $results = HanaController::findByIdFeed($id);
    foreach($results as $item) { //assign value to $data

      $data['id'] = $item->id; //added id
      $data['name'] = $item->name;
      $data['dob'] = $item->dob;
      $data['email'] = $item->email;
      $data['phone'] = $item->phone;
      $data['date_of_visit'] = $item->date_of_visit;
      $data['question1'] = $item->question1;
      $data['question2'] = $item->question2;
      $data['question3'] = $item->question3;
      $data['question4'] = $item->question4;
      $data['question5'] = $item->question5;
      $data['question6'] = $item->question6;
      $data['question7'] = $item->question7;
      $data['message'] = $item->message;

    }
  }else{
    $data = array("name" => "",
                  "dob" => "",
                  "email" => "",
                  "phone" => "",
                  "date_of_visit" => "",
                  "question1" => "",
                  "question2" => "",
                  "question3" => "",
                  "question4" => "",
                  "question5" => "",
                  "question6" => "",
                  "question7" => "",
                  "message" => "",
                  "err_msg" => $err_msg);
  }
  if(isset($_POST['btnSubmit'])) {

    $data['id'] = $_POST['id ']; //added id
    $data['name'] = $_POST['name'];
    $data['dob'] = $_POST['dob'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['date_of_visit'] = $_POST['date_of_visit'];
    $data['question1'] = $_POST['question1'];
    $data['question2'] = $_POST['question2'];
    $data['question3'] = $_POST['question3'];
    $data['question4'] = $_POST['question4'];
    $data['question5'] = $_POST['question5'];
    $data['question6'] = $_POST['question6'];
    $data['question7'] = $_POST['question7'];
    $data['message'] = $_POST['message'];

    if(empty($data['name'])){
      $err_msg = "Please enter a name";

    }else if(empty($data['dob'])) {
      $err_msg = "Please enter a date of birth";

    }else if(empty($data['email'])) {
      $err_msg = "Please enter email";

    }else if(empty($data['phone'])) {
      $err_msg = "Please enter phone number";

    }else if(empty($data['date_of_visit'])) {
      $err_msg = "Please enter a date of visit";

    }else{
        $count = HanaController::editFeedback($id, $data['name'], $data['dob'], $data['email'], //call on the controller function editFeedback
        $data['phone'], $data['date_of_visit'], $data['question1'], $data['question2'], $data['question3'], $data['question4'], $data['question5'],
        $data['question6'], $data['question7'], $data['message']);

        if($count <= 0){
          $err_msg = "Cannot update information. Please try again!";
        }else{
          header("Location: ".Routes::getBaseUrl()."feedback_admin");
        }
    }
  }
  $data['err_msg'] = $err_msg;


    HanaController::addView("Shared/_header");
    HanaController::addView("Shared/_navigation");
    HanaController::addView("admin/feedback/update", $data);
    HanaController::addView("Shared/_footer");
});


?>
