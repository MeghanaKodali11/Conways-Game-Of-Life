<html>
<head>
  <meta charset="UTF-8">
  <title>Admin Portal </title>
<link rel="stylesheet" type="text/css" href="./admin.css" title="style" />
</head>
<body>
<script type="text/javascript">
  function hidden(id) {
    var uid= id;
  document.getElementById(id).style.display = "block";
}
</script>
<?php 
session_start();
if(!isset($_SESSION['login_user'])){
header("location: ../LoginForm.php");
}
?>
<div class="container">
  
  <div id="header" style="width:100%;" ><div id="header" style="width:67%;" >Welcome to Admin Portal</div>
        <div id="header" style="width:33%; font-size: 27px" ><?php echo($_SESSION['login_user']); ?> 
        <a href="logout.php"><img src="../logout.png" align="right" style="width:35px; height:35px;"/></a>
        </div>
  </div>
  <br><br>
  <h1>User Data Table</h1>
    <table class="table">
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Options</th>
      </tr>

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
$score= "SELECT * FROM login_ids";
$result = $conn->query($score);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
  {
     echo '<tr>';
    echo '<td>'. $row['firstname'].'</td>';
    echo '<td>'. $row['lastname'].'</td>';
    echo '<td>'. $row['username'].'</td>';
    echo '<td>'. $row['password'].'</td>';
    echo '<td> <a href="view.php?id='.$row['username'].'" ><button >View</button></a>
                <a href="editor.php?id='.$row['username'].'" ><button >Edit</button></a>
                <a href="delete.php?id='.$row['username'].'" ><button >Delete</button></a> ';
    
    
  }
  
}
else{
  echo "<script type='text/javascript'>alert('Unable to Display the results')</script>";
}


  ?>



    </table>
 
<h1>Players Score Table</h1>
<table id="table1">
      <tr>
        <th>Username</th>
        <th>Generation</th>
        <th>Population</th>
        <th>Date & Time</th>
      </tr>

      <?php
$score= "SELECT * FROM players ORDER BY id DESC";
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
  echo "<script type='text/javascript'>alert('Unable to Display the results')</script>";
}


$conn->close();
  ?>



    </table>



</body>
</html>