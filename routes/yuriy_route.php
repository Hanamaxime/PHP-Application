<?php

Routes::addPage("contact", function() { //Contact Page
    $data['errMsg'] = "";
    $data['name'] = "";
    $data['email'] = "";
    $data['phone'] = "";
    $data['subject'] = "";
    $data['message'] = "";

    if (isset($_POST['SUBMIT'])) {
        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['subject'] = $_POST['subject'];
        $data['message'] = $_POST['message'];


         if(empty($data['name'])) {
          $data['errMsg'] = "Please enter your name";
        }else if(Validation::testFormat($_POST['name'], 'name') == false) {
          $data['errMsg'] = "Your name cannot contain numbers";
        }else if(empty($data['email'])){
          $data['errMsg'] = "Please enter your email address";
        }else if(Validation::testFormat($_POST['email'], 'email') == false) {
          $data['errMsg'] = "Please enter valid email address";
        }else if(empty($data['phone'])){
          $data['errMsg'] = "Please enter your phone number";
        }else if(Validation::testFormat($_POST['phone'], 'phone') == false) {
          $data['errMsg'] = "Please enter valid phone number";
        }else if(empty($data['subject'])){
          $data['errMsg'] = "Please enter your subject";
        }else if(empty($data['message'])){
          $data['errMsg'] = "Please enter your message";
        }else {

             $count = YuriyController::addContact($data['name'], $data['email'], $data['phone'], $data['subject'], $data['message']);


             if($count <= 0){
                 $data['errMsg'] = "Failed to save in DB";
             }else{
                 $data['errMsg'] = "Form is submited. Thanks for your feedback";
                 $data['name'] = "";
                 $data['email'] = "";
                 $data['phone'] = "";
                 $data['subject'] = "";
                 $data['message'] = "";
             }

         }

    }

    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("yuriy/contact/content",$data);
    YuriyController::addView("Shared/_footer");
});

Routes::addPage("parking", function() { //Parking purchase Page

    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("yuriy/parking/content");
    YuriyController::addView("Shared/_footer");
});


Routes::addPage("charge", function() { //Parking purchase Page

    $data = "";

    if(empty($_POST['type'])){
    echo "<div class='container'><div class='row'><img src='https://http.cat/404' /></div></div>";
} else {
        require_once './views/yuriy/parking/config.php';
        require_once './models/PDO_DB.php';


        $token = $_POST['stripeToken'];
        $email = $_POST['stripeEmail'];
        $amount = $_POST['type'];

        $customer = \Stripe\Customer::create(array(
            'email' => $email,
            'source' => $token
        ));

        $charge = \Stripe\Charge::create(array(
            'customer' => $customer->id,
            'amount' => $amount,
            'currency' => 'cad',
            "metadata" => array("date_of_visit" => $_POST['date'],
                "plate" => $_POST['plate'])
        ));

        if ($amount == 500) {
            $vehicle = 'Bicycle';
            $amnt = 5;
        } else if ($amount == 1000) {
            $vehicle = 'Motorcycle';
            $amnt = 10;
        } else if ($amount == 2000) {
            $vehicle = 'Car';
            $amnt = 20;
        } else if ($amount == 3000) {
            $vehicle = 'SUV';
            $amnt = 30;
        } else if ($amount == 5000) {
            $vehicle = 'BUS/RV';
            $amnt = 50;
        }

        $db = array(
            'id' => $charge->id,
            'licence_plate' => $_POST['plate'],
            'date_of_visit' => $_POST['date'],
            'vehicle_type' => $vehicle,
            'email' => $email,
            'charged' => $amnt
        );

        $count = YuriyController::buyParking($db['id'], $db['licence_plate'], $db['date_of_visit'], $db['vehicle_type'], $db['email'], $db['charged']);
        $data = $count;
    }
    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("yuriy/parking/charge", $data);
    YuriyController::addView("Shared/_footer");
});

Routes::addPage("vip", function() { //Vip tour purchase Page

    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("yuriy/vip/content");
    YuriyController::addView("Shared/_footer");
});

