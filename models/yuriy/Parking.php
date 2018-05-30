<?php

class Parking extends PDO_DB {
    public static function buyParking($id, $licence_plate, $date_of_visit, $vehicle_type, $email, $charged) {
        try {
            $conn = PDO_DB::connectDB();
            $conn->query("SET NAMES utf8");
            $cmd = $conn->prepare("INSERT INTO parking (id, licence_plate, date_of_visit, vehicle_type, email, charged)
                VALUES (:id, :licence_plate, :date_of_visit, :vehicle_type, :email, :charged)");
            $cmd->bindValue(':id', $id, PDO::PARAM_STR);
            $cmd->bindValue(':licence_plate', $licence_plate, PDO::PARAM_STR);
            $cmd->bindValue(':date_of_visit', $date_of_visit, PDO::PARAM_STR);
            $cmd->bindValue(':vehicle_type', $vehicle_type, PDO::PARAM_STR);
            $cmd->bindValue(':email', $email, PDO::PARAM_STR);
            $cmd->bindValue(':charged', $charged, PDO::PARAM_INT);
            $cmd->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    public static function getAllParking() {
        try {
            $sql = "SELECT * FROM parking";
            $db = self::connectDB();
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getParkingById($id) {
        try {
            $db = self::connectDB();
            $sql = "SELECT * FROM parking WHERE id = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public static function updParking($licence_plate, $date_of_visit, $vehicle_type, $email, $charged, $id) {
        try {
            $db = self::connectDB();
            $sql = "UPDATE parking SET 
                    licence_plate = :licence_plate
                    , date_of_visit = :date_of_visit
                    , vehicle_type = :vehicle_type
                    , email = :email
                    , charged = :charged 
                    WHERE id = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':licence_plate', $licence_plate, PDO::PARAM_STR);
            $pdostm->bindValue(':date_of_visit', $date_of_visit, PDO::PARAM_STR);
            $pdostm->bindValue(':vehicle_type', $vehicle_type, PDO::PARAM_STR);
            $pdostm->bindValue(':email', $email, PDO::PARAM_STR);
            $pdostm->bindValue(':charged', $charged, PDO::PARAM_INT);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public static function delParking($id) {
        try {
            $db = self::connectDB();
            $sql = "DELETE FROM parking WHERE id = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}


