<div class="container-fluid">
  <h1 class="admin_h1">Game Log Management</h1>
  <hr>
  <div class="row">
    <div class="col-lg-3 col-md-3">
      <?php LeeController::addView("Shared/_admin_navigation"); ?>
    </div>
  <div class="col-lg-9 col-md-9">
    <div>
      <form action="#" method="post" role="search" id="game-search-frm" class="search-form">
                       <input type="submit" value="" id="btn-submit" class="search-submit">
                       <input type="search" name="search" id="search" class="search-text" placeholder="Search by username..." autocomplete="off">
                   </form>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Username</th>
          <th>Score</th>
          <th>Date played</th>
          <th>Game Mode</th>
        </tr>
      </thead>
      <tbody class="game_search_results">
        <?php
          $results = LeeController::displayTopScore();
          foreach($results as $item){
            echo "<tr>
            <td>".$item->user_name."</td>
            <td>".$item->user_score."</td>
            <td>".$item->played_date."</td>
            <td>".$item->game_level."</td>
            </tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
  </div>
</div>

<script>
    $(function () {
                $("#game-search-frm").submit(function (event) {
            var search = $("#search").val();
            if (search == null || search == "") {
                alert("Please enter username to search...");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Routes::getBaseUrl(); ?>search_game_by_admin',
                    data: { search: search },
                    success: function (data) {
                    $(".game_search_results").html(data);
                    }
                    });
                    }
                    event.preventDefault();
                    });
    });
</script>
