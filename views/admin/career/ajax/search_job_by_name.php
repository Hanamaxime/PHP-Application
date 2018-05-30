<?php
  $results = LeeController::$viewBag;
  if(count($results) <= 0){
    echo "No result found. Please try another question!";
  }else{
    foreach($results as $item){
      echo "<tr>
      <td>".$item->job_title."</td>
      <td>".$item->job_type."</td>
      <td>".$item->job_expire_date."</td>
      <td>
      <a href='".Routes::getBaseUrl()."career_update/".$item->id."' class='btn btn-primary'>Update</a>
      <a href='".Routes::getBaseUrl()."career_delete/".$item->id."' class='btn btn-danger'>Delete</a>
      </td>
      </tr>";
    }
  }
?>
