<html>
<head>
<title>Game of Life-Login</title>
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

<!-- <h1 style="margin-top:10px;" >LOGIN TO PLAY GAME</h1> -->
<!-- <a href="#Login" > <img src="down.png" style="margin-top:10px;" alt=""/> </a> -->

<?php

session_start();
if(isset($_SESSION['login_user'])){
header("location: dom.php");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

		
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$uid= test_input($_POST["uid"]);
$pwd= test_input($_POST["pwd"]);

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

$sql = "SELECT * FROM login_ids";
$result = $conn->query($sql);
$c=0;
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
		
		if($row["username"] == $uid)
		{
			if(password_verify($pwd, $row["password"]))
			{
					$_SESSION['login_user']=$uid;
					$_SESSION['New_user']=0;
					if($uid=="Admin"){
						header("Location:Admin/index.php");
					}
					else {
					header("Location:dom.php");
					}
			}
			else
			{
					echo "<script type='text/javascript'>alert('Incorrect Password. Please enter correct password! ')</script>"; 
					$c=1;
					break;
			}
		}
		
    }
	if($c==0)
		echo "<script type='text/javascript'>alert('Incorret username or password.')</script>";
} else 
{
    echo "<script type='text/javascript'>alert('No User Found.')</script>";
}
$conn->close();
}

?>

<div>


<img src="head.png" height="150" width="400"   alt=""/>
   <a name= "Login"></a> <h2>User Login Form</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<br><br>
   <table align="center" style="
    width: 530px;
    height: 240px;">
			<tr>
				<td style="font-family: cursive; font-weight: bold">Username :</td>
				<td><input type="text" name="uid"  placeholder="Your Username.." required ></td>
			</tr>
			<br>
			<tr>
				
				<td style="font-family: cursive; font-weight: bold">Password :</td>
				<td><input type="password" name="pwd" placeholder="Your Password.." required></td>
			</tr>
			<tr>
				<td> </td>
				<td><input type="submit" value="Login" class="myButton"></td>
			</tr>
			<tr>
				<td> </td>
				<td>
				<a href="RegisterForm.php" class="myButton"  >Register</a></td>
			</tr>
		</table>	
		
	</form>
<div>
</body>
</html>