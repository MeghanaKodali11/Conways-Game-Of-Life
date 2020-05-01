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
$score= 'UPDATE login_ids SET firstname ="'.$_POST["newfname"].'", lastname = "'.$_POST["newlname"].'" WHERE username="'.$_POST["uname"].'"';
/*$result = $conn->query($score);*/
if ($conn->query($score) == TRUE) 
{
    echo "<script type='text/javascript'>alert('Registration Successfull!')</script>"; 
    header("Location:index.php");
}
else 
{
    echo "<script type='text/javascript'>alert('Connection Failed: '". $conn->error.")</script>"; ;
}
header("Location:index.php");


$conn->close();
  ?>