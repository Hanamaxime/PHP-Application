<?php
//ROUTING OF PUBLIC PAGES
Routes::addPage("faq", function() {

  $data = array('faq_lists' => AqsController::showAllQuestion(),
                'faq_categories' => AqsController::showAllCategories());
    AqsController::addView("Shared/_header");
    AqsController::addView("Shared/_navigation");
    AqsController::addView("aqs/faq/content",$data);
    AqsController::addView("Shared/_footer");
});

Routes::addPage("search_by_question", function() { //AJAX SEARCH BOX
  if(isset($_POST['search'])){
    $search_term = $_POST['search'];
    $data = AqsController::findQuestion($search_term);
    AqsController::addView("aqs/ajax/_search_faq_result",$data);
  }else{
    echo "Nothing found!";
  }

});

Routes::addPage("search_by_category", function() { //AJAX SEARCH BOX
  if(isset($_POST['category'])){
    $category = $_POST['category'];
    $data = AqsController::findByCategory($category);
    AqsController::addView("aqs/ajax/_search_faq_result",$data);
  }else{
    echo "Nothing found!";
  }

});


/* CAREER PAGE */

Routes::addPage("career", function() {
  $data = array('list_jobs' => AqsController::showAllJobs());
    AqsController::addView("Shared/_header");
    AqsController::addView("Shared/_navigation");
    AqsController::addView("aqs/career/content",$data);
    AqsController::addView("Shared/_footer");
});

Routes::addPage("view_job", function() {
  $data['err_msg'] = "";
  if(!empty(Routes::url_segment(2))){
    $job_id = Routes::url_segment(2);
  }

  if(isset($_POST['btnApplicantSubmit'])){
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $hearfrom_list = $_POST['hearfrom_list'];
    $available_date = $_POST['available_date'];
    $resume_url = $_POST['resume_url'];
    $job_id = $_POST['job_id'];
    $count = AqsController::saveApplicants($fullname, $address, $phone, $email, $hearfrom_list, $available_date, $resume_url, $job_id);
    if($count <= 0){
      $data['err_msg'] = "Cannot send your application to the server. Please try again!";
    }else{
      $data['err_msg'] = "Thanks for submitting your application. We will contact you soon!";
    }
  }

  $data['job_detail'] = AqsController::findJobByID($job_id);
    AqsController::addView("Shared/_header");
    AqsController::addView("Shared/_navigation");
    AqsController::addView("aqs/career/view_job",$data);
    AqsController::addView("Shared/_footer");
});






/* GIFTCARD PAGE */

Routes::addPage("gcard", function() {
    AqsController::addView("Shared/_header");
    AqsController::addView("Shared/_navigation");
    AqsController::addView("aqs/gcard/content");
    AqsController::addView("Shared/_footer");
});


//ROUTING OF ADMIN PAGES


