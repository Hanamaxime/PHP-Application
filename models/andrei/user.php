<?php

class User extends PDO_DB
{
    public static function getAllUsers() {
        try {
            $db = self::connectDB();
            $sql = "SELECT * FROM users u LEFT OUTER JOIN users_meta m ON u.ID = m.user_id";
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getUserById($db, $id) {
        try {
            $db = self::connectDB();
            $sql = "SELECT * FROM users WHERE ID = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getUserIdByName($login) {
        try {
            $db = self::connectDB();
            $sql = "SELECT * FROM users WHERE user_login = :login";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':login', $login, PDO::PARAM_STR);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function addUser($login, $pass, $email, $role, $registered) {
        try {
            $db = self::connectDB();
            $sql = "INSERT INTO users (user_login, user_pass, user_email, user_registered, user_role) VALUES 
              (:login, :pass, :email, :registered, :role)";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':login', $login, PDO::PARAM_STR);
            $pdostm->bindValue(':pass', $pass, PDO::PARAM_STR);
            $pdostm->bindValue(':email', $email, PDO::PARAM_STR);
            $pdostm->bindValue(':registered', $registered, PDO::PARAM_STR);
            $pdostm->bindValue(':role', $role, PDO::PARAM_STR);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function addUserMeta($id, $key, $value) {
        try {
            $db = self::connectDB();
            $sql = "INSERT INTO users_meta (user_id, meta_key, meta_value) VALUES 
              (:id, :mkey, :mvalue)";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            $pdostm->bindValue(':mkey', $key, PDO::PARAM_STR);
            $pdostm->bindValue(':mvalue', $value, PDO::PARAM_STR);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function updUser($login, $pass, $email, $role, $id, $db) {
        try {
            $db = self::connectDB();
            $sql = "UPDATE users SET user_login = :login, user_pass = :pass, user_email = :email, user_role = :role WHERE ID = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':login', $login, PDO::PARAM_STR);
            $pdostm->bindValue(':pass', $pass, PDO::PARAM_STR);
            $pdostm->bindValue(':email', $email, PDO::PARAM_STR);
            $pdostm->bindValue(':role', $role, PDO::PARAM_STR);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function delUser($id, $db) {
        try {
            $db = self::connectDB();
            $sql = "DELETE FROM users WHERE ID = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}