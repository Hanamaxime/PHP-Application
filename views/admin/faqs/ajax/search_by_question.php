<?php
  $results = AqsController::$viewBag;
  if(count($results) <= 0){
    echo "No result found. Please try another question!";
  }else{
    foreach($results as $item){
      echo "<tr>
      <td>".$item->question."</td>
      <td>".$item->category."</td>
      <td>".$item->date_created."</td>
      <td>".$item->author."</td>
      <td>
      <a href='".Routes::getBaseUrl()."faq_update/".$item->id."' class='btn btn-primary'>Update</a>
      <a href='".Routes::getBaseUrl()."faq_delete/".$item->id."' class='btn btn-danger'>Delete</a>
      </td>
      </tr>";
    }
  }
?>