//CAREER PAGE
Routes::addPage("career_admin", function() {
    Routes::setAdminSession(true); //use it func to set admin session check

    AqsController::addView("Shared/_header");
    AqsController::addView("Shared/_navigation");
    AqsController::addView("admin/career/show");
    AqsController::addView("Shared/_footer");
});
Routes::addPage("career_create", function() {
    Routes::setAdminSession(true); //use it func to set admin session check


    $data['err_msg'] = "";
    $data['job_title'] = "";
    $data['job_salary'] = "";
    $data['job_type'] = "";
    $data['job_desc'] = "";
    $data['job_requirements'] = "";
    $data['job_benefits'] = "";
    $data['job_start_date'] = "";
    $data['job_expire_date'] = "";

    if(isset($_POST['btnSubmit'])) {

      $data['job_title'] = $_POST['job_title'];
      $data['job_salary'] = $_POST['job_salary'];
      $data['job_type'] = $_POST['job_type'];
      $data['job_desc'] = $_POST['job_desc'];
      $data['job_requirements'] = $_POST['job_requirements'];
      $data['job_benefits'] = $_POST['job_benefits'];
      $data['job_start_date'] = $_POST['job_start_date'];
      $data['job_expire_date'] = $_POST['job_expire_date'];

      if(empty($data['job_title'])) {
        $data['err_msg'] = "Please enter job title!";
      }else if(empty($data['job_salary'])) {
        $data['err_msg'] = "Please enter job salary!";
      }else if(empty($data['job_desc'])) {
        $data['err_msg'] = "Please enter job description!";
      }else if(empty($data['job_requirements'])) {
        $data['err_msg'] = "Please enter job requirement!";
      }else if(empty($data['job_start_date'])) {
        $data['err_msg'] = "Please choose start date!";
      }else if(empty($data['job_expire_date'])) {
        $data['err_msg'] = "Please choose expire date!";
      }else{
          //add data to DB
        $count = AqsController::addJob($data['job_title'], $data['job_type'], $data['job_desc'], $data['job_requirements'], $data['job_benefits'], $data['job_salary'], $data['job_start_date'], $data['job_expire_date']);
        if($count <= 0){
          $err_msg = "Fail to create new job. Please try again!";
        }else{

          //reset all fields
          $data['job_title'] = "";
          $data['job_salary'] = "";
          $data['job_type'] = "";
          $data['job_desc'] = "";
          $data['job_requirements'] = "";
          $data['job_benefits'] = "";
          $data['job_start_date'] = "";
          $data['job_expire_date'] = "";
          $data['err_msg'] = "Post success!";
        }

      }
    }


    AqsController::addView("Shared/_header");
    AqsController::addView("Shared/_navigation");
    AqsController::addView("admin/career/create",$data);
    AqsController::addView("Shared/_footer");
});
Routes::addPage("career_update", function() {
    Routes::setAdminSession(true); //use it func to set admin session check


    $data['err_msg'] = "";
    $data['job_title'] = "";
    $data['job_salary'] = "";
    $data['job_type'] = "";
    $data['job_desc'] = "";
    $data['job_requirements'] = "";
    $data['job_benefits'] = "";
    $data['job_start_date'] = "";
    $data['job_expire_date'] = "";
    $job_id = 0;

    if(!empty(Routes::url_segment(2))){
      $job_id = Routes::url_segment(2);
    }

    foreach(AqsController::findJobByID($job_id) as $item) {
      $data['job_title'] = $item->job_title;
      $data['job_salary'] = $item->job_salary;
      $data['job_type'] = $item->job_type;
      $data['job_desc'] = $item->job_desc;
      $data['job_requirements'] = $item->job_requirements;
      $data['job_benefits'] = $item->job_benefits;
      $data['job_start_date'] = $item->job_start_date;
      $data['job_expire_date'] = $item->job_expire_date;
    }

    if(isset($_POST['btnSubmit'])) {

      $data['job_title'] = $_POST['job_title'];
      $data['job_salary'] = $_POST['job_salary'];
      $data['job_type'] = $_POST['job_type'];
      $data['job_desc'] = $_POST['job_desc'];
      $data['job_requirements'] = $_POST['job_requirements'];
      $data['job_benefits'] = $_POST['job_benefits'];
      $data['job_start_date'] = $_POST['job_start_date'];
      $data['job_expire_date'] = $_POST['job_expire_date'];

      if(empty($data['job_title'])) {
        $data['err_msg'] = "Please enter job title!";
      }else if(empty($data['job_salary'])) {
        $data['err_msg'] = "Please enter job salary!";
      }else if(empty($data['job_desc'])) {
        $data['err_msg'] = "Please enter job description!";
      }else if(empty($data['job_requirements'])) {
        $data['err_msg'] = "Please enter job requirement!";
      }else if(empty($data['job_start_date'])) {
        $data['err_msg'] = "Please choose start date!";
      }else if(empty($data['job_expire_date'])) {
        $data['err_msg'] = "Please choose expire date!";
      }else{

        $count = AqsController::updateJob($job_id,$data['job_title'], $data['job_type'], $data['job_desc'], $data['job_requirements'], $data['job_benefits'], $data['job_salary'], $data['job_start_date'], $data['job_expire_date']);

        if($count <= 0){
          $err_msg = "Fail to update this job. Please try again!";
        }else{
          $data['err_msg'] = "Job ".$job_id." updated successfully!";
        }


      }
    }


    AqsController::addView("Shared/_header");
    AqsController::addView("Shared/_navigation");
    AqsController::addView("admin/career/update",$data);
    AqsController::addView("Shared/_footer");
});
Routes::addPage("career_delete", function() {
    Routes::setAdminSession(true); //use it func to set admin session check

    $data['err_msg'] = "";
    if(!empty(Routes::url_segment(2))){
      $job_id = Routes::url_segment(2);
      $count = AqsController::deleteJob($job_id);
      if($count <= 0) {
        $data['err_msg'] = "Cannot delete this job. Please try again!";

      }else{
        $data['err_msg'] = "Job ".$job_id." deleted successfully!";
      }
    }

    AqsController::addView("Shared/_header");
    AqsController::addView("Shared/_navigation");
    AqsController::addView("admin/career/delete",$data);
    AqsController::addView("Shared/_footer");
});

