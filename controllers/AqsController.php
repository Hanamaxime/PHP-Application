<?php
class AqsController extends CoreController {

  /*###################### FAQ CONTROLLER ###################### */
  public static function showAllQuestion(){
    self::loadModel("aqs/FAQ");
    return FAQ::show();
  }

  public static function showAllCategories(){
    self::loadModel("aqs/FAQ");
    return FAQ::get_faq_category();
  }

  public static function findQuestion($question) {
    self::loadModel("aqs/FAQ");
    return FAQ::search_by_question($question);
  }

  public static function findById($id) {
    self::loadModel("aqs/FAQ");
    return FAQ::detail($id);
  }

  public static function findByCategory($category) {
    self::loadModel("aqs/FAQ");
    return FAQ::search_by_category($category);
  }

  public static function addFAQ($category, $question, $answer, $date_created,$author){
    self::loadModel("aqs/FAQ");
    return FAQ::add($category, $question, $answer, $date_created,$author);
  }

  public static function editFAQ($id, $category, $question, $answer, $date_created,$author){
    self::loadModel("aqs/FAQ");
    return FAQ::update($id, $category, $question, $answer, $date_created,$author);
  }

  public static function deleteFAQ($id){
    self::loadModel("aqs/FAQ");
    return FAQ::delete($id);
  }

  /*###################### GIFTCARD CONTROLLER ###################### */
  public static function addPayment($amount, $sender, $receiver, $email){
    self::loadModel("aqs/Gcard");
    return Gcard::add($amount, $sender, $receiver, $email);
  }

  public static function showAllOrders(){
    self::loadModel("aqs/Gcard");
    return Gcard::show();
  }

  public static function search_by_sender_name($sender_name){
    self::loadModel("aqs/Gcard");
    return Gcard::search_by_sender($sender_name);
  }


  /*###################### CAREERS CONTROLLER ###################### */
  public static function showAllJobs(){
    self::loadModel("aqs/Career");
    return Career::show();
  }

  public static function findJobByID($id){
    self::loadModel("aqs/Career");
    return Career::detail($id);
  }

  public static function applicant_detail($id){
    self::loadModel("aqs/Career");
    return Career::applicant_detail($id);
  }

  public static function showApplicants(){
    self::loadModel("aqs/Career");
    return Career::showApplicants();
  }

  public static function saveApplicants($fullname, $address, $phone, $email, $job_from, $start_working_date, $resume_url, $career_fk_id){
    self::loadModel("aqs/Career");
    return Career::saveApplicants($fullname, $address, $phone, $email, $job_from, $start_working_date, $resume_url, $career_fk_id);
  }

  public static function addJob($job_title, $job_type, $job_desc, $job_requirements, $job_benefits, $job_salary, $job_start_date, $job_expire_date){
    self::loadModel("aqs/Career");
    return Career::addJob($job_title, $job_type, $job_desc, $job_requirements, $job_benefits, $job_salary, $job_start_date, $job_expire_date);
  }

  public static function updateJob($id,$job_title, $job_type, $job_desc, $job_requirements, $job_benefits, $job_salary, $job_start_date, $job_expire_date){
    self::loadModel("aqs/Career");
    return Career::updateJob($id,$job_title, $job_type, $job_desc, $job_requirements, $job_benefits, $job_salary, $job_start_date, $job_expire_date);
  }

  public static function deleteJob($id){
    self::loadModel("aqs/Career");
    return Career::deleteJob($id);
  }

  public static function search_job_by_name($search_term){
    self::loadModel("aqs/Career");
    return Career::search_job_by_name($search_term);
  }

  public static function search_applicant_by_name($app_name){
    self::loadModel("aqs/Career");
    return Career::search_applicant_by_name($app_name);
  }

}
?>
