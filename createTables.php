<?php
$servername = "localhost";
$username = "pkalipindi1";
$password = "pkalipindi1";
$dbname = "pkalipindi1";

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
password VARCHAR(100)
)";

$sql = "CREATE TABLE players (
id int NOT NULL AUTO_INCREMENT,
username VARCHAR(30),
/*firstname VARCHAR(30),
lastname VARCHAR(30),*/
d_t VARCHAR(30),
generation VARCHAR(30),
population VARCHAR(30),
PRIMARY KEY (id)
)";

if ($conn->query($sql1) === TRUE) {
    echo "login_id Table is created successfully";
} else {
    echo "Table Creation Error " . $conn->error;
}
if ($conn->query($sql) === TRUE) {
    echo "players Table is created successfully";
} else {
    echo "Table Creation Error " . $conn->error;
}

$conn->close();
?>