<html>
<head>
<title>Game of Life-Registration</title>
<link rel="stylesheet" type="text/css" href="./style1.css" title="style" />
<style>
input[type=text],input[type=password]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}</style>

</head>

<body background="back.jpg" style="margin-top:0px">



<?php
session_start();
if(isset($_SESSION['login_user'])){
header("location: dom.php");
}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

		
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

$fname= test_input($_POST["fname"]);
$lname= test_input($_POST["lname"]);
$uid= test_input($_POST["uid"]);
$pwd_nohash= test_input($_POST["pwd"]);
$error='';

$uppercase = preg_match('@[A-Z]@', $pwd_nohash);
$lowercase = preg_match('@[a-z]@', $pwd_nohash);
$number    = preg_match('@[0-9]@', $pwd_nohash);

if(!$uppercase || !$lowercase || !$number || strlen($pwd_nohash) < 8) {
	   $error = 'Password must conatin least 8 characters, one capital letter, one number & one special character.';
	} else {
$pwd=password_hash($pwd_nohash, PASSWORD_DEFAULT);

$servername = "localhost";
$username = "pkalipindi1";
$password = "pkalipindi1";
$dbname = "pkalipindi1";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
   echo "<script type='text/javascript'>alert('Server Connection is failed')</script>"; 
} 
$Check_sql = "SELECT firstname from login_ids where username=$uid";

if ($conn->query($Check_sql) === TRUE) 
{ $error = "Username already exists";
}
else{

$sql = "INSERT INTO login_ids (firstname, lastname, username, password)
VALUES ('".$fname."','".$lname."','".$uid."', '".$pwd."')";


if ($conn->query($sql) === TRUE) 
{
    echo "<script type='text/javascript'>alert('Registration Successfull!')</script>"; 
    header("Location: LoginForm.php");
}
else 
{
    echo "<script type='text/javascript'>alert('Connection Failed: '". $conn->error.")</script>"; ;
}
}
$conn->close();
}
}
?>

<a name= "Register"></a>
<img src="head.png" height="150" width="400" alt=""/>
<h2>User Registration Form</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<br>
		<table align="center" style="
    width: 560px;
    height: 350px;">
			<tr>
				<td style="font-family: cursive; font-weight: bold">First Name :</td>
				<td><input type="text" name="fname" placeholder="Your Firstname.." required></td>
			</tr>
			<br>
			<tr>
				<td style="font-family: cursive; font-weight: bold">Last Name :</td>
				<td><input type="text" name="lname" placeholder="Your Lastname.." required></td>
			</tr>
			<br>
			<tr>
				<td style="font-family: cursive; font-weight: bold">User ID :</td>
				<td><input type="text" name="uid" placeholder="Your UserID.." required></td>
			</tr>
			<br>
			<tr>
				
				<td style="font-family: cursive; font-weight: bold">Password :</td>
				<td><input type="password" name="pwd" placeholder="Your Password.." required></td>
			</tr>
			<tr>
				<td colspan="2">
				<span style="font-size: 10px;"><?php echo $error; ?></span></td>
			</tr>
			<br>
			<tr>
				<td> </td>
				<td><input type="submit" value="Register" class="myButton" ></td>
			</tr>
			<tr>
				<td> </td>
				<td>
					
				<a href="LoginForm.php" class="myButton" >Login</a>
				
				</td>
			</tr>
			
		</table>
	</form>

</body>
</html>