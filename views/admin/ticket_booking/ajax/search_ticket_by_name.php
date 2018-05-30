<?php
  $results = LeeController::$viewBag;
  if(count($results) <= 0){
    echo "No result found. Please try another question!";
  }else{
    foreach($results as $item){
      echo "<tr>
      <td>".$item->ticket_title."</td>
      <td><img style='width:20%;' src='".Routes::getBaseUrl().$item->ticket_thumbnail."' class='img-fluid'/></td>
      <td>$".$item->ticket_price."</td>
      <td>
      <a href='".Routes::getBaseUrl()."ticket_update/".$item->id."' class='btn btn-primary'>Update</a>
      <a href='".Routes::getBaseUrl()."ticket_delete/".$item->id."/".$item->ticket_thumbnail."' class='btn btn-danger'>Delete</a>
      </td>
      </tr>";
    }
  }
?>
