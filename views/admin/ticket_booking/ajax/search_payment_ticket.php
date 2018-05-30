<?php
  $results = LeeController::$viewBag;
  if(count($results) <= 0){
    echo "No result found. Please try another question!";
  }else{
    foreach($results as $item){
      echo "<tr>
      <td>".$item->customer_name."</td>
      <td>".$item->customer_email."</td>
      <td>".$item->customer_phone."</td>
      <td>".$item->date_of_visit."</td>";

      foreach(LeeController::findTicketById($item->ticket_id) as $item1){
        echo "<td>".$item->ticket_title."</td>";
      }

      echo "</tr>";
    }
  }
?>
