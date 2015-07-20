<?php
$servername = "localhost";
$username = "root";
$password = "";
$myDB = "contacts"

// Create connection
$conn = new mysqli($localhost, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

session_start();

?>


 


  