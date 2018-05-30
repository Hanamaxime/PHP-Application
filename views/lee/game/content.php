
<div class="canvas">
    <h1>Whack a Mole</h1>
    <div>
      <span class="score">0/</span>
      <span class="highscore"></span>
    </div>
    <button class="btn btn-success btnStart" onclick="startGame()" ><i class="fas fa-play"></i></button>
    <button class="btn btn-danger btnStop" onclick="stopGame()" ><i class="fas fa-save"></i></button>
    <button class="btn btn-info btnScore" data-toggle="modal" data-target="#scoreBoard"><i class="fas fa-trophy"></i></button>
    <div class="game">
      <div class="block">
        <div class="mole"></div>
        <div class="hole"></div>
      </div>
      <div class="block">
        <div class="mole"></div>
        <div class="hole"></div>
      </div>
      <div class="block">
        <div class="mole"></div>
        <div class="hole"></div>
      </div>
      <div class="block">
        <div class="mole"></div>
        <div class="hole"></div>

      </div>
      <div class="block">
        <div class="mole"></div>
        <div class="hole"></div>
      </div>
      <div class="block">
        <div class="mole"></div>
        <div class="hole"></div>
      </div>
      <div class="block">
        <div class="mole"></div>
        <div class="hole"></div>
      </div>
      <div class="block">
        <div class="mole"></div>
        <div class="hole"></div>
      </div>
    </div>

</div>

<!-- ACHIEVEMENT BOARD MODAL -->
<div class="modal fade" id="scoreBoard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">TOP HIGHEST SCORE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="results">loading...</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- WELCOME BOARD MODAL -->
<div class="modal fade" id="welcomeBoard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">SYS MESSAGE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1>Instruction</h1>
        <p>
          - Please enter a new username or your existing username and select level to play.<br>
          - Score requires to win the contest in Easy mode is 100 and 1000 in Hard core mode.<br>
          Good Luck and Have Fun!
        </p>
        <form action="#" method="post">
          <div class="form-group">
            <label for="user_name">User name</label>
            <input class="form-control" type="text" name="user_name" id="user_name" value="" placeholder="Enter a new or your existing username.."/>
          </div>
          <div class="form-group">
            <label for="user_name">Game Level</label>
            <select class="form-control" name="game_level" id="game_level">
              <option value="Easy">Easy</option>
              <option value="Hard">Hard</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSubmit" class="btn btn-success" data-dismiss="modal">Let's play</button>
      </div>
    </div>
  </div>
</div>

<script src="./js/core.js?v=1.2"></script>

<script>
$(function() {

  $("#welcomeBoard").modal('show');

  $('.btnStop').on('click', function() { //save btn
    $.ajax({
      method: 'post',
      url: 'ajax_addscore',
      data: {username: username, score: score, game_level: level},
      success: function(data) {
          alert(data);
      }
    });
  });

  $('.btnScore').on('click', function() { //achievement btn
    $.ajax({
      method: 'get',
      url: 'ajax_loadscore',
      success: function(data) {
        $('.results').html(data);
      }
    });
  });

});

</script>
