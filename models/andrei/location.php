<?php


class Location extends PDO_DB
{
    public static function getAllLocations() {
        try {
            $db = self::connectDB();
            $sql = "SELECT * FROM locations";
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getLocationById($db, $id) {
        $sql = "SELECT * FROM locations WHERE ID = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        return $pdostm->fetch();
    }

    public function addLocation($lname, $address, $phone, $db) {
        $sql = "INSERT INTO locations (loc_name, loc_address, loc_phone) VALUES 
          (:lname, :address, :phone)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':lname', $lname, PDO::PARAM_STR);
        $pdostm->bindValue(':address', $address, PDO::PARAM_STR);
        $pdostm->bindValue(':phone', $phone, PDO::PARAM_STR);
        return $pdostm->execute();
    }

    public function updLocation($lname, $address, $phone, $id, $db) {
        $sql = "UPDATE locations SET loc_name = :lname, loc_address = :address, loc_phone = :phone WHERE ID = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':lname', $lname, PDO::PARAM_STR);
        $pdostm->bindValue(':address', $address, PDO::PARAM_STR);
        $pdostm->bindValue(':phone', $phone, PDO::PARAM_STR);
        $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
        return $pdostm->execute();
    }

    public function delLocation($id, $db) {
        $sql = "DELETE FROM locations WHERE ID = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
        return $pdostm->execute();
    }
}