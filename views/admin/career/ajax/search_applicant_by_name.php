<?php
  $results = AqsController::$viewBag;
  if(count($results) <= 0){
    echo "No result found. Please try another question!";
  }else{
    foreach($results as $item){
      echo "<tr>
      <td>".$item->full_name."</td>";

      foreach(AqsController::findJobByID($item->career_fk_id) as $item1){
        echo "<td>".$item1->job_title."</td>";
      }


      echo "<td>".$item->email."</td>
      <td><a href='".$item->resume_url."'>Watch</a></td>
      <td>
      <a href='".Routes::getBaseUrl()."applicant_view/".$item->id."' class='btn btn-primary'>View</a>
      </td>
      </tr>";
    }
  }
?>
