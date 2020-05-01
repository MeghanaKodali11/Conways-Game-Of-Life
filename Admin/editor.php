<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="./admin.css" title="style" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 60%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  color: black;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container1 {
  border-radius: 5px;
  width: 50%;
  margin: auto;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 70%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>
<?php 
session_start();
if(!isset($_SESSION['login_user'])){
header("location: ../LoginForm.php");
}
?>
<h2>Update User Details</h2>
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
$score= 'SELECT * FROM login_ids WHERE username ="'.$_GET['id'].'"';
$result = $conn->query($score);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
  {
    $fname= $row['firstname'];
    $lname=$row['lastname'];
    $uname=$_GET['id'];
    $pass= $row['password'];
    
    
  }
  
}
else{
  echo "<script type='text/javascript'>alert('Unable to Display the results')</script>";
}


  ?>


<div class="container1">
  <form method="post" action="edit.php">
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" disabled value=<?php echo $fname; ?> >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">New First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="newfname" name="newfname" placeholder="New First Name">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lastname" disabled value=<?php echo $lname; ?> >
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">New Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="newlname" name="newlname" placeholder="New Last Name">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Username</label>
      </div>
      <div class="col-75">
        <input type="text" id="uname1" name="uname1" value=<?php echo $uname; ?> disabled>
        <input style="display: none" type="text" id="uname" name="uname" value=<?php echo $uname; ?> >
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">password</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lastname" value=<?php echo $pass; ?> disabled>
      </div>
    </div>
    <div class="row">
      <input style="margin: auto; float: none;" type="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>
