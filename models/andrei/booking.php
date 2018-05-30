<?php

class Booking extends PDO_DB
{
    public static function addBooking($event_id, $user_id, $book_date, $book_places, $book_status, $book_comment) {
        try {
            $db = self::connectDB();
            $sql = "INSERT INTO bookings (event_id, user_id, book_date, book_places, book_status, book_comment) VALUES 
              (:event_id, :user_id, :book_date, :book_places, :book_status, :book_comment)";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':event_id', $event_id, PDO::PARAM_INT);
            $pdostm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $pdostm->bindValue(':book_date', $book_date, PDO::PARAM_STR);
            $pdostm->bindValue(':book_places', $book_places, PDO::PARAM_INT);
            $pdostm->bindValue(':book_status', $book_status, PDO::PARAM_STR);
            $pdostm->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getAllBookings() {
        try {
            $sql = "SELECT * FROM bookings b LEFT OUTER JOIN events e ON b.event_id = e.ID
                      LEFT OUTER JOIN users u ON b.user_id = u.ID";
            $db = self::connectDB();
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getBookingById($event_id, $user_id) {
        try {
            $db = self::connectDB();
            $sql = "SELECT * FROM bookings WHERE event_id = :event_id AND user_id = :user_id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':event_id', $event_id, PDO::PARAM_INT);
            $pdostm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getBookingByIdJoin($event_id, $user_id) {
        try {
            $db = self::connectDB();
            $sql = "SELECT * FROM bookings b LEFT OUTER JOIN events e ON b.event_id = e.ID
                      LEFT OUTER JOIN users u ON b.user_id = u.ID WHERE event_id = :event_id AND user_id = :user_id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':event_id', $event_id, PDO::PARAM_INT);
            $pdostm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function updBooking($event_id, $user_id, $book_date, $book_places, $book_status, $book_comment) {
        try {
            $db = self::connectDB();
            $sql = "UPDATE bookings SET 
                    book_date = :book_date
                    , book_places = :book_places
                    , book_status = :book_status
                    , book_comment = :book_comment 
                    WHERE event_id = :event_id AND user_id = :user_id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':book_date', $book_date, PDO::PARAM_STR);
            $pdostm->bindValue(':book_places', $book_places, PDO::PARAM_INT);
            $pdostm->bindValue(':book_status', $book_status, PDO::PARAM_STR);
            $pdostm->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);
            $pdostm->bindValue(':event_id', $event_id, PDO::PARAM_INT);
            $pdostm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function delBooking($event_id, $user_id) {
        try {
            $db = self::connectDB();
            $sql = "DELETE FROM bookings WHERE event_id = :event_id AND user_id = :user_id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':event_id', $event_id, PDO::PARAM_INT);
            $pdostm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}