<?php
  $results = AqsController::$viewBag;
  if(count($results) <= 0){
    echo "No result found. Please try another question!";
  }else{
    foreach($results as $item){
      echo "<tr>
      <td>".$item->sender."</td>
      <td>".$item->receiver."</td>
      <td>$".$item->amount."</td>
      <td>".$item->email."</td>
      </tr>";
    }
  }
?>
