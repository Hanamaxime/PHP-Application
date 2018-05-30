<?php

class HanaController extends CoreController {

//-----------MASCOT-------------------------

//Mascot ADD

  public static function addMascot($name,$group_size,$date_of_meet,$time_of_meet,$email,$phone) {
    self::loadModel("Hana/Mascot");
    return Mascot::addMascot($name,$group_size,$date_of_meet,$time_of_meet,$email,$phone);
  }

//Mascot SHOW

  public static function showMascot() {
  self::loadModel("Hana/Mascot");
  $data = Mascot::showMascot();
  return $data;
  }

//Mascot DELETE

  public static function deleteMascot($id){
    self::loadModel("Hana/Mascot");
    return Mascot::deleteMascot($id);
  }

//Mascot EDIT

  public static function editMascot($id, $name, $group_size, $date_of_meet, $time_of_meet, $email, $phone){
    self::loadModel("Hana/Mascot");
    return Mascot::editMascot($id, $name, $group_size, $date_of_meet, $time_of_meet, $email, $phone);
  }

//FIND BY ID
  public static function findById($id) {
    self::loadModel("Hana/Mascot");
    return Mascot::detail($id);
  }

//-----------FEEDBACK-------------------------

//Feedback ADD

public static function addFeedBack($name,$dob,$email,$phone,$date_of_visit,$question1,$question2,$question3,$question4,$question5,$question6,$question7,$message) {
  self::loadModel("Hana/Feedback");
  return Feedback::addFeedBack($name,$dob,$email,$phone,$date_of_visit,$question1,$question2,$question3,$question4,$question5,$question6,$question7,$message);
}

//Feedback DELETE

  public static function deleteFeedback($id){
    self::loadModel("Hana/Feedback");
    return Feedback::deleteFeedback($id);
  }

//Feedback SHOW

  public static function showFeedback() {
  self::loadModel("Hana/Feedback");
  $data = Feedback::showFeedback();
  return $data;
  }

//Feedback EDIT

  public static function editFeedback($id,$name,$dob,$email,$phone,$date_of_visit,$question1,$question2,
  $question3,$question4,$question5,$question6,$question7,$message){
    self::loadModel("Hana/Feedback");
    return Feedback::editFeedback($id,$name,$dob,$email,$phone,$date_of_visit,$question1,$question2,
    $question3,$question4,$question5,$question6,$question7,$message);
  }

//FIND BY ID
  public static function findByIdFeed($id) {
    self::loadModel("Hana/Feedback");
    return Feedback::detail($id);
  }




}
 ?>
