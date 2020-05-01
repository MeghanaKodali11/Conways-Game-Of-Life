<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Game of Life </title>
  <link rel="stylesheet" href="style.css">
  <style type="text/css">
    #board {
      line-height: 0;
      white-space: nowrap;
      display: block;
    }

    #header {
      float: left;
      padding-top: 5px;
      padding-bottom: 5px;
        font: 52px Impact, sans-serif;
  text-shadow: 1px 3px 2px rgba(0, 0, 0, 0.3);
  text-align: right;
    }

    input[type=checkbox] {
      display: none;
    }

    label {
      display: inline-block;
      width: 12px;
      height: 12px;
      margin: 1px;
      background-color: #fff;
      border: 1px solid #222;
    }

    label:hover {
      cursor: pointer;
      background-color: #ddd;
    }

    input[type=checkbox]:checked + label {
      background-color: #CC6600;
    }

    input[type=checkbox]:checked + label:active {
      background-color: #fff;
    }

  select{
   -webkit-appearance: none;
  box-sizing: border-box;
  background: linear-gradient(to bottom, #fff 5%, #f6f6f6 100%);
  background-color: #fff;
  border: 1px solid #dcdcdc;
  border-radius: 3px;
  box-shadow: inset 0px 1px 0px 0px #fff;
  margin: 3px 0;
  padding: 6px 16px;
  vertical-align: middle;
  height: 30px; 
  cursor: pointer;
  color: #555;
  font: bold 12px Arial;
  text-shadow: 0px 1px 0px #ffffff;
}
option{
   -webkit-appearance: none;
  box-sizing: border-box;
  background: linear-gradient(to bottom, #fff 5%, #f6f6f6 100%);
  background-color: #fff;
  border: 1px solid #dcdcdc;
  border-radius: 3px;
  box-shadow: inset 0px 1px 0px 0px #fff;
  margin: 5px 2px;
  padding: 4px 18px;
  vertical-align: middle;
  height: 30px; 
  cursor: pointer;
  color: #555;
  font: bold 12px Arial;

  text-shadow: 0px 1px 0px #ffffff;
}
table, td, th {  
  border: 1px solid #ddd;
  text-align: center;
}
table {
  border-collapse: collapse;
  width: 100%;
  margin: auto;
  text-align: center;
  color: black;
}
th {
  background-color: #ffffff;
  
  
}
th, td {
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
tr:nth-child(odd) {background-color: #ffffff;}

#start {
  position: absolute;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.9);
  z-index: 2;
}

#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 15px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
#start:checked~#overlay {
  display: none;
}


#start1 {
  position: absolute;
  display: block;
  width: 100%;
  height: 120%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.9);
  z-index: 2;
}

#text1{
  position: absolute;
  top: 40%;
  left: 50%;
  font-size: 15px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
#instuct {
  text-align: left;
  font-size: 15px; 
}
#start1:checked~#overlay {
  display: none;
}
#text1 button {
  width: 150px;
}
.show {display: block;}
</style>
</head>
<?php 
session_start();
if(!isset($_SESSION['login_user'])){
header("location: LoginForm.php");
}
?>
<body>
  <div id="header" style="width:100%;" ><div id="header" style="width:67%;" >Conway’s Game of Life</div>
        <div id="header" style="width:33%; font-size: 27px" ><?php echo($_SESSION['login_user']); ?> 
        <a href="./logout.php"><img src="logout.png" align="right" style="width:35px; height:35px;"/></a>
        </div>
  </div>
 <!--  <h1>Conway’s Game of Life
  <span padding-left="50px" align="right"></span><a href="./logout.php"><img src="logout.png" align="right" style="width:50px; height:50px;"/></a> </h1>
   -->
   <script>
  function start() {
  document.getElementById("start").style.display = "block";
  <?php $run=TRUE; ?>
}
function start1() {
  document.getElementById("start1").style.display = "none";
  <?php $run=TRUE; ?>
}
</script>
<div id="start1">
    <div id="text1">
      <h1>Welcome to Conway’s Game of Life</h1>
      <h3>How to Play</h3>
      <p id="instuct"><button disabled>Start</button> ----> To Start the Game</p>
      <p id="instuct"><button disabled>Stop</button> ----> To Pause the Game</p>
      <p id="instuct"><button disabled>Step</button> ----> To iterate one step in the Game</p>
      <p id="instuct"><button disabled>23 Steps</button> ----> To iterate 23 steps in the Game</p>
      <p id="instuct"><button disabled>New Board</button> ----> To Start the New Game with Fresh Board</p>
      <p id="instuct"><button disabled>Clear Board</button> ----> To empty the board and select you own patterns</p>
      <p id="instuct"><button disabled>Still life</button> ----> Here no living cells make any movement i.e "STAY STILL"</p>
      <p id="instuct"><button disabled>Gosper Glider Gun</button> ----> Here Guns are repeating patterns which produce a spaceship</p>
      <p id="instuct"><button disabled>Oscillators</button> ----> Oscillators patterns(Blinker,Beacon,Toad,Pulsa) will repeat infinitely</p>
      <p id="instuct"><button disabled>Scoreboard</button> ----> Displays the Scoreboard</p>

      <button onclick="start1()">Go to Game</button>
    </div>
