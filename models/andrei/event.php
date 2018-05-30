<?php

class Event extends PDO_DB
{
    // This method is better, because it accepts $db
    public static function getAllEvents() {
        try {
            $sql = "SELECT * FROM events e LEFT OUTER JOIN events_meta em on e.ID = em.event_id ORDER BY event_date_start";
            $db = self::connectDB();
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
//            var_dump($pdostm->fetchAll());
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getEventById($id) {
        try {
            $db = self::connectDB();
            $sql = "SELECT * FROM events e LEFT OUTER JOIN events_meta em on e.ID = em.event_id WHERE ID = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    // it's better to pass an object here as a parameteur
    public static function addEvent($author, $start, $finish, $title, $desc, $status, $category, $location) {
        try {
            $db = self::connectDB();
            $sql = "INSERT INTO events (event_author, event_date_start, event_date_finish, event_title, event_description, event_status, event_category, event_location ) VALUES 
              (:author, :dstart, :finish, :title, :desc, :status, :category, :location)";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':author', $author, PDO::PARAM_INT);
            $pdostm->bindValue(':dstart', $start, PDO::PARAM_STR);
            $pdostm->bindValue(':finish', $finish, PDO::PARAM_STR);
            $pdostm->bindValue(':title', $title, PDO::PARAM_STR);
            $pdostm->bindValue(':desc', $desc, PDO::PARAM_STR);
            $pdostm->bindValue(':status', $status, PDO::PARAM_STR);
            $pdostm->bindValue(':category', $category, PDO::PARAM_STR);
            $pdostm->bindValue(':location', $location, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function updEvent($author, $start, $finish, $title, $desc, $status, $category, $location, $id) {
        try {
            $db = self::connectDB();
            $sql = "UPDATE events SET event_author = :author, event_date_start = :dstart, event_date_finish = :finish, event_title = :title, event_description = :desc,
              event_status = :status, event_category = :category, event_location = :location WHERE ID = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':author', $author, PDO::PARAM_INT);
            $pdostm->bindValue(':dstart', $start, PDO::PARAM_STR);
            $pdostm->bindValue(':finish', $finish, PDO::PARAM_STR);
            $pdostm->bindValue(':title', $title, PDO::PARAM_STR);
            $pdostm->bindValue(':desc', $desc, PDO::PARAM_STR);
            $pdostm->bindValue(':status', $status, PDO::PARAM_STR);
            $pdostm->bindValue(':category', $category, PDO::PARAM_STR);
            $pdostm->bindValue(':location', $location, PDO::PARAM_INT);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function delEvent($id) {
        try {
            $db = self::connectDB();
            $sql = "DELETE FROM events WHERE ID = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}