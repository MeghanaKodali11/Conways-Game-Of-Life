<?php
session_start();
if(!isset($_SESSION['login_user'])){
header("location: ../LoginForm.php");
}

   
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
$score= 'DELETE FROM login_ids WHERE username ="'.$_GET['id'].'"';
$result = $conn->query($score);
header("Location:index.php");



$conn->close();
  ?>