Routes::addPage("pay", function() { //Vip tour purchase Page


    $data = "";

    if(empty($_POST['name'])){
        echo "<div class='container'><div class='row'><img src='https://http.cat/404' /></div></div>";
    } else {
        require_once './views/yuriy/vip/config.php';
        require_once './models/PDO_DB.php';


        $token = $_POST['stripeToken'];
        $email = $_POST['stripeEmail'];

        $customer = \Stripe\Customer::create(array(
            'email' => $email,
            'source' => $token
        ));

        $charge = \Stripe\Charge::create(array(
            'customer' => $customer->id,
            'amount' => 35000,
            'currency' => 'cad',
            "metadata" => array("date_of_visit" => $_POST['date'],
                "phone" => $_POST['phone'], "name" => $_POST['name'])
        ));


        $db = array(
            'id' => $charge->id,
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'date_of_visit' => $_POST['date'],
            'email' => $email,
            'charged' => 350.00
        );

        $count = YuriyController::buyVipPass($db['id'], $db['name'],$db['email'], $db['phone'], $db['date_of_visit'], $db['charged']);
        $data = $count;
    }


    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("yuriy/vip/pay", $data);
    YuriyController::addView("Shared/_footer");
});

Routes::addPage("contact_admin", function() {
    Routes::setAdminSession(true);

    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("admin/contact/show");
    YuriyController::addView("Shared/_footer");
});


Routes::addPage("contact_update", function() {
    Routes::setAdminSession(true);
    $err_msg = "";
    $data = array();
    if (!empty(Routes::url_segment(2))) {
        $id = Routes::url_segment(2);

        $item = YuriyController::showContactById($id);

        $data['id'] = $item->id;
        $data['name'] = $item->name;
        $data['email'] = $item->email;
        $data['phone'] = $item->phone;
        $data['subject'] = $item->subject;
        $data['message'] = $item->message;
    } else {
        $data = array(
            "id" => ""
        , "name" => ""
        , "email" => ""
        , "phone" => ""
        , "subject" => ""
        , "message" => ""
        , "err_msg" => $err_msg
        );
    }

    if (isset($_POST['btnSubmit'])) {

        $data['id'] = $_POST['id'];
        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['subject'] = $_POST['subject'];
        $data['message'] = $_POST['message'];

        // add validation here

        $count = YuriyController::updateContacts(
            $data['name']
            , $data['email']
            , $data['phone']
            , $data['subject']
            , $data['message']
            , $data['id']
        );
        if ($count <= 0) {
            $err_msg = "Cannot update this contact. Please try again!";
        } else {
            header("Location: " . Routes::getBaseUrl() . "contact_admin");
        }
        //}
    }
    $data['err_msg'] = $err_msg;
    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("admin/contact/update", $data);
    YuriyController::addView("Shared/_footer");
});

Routes::addPage("contact_delete", function() {
    Routes::setAdminSession(true);
    $err_msg = "";
    $data = array();
    if (!empty(Routes::url_segment(2))) {
        $id = Routes::url_segment(2);

        $count = YuriyController::delCont($id);
        if ($count <= 0) {
            $data['err_msg'] = "Unable to delete this contact. Please try again!";
        } else {
            $data['err_msg'] = "Contact deleted successfully!";
        }
    } else {
        $data['err_msg'] = "";
    }
    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("admin/contact/delete", $data);
    YuriyController::addView("Shared/_footer");
});



Routes::addPage("parking_admin", function() {
    Routes::setAdminSession(true);

    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("admin/parking/show");
    YuriyController::addView("Shared/_footer");
});


