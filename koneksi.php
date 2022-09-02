<?php
$servername = "localhost";
$database = "company";
$user = "root";
$password = "";

// Create connection
$connect = new mysqli($servername, $user, $password, $database);

// Check connection

if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully";
// echo "<br><br>"
?>