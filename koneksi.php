<?php
$servername = "localhost";
$database = "tsa_web";
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