<?php

class Contact extends PDO_DB {
    public static function addCont($name, $email, $phone, $subject, $message) {
        try {
            $conn = self::connectDB();
            $conn->query("SET NAMES utf8");
            $cmd = $conn->prepare("INSERT INTO contact (name, email, phone, subject, message) 
                VALUES (:name, :email, :phone, :subject, :message)");
            $cmd->bindValue(':name', $name, PDO::PARAM_STR);
            $cmd->bindValue(':email', $email, PDO::PARAM_STR);
            $cmd->bindValue(':phone', $phone, PDO::PARAM_STR);
            $cmd->bindValue(':subject', $subject, PDO::PARAM_STR);
            $cmd->bindValue(':message', $message, PDO::PARAM_STR);
            return  $cmd->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    public static function getAllContacts() {
        try {
            $sql = "SELECT * FROM contact";
            $db = self::connectDB();
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getContactById($id) {
        try {
            $db = self::connectDB();
            $sql = "SELECT * FROM contact WHERE id = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public static function updContacts($name, $email, $phone, $subject, $message, $id) {
        try {
            $db = self::connectDB();
            $sql = "UPDATE contact SET 
                    name = :name
                    , email = :email
                    , phone = :phone
                    , subject = :subject
                    , message = :message 
                    WHERE id = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':name', $name, PDO::PARAM_STR);
            $pdostm->bindValue(':email', $email, PDO::PARAM_INT);
            $pdostm->bindValue(':phone', $phone, PDO::PARAM_STR);
            $pdostm->bindValue(':subject', $subject, PDO::PARAM_STR);
            $pdostm->bindValue(':message', $message, PDO::PARAM_STR);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public static function delContact($id) {
        try {
            $db = self::connectDB();
            $sql = "DELETE FROM contact WHERE id = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}


