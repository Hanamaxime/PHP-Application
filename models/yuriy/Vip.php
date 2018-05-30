<?php

class Vip extends PDO_DB {
    public static function buyVip($id, $name, $email, $phone, $date_of_visit, $charged) {
        try {

            $conn = PDO_DB::connectDB();
            $conn->query("SET NAMES utf8");
            $cmd = $conn->prepare("INSERT INTO vip (id, name, email, phone, date_of_visit, charged)
                VALUES (:id, :name, :email, :phone, :date_of_visit, :charged)");
            $cmd->bindValue(':id', $id, PDO::PARAM_STR);
            $cmd->bindValue(':name', $name, PDO::PARAM_STR);
            $cmd->bindValue(':email', $email, PDO::PARAM_STR);
            $cmd->bindValue(':phone', $phone, PDO::PARAM_STR);
            $cmd->bindValue(':date_of_visit', $date_of_visit, PDO::PARAM_STR);
            $cmd->bindValue(':charged', $charged, PDO::PARAM_INT);
            $cmd->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    public static function getAllVip() {
        try {
            $sql = "SELECT * FROM vip";
            $db = self::connectDB();
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getVipById($id) {
        try {
            $db = self::connectDB();
            $sql = "SELECT * FROM vip WHERE id = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public static function updVip($name, $email, $phone, $date_of_visit, $charged, $id) {
        try {
            $db = self::connectDB();
            $sql = "UPDATE vip SET 
                    name = :name
                    , email = :email
                    , phone = :phone
                    , date_of_visit = :date_of_visit
                    , charged = :charged 
                    WHERE id = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':name', $name, PDO::PARAM_STR);
            $pdostm->bindValue(':email', $email, PDO::PARAM_STR);
            $pdostm->bindValue(':phone', $phone, PDO::PARAM_STR);
            $pdostm->bindValue(':date_of_visit', $date_of_visit, PDO::PARAM_STR);
            $pdostm->bindValue(':charged', $charged, PDO::PARAM_INT);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public static function delVip($id) {
        try {
            $db = self::connectDB();
            $sql = "DELETE FROM vip WHERE id = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}


