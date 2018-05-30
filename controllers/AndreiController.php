<?php
class AndreiController extends CoreController {
    public static function showAllEvents() {
        self::loadModel("andrei/event");
        return Event::getAllEvents();
    }

    public static function showEventById($id) {
        self::loadModel("andrei/event");
        return Event::getEventById($id);
    }

    public static function updateEvent($author, $start, $finish, $title, $desc, $status, $category, $location, $id) {
        self::loadModel("andrei/event");
        return Event::updEvent($author, $start, $finish, $title, $desc, $status, $category, $location, $id);
    }

    public static function delEvent($id) {
        self::loadModel("andrei/event");
        return Event::delEvent($id);
    }

    public static function addEvent($author, $start, $finish, $title, $desc, $status, $category, $location) {
        self::loadModel("andrei/event");
        return Event::addEvent($author, $start, $finish, $title, $desc, $status, $category, $location);
    }

    public static function addUser($login, $pass, $email, $role, $registered) {
        self::loadModel("andrei/user");
        return User::addUser($login, $pass, $email, $role, $registered);
    }

    public static function showAllUsers() {
        self::loadModel("andrei/user");
        return User::getAllUsers();
    }

    public static function showUserByName($login) {
        self::loadModel("andrei/user");
        return User::getUserIdByName($login);
    }

    public static function addUserMeta($id, $key, $value) {
        self::loadModel("andrei/user");
        return User::addUserMeta($id, $key, $value);
    }

    public static function addBooking($event_id, $user_id, $book_date, $book_places, $book_status, $book_comment) {
        self::loadModel("andrei/booking");
        return Booking::addBooking($event_id, $user_id, $book_date, $book_places, $book_status, $book_comment);
    }

    public static function showAllPolls() {
        self::loadModel("andrei/poll");
        return Poll::getAllPolls();
    }

    public static function showAllPollGroups() {
        self::loadModel("andrei/poll");
        return Poll::getAllPollGroups();
    }

    public static function getPollResults() {
        self::loadModel("andrei/poll");
        return Poll::getPollResults();
    }

    public static function getPollResultsByGroup($group_id) {
        self::loadModel("andrei/poll");
        return Poll::getPollResultsByGroup($group_id);
    }

    public static function getPollById($id) {
        self::loadModel("andrei/poll");
        return Poll::getPollById($id);
    }

    public static function addPollResult($poll_id, $poll_group_id, $user_id) {
        self::loadModel("andrei/poll");
        return Poll::addPollResult($poll_id, $poll_group_id, $user_id);
    }

    public static function showPollsWithResults() {
        self::loadModel("andrei/poll");
        return Poll::getAllPollsWithResults();
    }

    public static function updatePoll($ID, $poll_author, $poll_title, $poll_description, $poll_status, $allow_mult, $allow_again, $group_id) {
        self::loadModel("andrei/poll");
        return Poll::updPoll($ID, $poll_author, $poll_title, $poll_description, $poll_status, $allow_mult, $allow_again, $group_id);
    }

    public static function showAllLocations() {
        self::loadModel("andrei/location");
        return Location::getAllLocations();
    }

    public static function searchByTable($term, $db_table) {
        self::loadModel("andrei/search");
        return Search::searchByTable($term, $db_table);
    }

    public static function showAllBookings() {
        self::loadModel("andrei/booking");
        return Booking::getAllBookings();
    }

    public static function showBookingById($event_id, $user_id) {
        self::loadModel("andrei/booking");
        return Booking::getBookingByIdJoin($event_id, $user_id);
    }

    public static function updBooking($event_id, $user_id, $book_date, $book_places, $book_status, $book_comment) {
        self::loadModel("andrei/booking");
        return Booking::updBooking($event_id, $user_id, $book_date, $book_places, $book_status, $book_comment);
    }

    public static function delBooking($event_id, $user_id) {
        self::loadModel("andrei/booking");
        return Booking::delBooking($event_id, $user_id);
    }
}
?>
