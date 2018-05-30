<?php
  $results = LeeController::$viewBag;
  if(count($results) <= 0){
    echo "No result found. Please try another question!";
  }else{
    foreach($results as $item){
      echo "<tr>
      <td>".$item->user_name."</td>
      <td>".$item->user_score."</td>
      <td>".$item->played_date."</td>
      <td>".$item->game_level."</td>
      </tr>";
    }
  }
?>
