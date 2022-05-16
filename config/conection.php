<?php
$servername='localhost';
$dbusername='root';
$password='';
$database='php_register';

// Create connection
$conn = mysqli_connect($servername,$dbusername, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br>";
?>