Routes::addPage("applicant_lists", function() {
  AqsController::addView("Shared/_header");
  AqsController::addView("Shared/_navigation");
  AqsController::addView("admin/career/show_applicants");
  AqsController::addView("Shared/_footer");
});

Routes::addPage("applicant_view", function() {

  if(!empty(Routes::url_segment(2))){
    $app_id = Routes::url_segment(2);
    $data = AqsController::applicant_detail($app_id);
    AqsController::addView("Shared/_header");
    AqsController::addView("Shared/_navigation");
    AqsController::addView("admin/career/applicant_view",$data);
    AqsController::addView("Shared/_footer");
  }else{
    header("Location: ".Routes::getBaseUrl()."home");
  }

});

Routes::addPage("search_job_by_name", function() { //AJAX SEARCH BOX
  if(isset($_POST['search'])){
    $search_term = $_POST['search'];
    $data = AqsController::search_job_by_name($search_term);
    LeeController::addView("admin/career/ajax/search_job_by_name",$data);
  }else{
    echo "Nothing found!";
  }

});

Routes::addPage("search_applicant_by_name", function() { //AJAX SEARCH BOX
  if(isset($_POST['search'])){
    $search_term = $_POST['search'];
    $data = AqsController::search_applicant_by_name($search_term);
    LeeController::addView("admin/career/ajax/search_applicant_by_name",$data);
  }else{
    echo "Nothing found!";
  }

});



//GCARD ADMIN PAGES
Routes::addPage("gcard_admin", function() {
    Routes::setAdminSession(true); //use it func to set admin session check

    AqsController::addView("Shared/_header");
    AqsController::addView("Shared/_navigation");
    AqsController::addView("admin/gcard/show");
    AqsController::addView("Shared/_footer");
});

Routes::addPage("search_by_sender_name", function() { //AJAX SEARCH BOX
  if(isset($_POST['search'])){
    $search_term = $_POST['search'];
    $data = AqsController::search_by_sender_name($search_term);
    LeeController::addView("admin/gcard/ajax/search_by_sender_name",$data);
  }else{
    echo "Nothing found!";
  }

});



//FAQ ADM PAGE
Routes::addPage("faq_admin", function() {
    Routes::setAdminSession(true); //use it func to set admin session check

    AqsController::addView("Shared/_header");
    AqsController::addView("Shared/_navigation");
    AqsController::addView("admin/faqs/show");
    AqsController::addView("Shared/_footer");
});

