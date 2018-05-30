<?php
  $results = LeeController::$viewBag;
  if(count($results) <= 0){
    echo "No result found. Please try another question!";
  }else{
    foreach($results as $item){
      echo "<tr>
      <td>".$item->product_name."</td>
      <td><img style='width:20%;' src='".Routes::getBaseUrl().$item->product_thumbnail."' class='img-fluid'/></td>
      <td>$".$item->product_price."</td>
      <td>".$item->product_category."</td>
      <td>
      <a href='".Routes::getBaseUrl()."giftshop_update/".$item->id."' class='btn btn-primary'>Update</a>
      <a href='".Routes::getBaseUrl()."giftshop_delete/".$item->id."/".$item->product_thumbnail."' class='btn btn-danger'>Delete</a>
      </td>
      </tr>";
    }
  }
?>
