<?php
$servername = "localhost";
$username = "root";
$dbName = "dblessondata";
$password = "admin";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: (" . $conn->errno . ") " . $conn->connect_error);
  exit();
}
?>
