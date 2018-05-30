/*
 Whack A Mole game
 Coded By LILCASOFT
 http://lilcasoft.info
*/

  let username = "";
  let level = "";
  //Initialize all game variable
  const holes = document.querySelectorAll('.block');
  const scoreBoard = document.querySelector('.score');
  const highScoreBoard = document.querySelector('.highscore');

  if(localStorage.getItem("highscore") === null || localStorage.getItem("highscore") === ""){
    highScoreBoard.textContent = 0
  }else{
    highScoreBoard.textContent = localStorage.getItem("highscore");
  }
  const moles = document.querySelectorAll('.mole');
  const btnStart = document.querySelector('.btnStart');
  const btnStop = document.querySelector('.btnStop');
  btnStop.disabled = true;
  btnStop.style.backgroundColor = "grey";

  var audio = new Audio('../sound/punch.wav');
  let lastHole;
  let timeUp = false;
  let score = 0;
  let maxScore = 100; //score to win in hard mode
  let highestScore = 0;

  function randTime(min, max) { //Function to create random appear duration of mole
    return Math.round(Math.random() * (max - min) + min);
  }

  function randHole(holes) { //Pick random hole to appear mole
    const idx = Math.floor(Math.random() * holes.length);
    const hole = holes[idx];
    if(hole === lastHole) { //avoid to pick same hole
      return randHole(holes);
    }
    lastHole = hole;
    return hole;
  }

  function peep() { //Mole peeps up
    const levelEasy = randTime(800,1500);
    const levelHard = randTime(100,1000);
    console.log(level);
    const time = level === "Easy" ? levelEasy : levelHard;
    const hole = randHole(holes);
    maxScore = level === "Easy" ? 1000 : 100;
    if(score >= maxScore){
      alert('You win!');
      timeUp = true;
    }
    hole.classList.add('up');
    setTimeout(() => {
      hole.classList.remove('up');
      if(!timeUp) { peep(); }

    }, time);
  }

  function saveScore() {
    highestScore = localStorage.getItem("highscore");
    if(highestScore === null || highestScore === ""){
      localStorage.setItem("highscore",score);
    }else{
        if (highestScore < score)
        localStorage.setItem("highscore",score);
    }
  }

  function startGame() { //Start up the game
    scoreBoard.textContent = 0 + "/";
    highScoreBoard.textContent = localStorage.getItem("highscore");
    timeUp = false;
    score = 0;
    username = document.querySelector("#user_name").value;
    level = document.querySelector("#game_level").value;
    peep();
    btnStart.disabled = true;
    btnStart.style.backgroundColor = "grey";
    btnStop.style.backgroundColor = "brown";
    btnStop.disabled = false;
  }

  function stopGame() { //Quit the game
    saveScore();
    timeUp = true;
    btnStart.disabled = false;
    btnStop.disabled = true;
    btnStop.style.backgroundColor = "grey";
    btnStart.style.backgroundColor = "brown";
  }

  function bonk(e) { // Handle mole and add score when hit a mole
    if(!e.isTrusted) return;
    audio.play();
    score++;
    this.classList.remove('up');
    scoreBoard.textContent = score + "/";
  }

  moles.forEach(mole => mole.addEventListener('click', bonk)); //add click event on mole