</div>


  <p class="buttons">
    <button id="play" autofocus>Stop</button>
    <button id="next">Step</button>
	<button id="23next">23 Steps</button>
    <button id="new">New Board</button>
    <button id="clear">Clear Board</button>
	
    <input id="speed" type="range" min="0" max="100" value="70" step="1">
	<br>
	<button id="still">Still life</button>
	<button id="gosper">Gosper Glider Gun</button>
	<button id="oscillators">Oscillators</button>
  <button id="scoreboard" onclick="start()">Scoreboard</button>
	
	
     <select id="dropdownSel">
	    <option value="50" >Grid size:50 x 25</option>
		<option value="60" selected >Grid size:60 x 30</option>
		
		
	</select>
	<br>
	<p id="counter">0</p>
	<p id="population">0</p>



  </p>
  <div id="board">

 <?php 
         $generation = $_COOKIE["generation"];
         $population = $_COOKIE["population"];
         $date = date("jS \of F Y h:i:s A");
    ?>

  <?php
        $servername = "localhost";
$username = "pkalipindi1";
$password = "pkalipindi1";
$dbname = "pkalipindi1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   echo "<script type='text/javascript'>alert('Cannot connect to server')</script>"; 
} 

if($_SESSION['New_user']==0)
{
  $sql = "INSERT INTO players (username, d_t,generation,population)
VALUES ('".$_SESSION['login_user']."','".$date."','".$generation."', '".$population."')";
} else {
  $sql = "UPDATE players SET d_t ='".$date."', generation ='".$generation."',population='".$population."' ORDER BY id DESC LIMIT 1";
}

if ($conn->query($sql) === TRUE) 
{
  $_SESSION['New_user']=1;
}
else 
{
    echo "<script type='text/javascript'>alert('Connection Failed: '". $conn->error.")</script>"; ;
}


$conn->close();
  ?>

  </div>

<div id="start">
    <div id="text">
        <h1>Scoreboard</h1>
        <table>
  <tr>
    <th>Player ID</th>
    <th>Generations</th>
    <th>Population</th>
    <th>Date and Time</th>
  </tr>
  <?php
  if ($run==TRUE) {
   
        $servername = "localhost";
$username = "pkalipindi1";
$password = "pkalipindi1";
$dbname = "pkalipindi1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   echo "<script type='text/javascript'>alert('Cannot connect to server')</script>"; 
} 
$score= "SELECT * FROM players ORDER BY id DESC LIMIT 10";
$result = $conn->query($score);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
  {
     echo '<tr>';
    echo '<td>'. $row['username'].'</td>';
    echo '<td>'. $row['generation'].'</td>';
    echo '<td>'. $row['population'].'</td>';
    echo '<td>'. $row['d_t'].'</td>';
    echo '</tr> ';
    
    
  }
  
}
else{
  echo "<script type='text/javascript'>alert('Unable to Display the Scoreboard')</script>";
}


$conn->close();
}
  ?>
  <script type="text/javascript">
  
  function stop() {
  document.getElementById("start").style.display = "none";
  <?php $run=FALSE; ?>
}
</script>
  <script >
  
  function stop1() {
  document.getElementById("start").style.display = "none";
  <?php $run=FALSE; ?>
}
</script>
</table>

  <button onclick="stop1()">Back to Game</button>
      </div>
    </div>







  <div class="info">
    <div class="inner">
      <h2>Rules</h2>
      <ol>
        <li>Any live cell with fewer than two live neighbours dies, as if caused by under-population.</li>
        <li>Any live cell with two or three live neighbours lives on to the next generation.</li>
        <li>Any live cell with more than three live neighbours dies, as if by over-population.</li>
        <li>Any dead cell with exactly three live neighbours becomes a live cell, as if by reproduction.</li>
		
      </ol>
      <a href="https://en.wikipedia.org/wiki/Conway's_Game_of_Life#Rules" target="_blank">Conway's Game of Life — Wikipedia</a>
    </div>
  </div>
 
  <!-- DOM implementation -->
  <script src="dom.js"></script>  
</body>
</html>