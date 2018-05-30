<?php
class Career extends PDO_DB {
  public static function show() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM careers ORDER BY id DESC");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function showApplicants() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM jobs_apply ORDER BY id DESC");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function detail($id) {
    try {
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM careers WHERE id = :i");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':i', $id);
       $cmd->execute();
       return $cmd->fetchAll();
     } catch (PDOException $e) {
       return $e->getMessage();
     }
  }


  public static function search_job_by_name($job_title) {
    try {
      $job_title = "%".$job_title."%";
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM careers WHERE job_title LIKE :j");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':j', $job_title,PDO::PARAM_STR);
       $cmd->execute();
       return $cmd->fetchAll();
     } catch (PDOException $e) {
       return $e->getMessage();
     }
  }


  public static function search_applicant_by_name($applicant_name) {
    try {
      $applicant_name = "%".$applicant_name."%";
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM jobs_apply WHERE full_name LIKE :f");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':f', $applicant_name,PDO::PARAM_STR);
       $cmd->execute();
       return $cmd->fetchAll();
     } catch (PDOException $e) {
       return $e->getMessage();
     }
  }



  public static function applicant_detail($id) {
    try {
       $conn = self::connectDB();
       $conn->query("SET NAMES utf8");
       $cmd = $conn->prepare("SELECT * FROM jobs_apply WHERE id = :i");
       $cmd->setFetchMode(PDO::FETCH_OBJ);
       $cmd->bindParam(':i', $id);
       $cmd->execute();
       return $cmd->fetchAll();
     } catch (PDOException $e) {
       return $e->getMessage();
     }
  }

  public static function saveApplicants($fullname, $address, $phone, $email, $job_from, $start_working_date, $resume_url, $career_fk_id) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("INSERT INTO jobs_apply(full_name, address, phone, email, job_from, start_working_date, resume_url, career_fk_id) VALUES(:f,:a,:p,:e,:j,:s,:r,:c)");
      $cmd->bindParam(':f', $fullname);
      $cmd->bindParam(':a', $address);
      $cmd->bindParam(':p', $phone);
      $cmd->bindParam(':e', $email);
      $cmd->bindParam(':j', $job_from);
      $cmd->bindParam(':s', $start_working_date);
      $cmd->bindParam(':r', $resume_url);
      $cmd->bindParam(':c', $career_fk_id);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function addJob($job_title, $job_type, $job_desc, $job_requirements, $job_benefits, $job_salary, $job_start_date, $job_expire_date) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("INSERT INTO careers(job_title, job_type, job_desc, job_requirements, job_benefits, job_salary, job_start_date, job_expire_date) VALUES(:title,:type,:de,:require,:benefit,:salary,:start,:expire)");
      $cmd->bindParam(':title', $job_title);
      $cmd->bindParam(':type', $job_type);
      $cmd->bindParam(':de', $job_desc);
      $cmd->bindParam(':require', $job_requirements);
      $cmd->bindParam(':benefit', $job_benefits);
      $cmd->bindParam(':salary', $job_salary);
      $cmd->bindParam(':start', $job_start_date);
      $cmd->bindParam(':expire', $job_expire_date);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function updateJob($id,$job_title, $job_type, $job_desc, $job_requirements, $job_benefits, $job_salary, $job_start_date, $job_expire_date) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("UPDATE careers SET job_title = :title, job_type = :type, job_desc = :de, job_requirements = :require, job_benefits = :benefit, job_salary = :salary, job_start_date = :start, job_expire_date = :expire WHERE id = :id");
      $cmd->bindParam(':title', $job_title);
      $cmd->bindParam(':type', $job_type);
      $cmd->bindParam(':de', $job_desc);
      $cmd->bindParam(':require', $job_requirements);
      $cmd->bindParam(':benefit', $job_benefits);
      $cmd->bindParam(':salary', $job_salary);
      $cmd->bindParam(':start', $job_start_date);
      $cmd->bindParam(':expire', $job_expire_date);
      $cmd->bindParam(':id', $id);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function deleteJob($id) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("DELETE FROM careers WHERE id = :id");
      $cmd->bindParam(':id', $id);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }


}
?>