Routes::addPage("parking_update", function() {
    Routes::setAdminSession(true);
    $err_msg = "";
    $data = array();
    if (!empty(Routes::url_segment(2))) {
        $id = Routes::url_segment(2);

        $item = YuriyController::showParkingById($id);

        $data['id'] = $item->id;
        $data['licence_plate'] = $item->licence_plate;
        $data['date_of_visit'] = $item->date_of_visit;
        $data['vehicle_type'] = $item->vehicle_type;
        $data['email'] = $item->email;
        $data['charged'] = $item->charged;
    } else {
        $data = array(
            "id" => ""
        , "license_plate" => ""
        , "date_of_visit" => ""
        , "vehicle_type" => ""
        , "email" => ""
        , "charged" => ""
        , "err_msg" => $err_msg
        );
    }

    if (isset($_POST['btnSubmit'])) {

        $data['id'] = $_POST['id'];
        $data['licence_plate'] = $_POST['licence_plate'];
        $data['date_of_visit'] = $_POST['date_of_visit'];
        $data['vehicle_type'] = $_POST['vehicle_type'];
        $data['email'] = $_POST['email'];
        $data['charged'] = $_POST['charged'];

        // add validation here

        $count = YuriyController::updateParking(
            $data['licence_plate']
            , $data['date_of_visit']
            , $data['vehicle_type']
            , $data['email']
            , $data['charged']
            , $data['id']
        );
        if ($count <= 0) {
            $err_msg = "Cannot update this parking info. Please try again!";
        } else {
            header("Location: " . Routes::getBaseUrl() . "parking_admin");
        }
        //}
    }
    $data['err_msg'] = $err_msg;
    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("admin/parking/update", $data);
    YuriyController::addView("Shared/_footer");
});

Routes::addPage("parking_delete", function() {
    Routes::setAdminSession(true);
    $err_msg = "";
    $data = array();
    if (!empty(Routes::url_segment(2))) {
        $id = Routes::url_segment(2);

        $count = YuriyController::delParking($id);
        if ($count <= 0) {
            $data['err_msg'] = "Unable to delete this parking info. Please try again!";
        } else {
            $data['err_msg'] = "Parking info deleted successfully!";
        }
    } else {
        $data['err_msg'] = "";
    }
    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("admin/parking/delete", $data);
    YuriyController::addView("Shared/_footer");
});



////VIP Admin page route/////


Routes::addPage("vip_admin", function() {
    Routes::setAdminSession(true);

    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("admin/vip/show");
    YuriyController::addView("Shared/_footer");
});


Routes::addPage("vip_update", function() {
    Routes::setAdminSession(true);
    $err_msg = "";
    $data = array();
    if (!empty(Routes::url_segment(2))) {
        $id = Routes::url_segment(2);

        $item = YuriyController::showVipById($id);

        $data['id'] = $item->id;
        $data['name'] = $item->name;
        $data['email'] = $item->email;
        $data['phone'] = $item->phone;
        $data['date_of_visit'] = $item->date_of_visit;
        $data['charged'] = $item->charged;
    } else {
        $data = array(
            "id" => ""
        , "name" => ""
        , "email" => ""
        , "phone" => ""
        , "date_of_visit" => ""
        , "charged" => ""
        , "err_msg" => $err_msg
        );
    }

    if (isset($_POST['btnSubmit'])) {

        $data['id'] = $_POST['id'];
        $data['name'] = $_POST['name'];
        $data['date_of_visit'] = $_POST['date_of_visit'];
        $data['phone'] = $_POST['phone'];
        $data['email'] = $_POST['email'];
        $data['charged'] = $_POST['charged'];

        // add validation here

        $count = YuriyController::updateVip(
            $data['name']
            , $data['phone']
            , $data['email']
            , $data['date_of_visit']
            , $data['charged']
            , $data['id']
        );
        if ($count <= 0) {
            $err_msg = "Cannot update this vip tour info. Please try again!";
        } else {
            header("Location: " . Routes::getBaseUrl() . "vip_admin");
        }
        //}
    }
    $data['err_msg'] = $err_msg;
    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("admin/vip/update", $data);
    YuriyController::addView("Shared/_footer");
});

Routes::addPage("vip_delete", function() {
    Routes::setAdminSession(true);
    $err_msg = "";
    $data = array();
    if (!empty(Routes::url_segment(2))) {
        $id = Routes::url_segment(2);

        $count = YuriyController::delVip($id);
        if ($count <= 0) {
            $data['err_msg'] = "Unable to delete this Vip tour info. Please try again!";
        } else {
            $data['err_msg'] = "Vip tour info deleted successfully!";
        }
    } else {
        $data['err_msg'] = "";
    }
    YuriyController::addView("Shared/_header");
    YuriyController::addView("Shared/_navigation");
    YuriyController::addView("admin/vip/delete", $data);
    YuriyController::addView("Shared/_footer");
});


?>
