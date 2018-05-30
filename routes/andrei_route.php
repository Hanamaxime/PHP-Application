<?php

/* START YOUR ROUTING HERE */
Routes::addPage("events", function() {
    $data = array(
        'events' => AndreiController::showAllEvents()
    );
    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("andrei/events/content", $data);
    AndreiController::addView("Shared/_footer");
});

Routes::addPage("viewEvent", function() {
    $id = Routes::url_segment(2);
    $data = array(
        'event' => AndreiController::showEventById($id)
    );
    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("andrei/viewEvent/content", $data);
    AndreiController::addView("Shared/_footer");
});

Routes::addPage("bookEvent", function() {
    $id = Routes::url_segment(2);
    $data = array(
        'event' => AndreiController::showEventById($id)
    );
    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("andrei/bookEvent/content", $data);
    AndreiController::addView("Shared/_footer");
});

Routes::addPage("polls", function() {
    $data = array(
        'polls' => AndreiController::showAllPolls()
        , 'poll_groups' => AndreiController::showAllPollGroups()
    );
    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("andrei/polls/content", $data);
    AndreiController::addView("Shared/_footer");
});

Routes::addPage("viewPoll", function() {
    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("andrei/viewPoll/content");
    AndreiController::addView("Shared/_footer");
});

Routes::addPage("search", function() {
    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("andrei/search/content");
    AndreiController::addView("Shared/_footer");
});

/*Admin pages*/
/*Admin For events*/
Routes::addPage("events_admin", function() {
    Routes::setAdminSession(true);

    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("admin/events/show");
    AndreiController::addView("Shared/_footer");
});

Routes::addPage("event_update", function() {
    Routes::setAdminSession(true);
    $err_msg = "";
    $data = array();
    if (!empty(Routes::url_segment(2))) {
        $id = Routes::url_segment(2); //get id

        $item = AndreiController::showEventById($id);
        $data['ID'] = $item->ID;
        $data['event_title'] = $item->event_title;
        $data['event_description'] = $item->event_description;
        $data['event_author'] = $item->event_author;
        $data['event_date_start'] = $item->event_date_start;
        $data['event_date_finish'] = $item->event_date_finish;
        $data['event_status'] = $item->event_status;
        $data['event_category'] = $item->event_category;
        $data['event_location'] = $item->event_location;
        $data['event_img'] = $item->event_img;
    } else {
        $data = array(
            "ID" => ""
            , "event_title" => ""
            , "event_description" => ""
            , "event_author" => ""
            , "event_date_start" => ""
            , "event_date_finish" => ""
            , "event_status" => ""
            , "event_category" => ""
            , "event_location" => ""
            , "event_img" => ""
            , "err_msg" => $err_msg
        );
    }

    if (isset($_POST['btnSubmit'])) {

        $data['ID'] = $_POST['id'];
        $data['event_title'] = $_POST['title'];
        $data['event_description'] = $_POST['desc'];
        $data['event_author'] = $_POST['author'];
        $data['event_date_start'] = $_POST['dstart'];
        $data['event_date_finish'] = $_POST['finish'];
        $data['event_status'] = $_POST['status'];
        $data['event_category'] = $_POST['category'];
        $data['event_location'] = $_POST['location'];
        $data['event_img'] = $_POST['event_img'];

        // add validation here

//        if (empty($data['username'])) {
//            $err_msg = "Username is required!";
//        }else if(empty($data['score'])) {
//            $err_msg = "Score is required!";
//        }else{
        $count = AndreiController::updateEvent(
            $data['event_author']
            , $data['event_date_start']
            , $data['event_date_finish']
            , $data['event_title']
            , $data['event_description']
            , $data['event_status']
            , $data['event_category']
            , $data['event_location']
            , $data['ID']
        );
        if ($count <= 0) {
            $err_msg = "Cannot update this event. Please try again!";
        } else {
            header("Location: " . Routes::getBaseUrl() . "events_admin");
        }
        //}
    }
    $data['err_msg'] = $err_msg;
    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("admin/events/update", $data);
    AndreiController::addView("Shared/_footer");
});

