<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
	$_SESSION['login_user']=null;
	$_SESSION['New_user']=null;
header("Location: LoginForm.php"); // Redirecting To Home Page
}
?>