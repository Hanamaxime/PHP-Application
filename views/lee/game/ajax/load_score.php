<table class="table table-striped">
  <thead>
    <tr>
      <th>User Name</th>
      <th>Score</th>
      <th>Last Updated</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach(LeeController::$viewBag['top_score'] as $item) {
    echo "<tr>
    <td>".$item->user_name."</td>
    <td>".$item->user_score."</td>
    <td>".$item->played_date."</td>
    </tr>";
}
 ?>

</tbody>
 </table>
