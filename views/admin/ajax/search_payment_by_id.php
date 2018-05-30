<?php
  $results = HomeController::$viewBag;

  if(count($results) <= 0) {
    echo "No payment found. Please try again!";
  }else{
    foreach($results as $item){
      echo "<tr>
      <td>".$item->payment_id."</td>
      <td>".$item->product_name."</td>
      <td>".$item->product_price."</td>
      <td>".$item->payment_from_page."</td>
      <td>".$item->customer_name."</td>
      <td>
      <a href='".Routes::getBaseUrl()."payment_view/".$item->id."' class='btn btn-primary'>View</a>
      </td>
      </tr>";
    }
  }

?>
