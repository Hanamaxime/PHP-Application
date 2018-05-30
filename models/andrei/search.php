<?php
/**
 * Created by PhpStorm.
 * User: tyzia
 * Date: 4/17/18
 * Time: 4:06 PM
 */

class Search extends PDO_DB
{
    public static function searchByTable($term, $db_table) {
        try {
            // sanitize $term
            $term = preg_replace('~[\x00\x0A\x0D\x1A\x22\x25\x27\x5C\x5F]~u', '\\\$0', $term);
            // based on table name we change column, where we search
            $column = '';
            switch ($db_table) {
                case 'polls' :
                    $column = 'poll_description';
                    break;
                case 'events' :
                    $column = 'event_description';
                    break;
                case 'careers' :
                    $column = 'job_title';
                    break;
                case 'faqs' :
                    $column = 'question';
                    break;
                case 'feedback' :
                    $column = 'message';
                    break;
                case 'giftshop_stores' :
                    $column = 'product_desc';
                    break;
                case 'users' :
                    $column = 'user_login';
                    break;
            }
            $sql = "SELECT * FROM $db_table WHERE $column LIKE '%" . $term . "%'";
            $db = self::connectDB();
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            return $pdostm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}