Routes::addPage("event_delete", function() {
    Routes::setAdminSession(true);
    $err_msg = "";
    $data = array();
    if (!empty(Routes::url_segment(2))) {
        $id = Routes::url_segment(2); //get id
        $count = AndreiController::delEvent($id);
        if ($count <= 0) {
            $data['err_msg'] = "Unable to delete this event. Please try again!";
        } else {
            $data['err_msg'] = "Event deleted successfully!";
        }
    } else {
        $data['err_msg'] = "";
    }
    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("admin/events/delete", $data);
    AndreiController::addView("Shared/_footer");
});

Routes::addPage("event_add", function() {
    Routes::setAdminSession(true);
    $err_msg = "";
    $data = array(
        "event_title" => ""
        , "event_description" => ""
        , "event_author" => ""
        , "event_date_start" => ""
        , "event_date_finish" => ""
        , "event_status" => ""
        , "event_category" => ""
        , "event_location" => ""
        , "event_img" => ""
        , "err_msg" => $err_msg
    );

    if (isset($_POST['btnSubmit'])) {

        $data['event_author'] = $_POST['author'];
        $data['event_date_start'] = $_POST['dstart'];
        $data['event_date_finish'] = $_POST['finish'];
        $data['event_title'] = $_POST['title'];
        $data['event_description'] = $_POST['desc'];
        $data['event_status'] = $_POST['status'];
        $data['event_category'] = $_POST['category'];
        $data['event_location'] = $_POST['location'];
        $data['event_img'] = $_POST['event_img'];

        // add validation here

        $count = AndreiController::addEvent(
            $data['event_author']
            , $data['event_date_start']
            , $data['event_date_finish']
            , $data['event_title']
            , $data['event_description']
            , $data['event_status']
            , $data['event_category']
            , $data['event_location']
        );
        if ($count <= 0) {
            $err_msg = "Cannot update this event. Please try again!";
        } else {
            header("Location: " . Routes::getBaseUrl() . "events_admin");
        }
        //}
    }
    $data['err_msg'] = $err_msg;
    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("admin/events/create", $data);
    AndreiController::addView("Shared/_footer");
});

/*Admin For Events bookings*/
Routes::addPage("events_book_admin", function() {
    Routes::setAdminSession(true);

    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("admin/events_book/show");
    AndreiController::addView("Shared/_footer");
});

Routes::addPage("event_book_update", function() {
    Routes::setAdminSession(true);
    $err_msg = "";
    $data = array();
    if (!empty(Routes::url_segment(2)) && !empty(Routes::url_segment(3))) {
        $event_id = Routes::url_segment(2);
        $user_id = Routes::url_segment(3);

        $item = AndreiController::showBookingById($event_id, $user_id);
        $data['event_id'] = $item->event_id;
        $data['user_id'] = $item->user_id;
        $data['book_date'] = $item->book_date;
        $data['book_places'] = $item->book_places;
        $data['book_status'] = $item->book_status;
        $data['book_comment'] = $item->book_comment;
        $data['event_title'] = $item->event_title;
        $data['user_login'] = $item->user_login;
    } else {
        $data = array(
            "event_id" => ""
            , "user_id" => ""
            , "book_date" => ""
            , "book_places" => ""
            , "book_status" => ""
            , "book_comment" => ""
            , "event_title" => ""
            , "user_login" => ""
            , "err_msg" => $err_msg
        );
    }

    if (isset($_POST['btnSubmit'])) {

        $data['event_id'] = $_POST['event_id'];
        $data['user_id'] = $_POST['user_id'];
        $data['book_date'] = $_POST['book_date'];
        $data['book_places'] = $_POST['book_places'];
        $data['book_status'] = $_POST['book_status'];
        $data['book_comment'] = $_POST['book_comment'];

        // add validation here

        $count = AndreiController::updBooking(
            $data['event_id']
            , $data['user_id']
            , $data['book_date']
            , $data['book_places']
            , $data['book_status']
            , $data['book_comment']
        );
        if ($count <= 0) {
            $err_msg = "Cannot update this booking. Please try again!";
        } else {
            header("Location: " . Routes::getBaseUrl() . "events_book_admin");
        }
        //}
    }
    $data['err_msg'] = $err_msg;
    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("admin/events_book/update", $data);
    AndreiController::addView("Shared/_footer");
});

