<?php
/**
 * Created by PhpStorm.
 * User: tyzia
 * Date: 4/12/18
 * Time: 11:27 AM
 */

class Poll extends PDO_DB
{
    public static function getAllPolls() {
        try {
            $sql = "SELECT * FROM polls";
            $db = self::connectDB();
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getAllPollsWithResults() {
        try {
            $sql = "SELECT p.ID AS poll_id, p.*, v.*, u.*, group_title FROM polls p
  LEFT OUTER JOIN (SELECT poll_id, count(poll_id) AS total_votes FROM votes GROUP BY poll_id) v ON p.ID = v.poll_id
  LEFT OUTER JOIN poll_groups g ON p.poll_group_id = g.ID
  LEFT OUTER JOIN users u ON p.poll_author = u.ID";
            $db = self::connectDB();
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getAllPollGroups() {
        try {
            $sql = "SELECT * FROM poll_groups";
            $db = self::connectDB();
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getAllPollsByGroup($group_id) {
        try {
            $sql = "SELECT * FROM polls WHERE poll_group_id = :id";
            $db = self::connectDB();
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':id', $group_id, PDO::PARAM_INT);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getPollResults() {
        try {
            $sql = "SELECT poll_id, count(poll_id) AS total_votes FROM votes GROUP BY poll_id";
            $db = self::connectDB();
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getPollResultsByGroup($group_id) {
        try {
            $sql = "SELECT poll_id, count(poll_id) AS total_votes FROM votes WHERE poll_group_id = :group_id GROUP BY poll_id";
            $db = self::connectDB();
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':group_id', $group_id, PDO::PARAM_INT);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getPollById($id) {
        try {
            $db = self::connectDB();
            $sql = "SELECT * FROM polls WHERE ID = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function addPollResult($poll_id, $poll_group_id, $user_id) {
        try {
            $db = self::connectDB();
            $sql = "INSERT INTO votes (poll_id, poll_group_id, user_id) VALUES (:poll_id, :poll_group_id, :user_id)";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':poll_id', $poll_id, PDO::PARAM_INT);
            $pdostm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $pdostm->bindValue(':poll_group_id', $poll_group_id, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function updPoll($ID, $poll_author, $poll_title, $poll_description, $poll_status, $allow_mult, $allow_again, $group_id) {
        try {
            $db = self::connectDB();
            $sql = "UPDATE polls SET poll_author = :author, poll_title = :title, poll_description = :desc, poll_status = :status, allow_mult = :mult,
              allow_again = :again, poll_group_id = :groupid WHERE ID = :id";
            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':author', $poll_author, PDO::PARAM_INT);
            $pdostm->bindValue(':title', $poll_title, PDO::PARAM_STR);
            $pdostm->bindValue(':desc', $poll_description, PDO::PARAM_STR);
            $pdostm->bindValue(':status', $poll_status, PDO::PARAM_STR);
            $pdostm->bindValue(':mult', $allow_mult, PDO::PARAM_STR);
            $pdostm->bindValue(':again', $allow_again, PDO::PARAM_STR);
            $pdostm->bindValue(':groupid', $group_id, PDO::PARAM_INT);
            $pdostm->bindValue(':id', $ID, PDO::PARAM_INT);
            return $pdostm->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}