Routes::addPage("search_faq_by_admin", function() { //AJAX SEARCH BOX
  if(isset($_POST['search'])){
    $search_term = $_POST['search'];
    $data = AqsController::findQuestion($search_term);
    AqsController::addView("admin/faqs/ajax/search_by_question",$data);
  }else{
    echo "Nothing found!";
  }

});

Routes::addPage("faq_create", function() {
  Routes::setAdminSession(true);
    $err_msg = "";
    $data = array("question" => "",
                  "answer" => "",
                  "author" => "",
                  "err_msg" => $err_msg);
    if(isset($_POST['btnSubmit'])) {
      $data['question'] = $_POST['question'];
      $data['answer'] = $_POST['answer'];
      $data['author'] = $_POST['author'];
      $data['category'] = $_POST['faq_categories'];
      $data['date_created'] = date("Y-m-d");
      if(empty($data['author'])){
        $err_msg = "Please identify author of posting!";
      }else if(empty($data['question'])) {
        $err_msg = "Question is required!";
      }else if(empty($data['answer'])) {
        $err_msg = "Answer is required!";
      }else{
          $count = AqsController::addFAQ($data['category'], $data['question'], $data['answer'], $data['date_created'],$data['author']);
          if($count <= 0){
            $err_msg = "Cannot create a new question. Please try again!";
          }else{
            header("Location: faq_admin");
          }
      }
    }
    $data['err_msg'] = $err_msg;
    AqsController::addView("Shared/_header");
    AqsController::addView("Shared/_navigation");
    AqsController::addView("admin/faqs/create",$data);
    AqsController::addView("Shared/_footer");
});

Routes::addPage("faq_update", function() {
  Routes::setAdminSession(true);
  $err_msg = "";
  $data = array();
  if(!empty(Routes::url_segment(2))){
    $id = Routes::url_segment(2); //get id
    $results = AqsController::findById($id);
    foreach($results as $item) {
      $data['question'] = $item->question;
      $data['answer'] = $item->answer;
      $data['author'] = $item->author;
      $data['category'] = $item->category;
    }
  }else{
    $data = array("question" => "",
                  "answer" => "",
                  "author" => "",
                  "err_msg" => $err_msg);
  }

  if(isset($_POST['btnSubmit'])) {

    $data['question'] = $_POST['question'];
    $data['answer'] = $_POST['answer'];
    $data['author'] = $_POST['author'];
    $data['category'] = $_POST['faq_categories'];
    $data['date_created'] = date("Y-m-d");
    if(empty($data['author'])){
      $err_msg = "Please identify author of posting!";
    }else if(empty($data['question'])) {
      $err_msg = "Question is required!";
    }else if(empty($data['answer'])) {
      $err_msg = "Answer is required!";
    }else{
        $count = AqsController::editFAQ($id, $data['category'], $data['question'], $data['answer'], $data['date_created'],$data['author']);
        if($count <= 0){
          $err_msg = "Cannot update this question. Please try again!";
        }else{
          header("Location: ".Routes::getBaseUrl()."faq_admin");
        }
    }
  }
  $data['err_msg'] = $err_msg;
  AqsController::addView("Shared/_header");
  AqsController::addView("Shared/_navigation");
  AqsController::addView("admin/faqs/update",$data);
  AqsController::addView("Shared/_footer");
});

Routes::addPage("faq_delete", function() {
  Routes::setAdminSession(true);
    $err_msg = "";
    $data = array();
    if(!empty(Routes::url_segment(2))){
      $id = Routes::url_segment(2); //get id
      $count = AqsController::deleteFAQ($id);
      if($count <= 0){
        $data['err_msg'] = "Unable to delete this question. Please try again!";
      }else{
        $data['err_msg'] = "FAQ has been deleted!";
      }
    }else{
        $data['err_msg'] = "";
    }
    AqsController::addView("Shared/_header");
    AqsController::addView("Shared/_navigation");
    AqsController::addView("admin/faqs/delete",$data);
    AqsController::addView("Shared/_footer");
});


?>