Routes::addPage("event_book_add", function() {
    Routes::setAdminSession(true);
    $err_msg = "";
    $data = array(
        "book_date" => ""
        , "book_places" => ""
        , "book_status" => ""
        , "book_comment" => ""
        , "err_msg" => $err_msg
        , "users" => AndreiController::showAllUsers() // array of all users
        , "events" => AndreiController::showAllEvents() // array of all events
    );

    if (isset($_POST['btnSubmit'])) {

        $data['event_id'] = $_POST['event_id'];
        $data['user_id'] = $_POST['user_id'];
        $data['book_date'] = $_POST['book_date'];
        $data['book_places'] = $_POST['book_places'];
        $data['book_status'] = $_POST['book_status'];
        $data['book_comment'] = $_POST['book_comment'];

        // add validation here

        $count = AndreiController::addBooking(
            $data['event_id']
            , $data['user_id']
            , $data['book_date']
            , $data['book_places']
            , $data['book_status']
            , $data['book_comment']
        );
        if ($count <= 0) {
            $err_msg = "Cannot add this booking. Please try again!";
        } else {
            header("Location: " . Routes::getBaseUrl() . "events_book_admin");
        }
        //}
    }
    $data['err_msg'] = $err_msg;
    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("admin/events_book/create", $data);
    AndreiController::addView("Shared/_footer");
});

Routes::addPage("event_book_delete", function() {
    Routes::setAdminSession(true);
    $err_msg = "";
    $data = array();
    if (!empty(Routes::url_segment(2)) && !empty(Routes::url_segment(3))) {
        $event_id = Routes::url_segment(2);
        $user_id = Routes::url_segment(3);
        $count = AndreiController::delBooking($event_id, $user_id);
        if ($count <= 0) {
            $data['err_msg'] = "Unable to delete this booking. Please try again!";
        } else {
            $data['err_msg'] = "Booking deleted successfully!";
        }
    } else {
        $data['err_msg'] = "";
    }
    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("admin/events_book/delete", $data);
    AndreiController::addView("Shared/_footer");
});

/*Admin for Polls page*/
Routes::addPage("polls_admin", function() {
    Routes::setAdminSession(true);

    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("admin/polls/show");
    AndreiController::addView("Shared/_footer");
});

Routes::addPage("polls_update", function() {
    Routes::setAdminSession(true);
    $err_msg = "";
    $data = array();
    if (!empty(Routes::url_segment(2))) {
        $poll_id = Routes::url_segment(2);

        $item = AndreiController::getPollById($poll_id);
        $data['ID'] = $item->ID;
        $data['poll_author'] = $item->poll_author;
        $data['poll_title'] = $item->poll_title;
        $data['poll_description'] = $item->poll_description;
        $data['poll_status'] = $item->poll_status;
        $data['allow_mult'] = $item->allow_mult;
        $data['allow_again'] = $item->allow_again;
        $data['group_id'] = $item->poll_group_id;
    } else {
        $data = array(
            "ID" => ""
            , "poll_author" => ""
            , "poll_title" => ""
            , "poll_description" => ""
            , "poll_status" => ""
            , "allow_mult" => ""
            , "allow_again" => ""
            , "group_id" => ""
            , "err_msg" => $err_msg
        );
    }

    if (isset($_POST['btnSubmit'])) {

        $data['ID'] = $_POST['ID'];
        $data['poll_author'] = $_POST['poll_author'];
        $data['poll_title'] = $_POST['poll_title'];
        $data['poll_description'] = $_POST['poll_description'];
        $data['poll_status'] = $_POST['poll_status'];
        $data['allow_mult'] = $_POST['allow_mult'];
        $data['allow_again'] = $_POST['allow_again'];
        $data['group_id'] = $_POST['group_id'];

        // add validation here

        $count = AndreiController::updatePoll(
            $data['ID']
            , $data['poll_author']
            , $data['poll_title']
            , $data['poll_description']
            , $data['poll_status']
            , $data['allow_mult']
            , $data['allow_again']
            , $data['group_id']
        );
        if ($count <= 0) {
            $err_msg = "Cannot update this poll. Please try again!";
        } else {
            header("Location: " . Routes::getBaseUrl() . "polls_admin");
        }
        //}
    }
    $data['err_msg'] = $err_msg;
    AndreiController::addView("Shared/_header");
    AndreiController::addView("Shared/_navigation");
    AndreiController::addView("admin/polls/update", $data);
    AndreiController::addView("Shared/_footer");
});
 ?>