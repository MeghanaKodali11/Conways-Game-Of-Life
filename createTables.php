<?php
$servername = "localhost";
$username = "mkodali1";
$password = "mkodali1";
$dbname = "mkodali1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table


$sql1 = "CREATE TABLE login_ids (
firstname VARCHAR(30),
lastname VARCHAR(30),
username VARCHAR(30),
password VARCHAR(30) 
)";

$sql1 = "CREATE TABLE players (
firstname VARCHAR(30),
lastname VARCHAR(30),
time VARCHAR(30),
score VARCHAR(30) 
)";

if ($conn->query($sql1) === TRUE) {
    echo "login_id Table is created successfully";
} else {
    echo "Table Creation Error " . $conn->error;
}

$conn->close();
?>