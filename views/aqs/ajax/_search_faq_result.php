<?php

$results =  AqsController::$viewBag;

if(count($results) <= 0){
  echo "No results found.Please try again!";
}else{
  foreach($results as $item) {
    echo " <div class='accordion-item'>
       <a>".$item->question."</a>
       <div class='content'>
         <p>".$item->answer."</p>
       </div>
     </div>";
  }
}
 ?>
