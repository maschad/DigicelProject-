<?php

include 'connection.php';

// define variables and set to empty values
$name = $email = $location = $baseStation = $contactNo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $contactNo = test_input($_POST["contactNo"]);
  $baseStation = test_input($_POST["baseStation"]);
  $service = test_input($_POST["service"]);

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	  }  // check if name only contains letters and whitespace
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	  $nameErr = "Only letters and white space allowed"; 
	}
	}
	else {
	$name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } 
	// check if e-mail address is well-formed
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $emailErr = "Invalid email format"; 
	}
	else {
	$email = test_input($_POST["email"]);
	}

  if (empty($_POST["location"])) {
    $location = "Location is required";
  } else {
    $location = test_input($_POST["location"]);
  }

  if (empty($_POST["baseStation"])) {
    $comment = "Base Station is required";
  } else {
    $comment = test_input($_POST["baseStation"]);
  }

  if (empty($_POST["contactNo"])) {
    $contactErr = "contact Number is required";
  } else {
    $contact = test_input($_POST["contactNo"]);
  }
}

$name = mysql_real_escape_string($_POST['name']);
$email = mysql_real_escape_string($_POST['email']);
$location = mysql_real_escape_string($_POST['location']);
$email = mysql_real_escape_string($_POST['email']);
$contact = mysql_real_escape_string($_POST['contact']);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$conn->close();

?>