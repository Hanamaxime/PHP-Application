<?php
class YuriyController extends CoreController {

    /////PUBLIC PAGES///////

    public static function addContact($name, $email, $phone, $subject, $message) {
        self::loadModel("yuriy/Contact");
        return Contact::addCont($name, $email, $phone, $subject, $message);
    }
    public static function buyParking($id, $licence_plate, $date_of_visit, $vehicle_type, $email, $charged) {
        self::loadModel("yuriy/Parking");
        return Parking::buyParking($id, $licence_plate, $date_of_visit, $vehicle_type, $email, $charged);
    }
    public static function buyVipPass($id, $name, $email, $phone, $date, $charged) {
        self::loadModel("yuriy/Vip");
        return Vip::buyVip($id, $name, $email, $phone, $date, $charged);
    }

    /////ADMIN PAGES///////



    public static function showAllContacts() {
        self::loadModel("yuriy/Contact");
        return Contact::getAllContacts();
    }
    public static function showContactById($id) {
        self::loadModel("yuriy/Contact");
        return Contact::getContactById($id);
    }
    public static function updateContacts($name, $email, $phone, $subject, $message, $id) {
        self::loadModel("yuriy/Contact");
        return Contact::updContacts($name, $email, $phone, $subject, $message, $id);
    }
    public static function delCont($id) {
        self::loadModel("yuriy/Contact");
        return Contact::delContact($id);
    }


    public static function showAllParking() {
        self::loadModel("yuriy/Parking");
        return Parking::getAllParking();
    }
    public static function showParkingById($id) {
        self::loadModel("yuriy/Parking");
        return Parking::getParkingById($id);
    }
    public static function updateParking($licence_plate, $date_of_visit, $vehicle_type, $email, $charged, $id) {
        self::loadModel("yuriy/Parking");
        return Parking::updParking($licence_plate, $date_of_visit, $vehicle_type, $email, $charged, $id);
    }
    public static function delParking($id) {
        self::loadModel("yuriy/Parking");
        return Parking::delParking($id);
    }

    public static function showAllVip() {
        self::loadModel("yuriy/Vip");
        return Vip::getAllVip();
    }
    public static function showVipById($id) {
        self::loadModel("yuriy/Vip");
        return Vip::getVipById($id);
    }
    public static function updateVip($name, $email, $phone, $date_of_visit, $charged, $id) {
        self::loadModel("yuriy/Vip");
        return Vip::updVip($name, $email, $phone, $date_of_visit, $charged, $id);
    }
    public static function delVip($id) {
        self::loadModel("yuriy/Vip");
        return Vip::delVip($id);
    }
}

?>
