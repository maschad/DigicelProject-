<?php

include 'connection.php';

// define variables and set to empty values
$name = $email = $location = $baseStation = $number= $accountNumber ="";

if ($_SERVER["REQUEST_METHOD"] == "post") {

  $name = test_input($_POST['ContactName']);
  $email = test_input($_POST['email']);
  $contactNo = test_input($_POST['contactNo']);
  $baseStation = test_input($_POST['baseStation']);
  $service = test_input($_POST['service']);

  if (empty($_POST['ContactName'])) {
    $nameErr = "Name is required";
  }  // check if name only contains letters and whitespace
	
  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	  $nameErr = "Only letters and white space allowed"; 
	}
	else {
	$name = test_input($_POST['ContactName']);
  }

  if (empty($_POST['email'])) {
    $emailErr = "Email is required";
  } 
	// check if e-mail address is well-formed
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $emailErr = "Invalid email format"; 
	}
	else {
	$email = test_input($_POST['email']);
	}

  if (empty($_POST['location'])) {
    $location = "Location is required";
  } else {
    $location = test_input($_POST["location"]);
  }

  if (empty($_POST['baseStation'])) {
    $comment = "Base Station is required";
  } else {
    $comment = test_input($_POST["baseStation"]);
  }

  if (empty($_POST['contactNo'])) {
    $contactErr = "contact Number is required";
  } else {
    $contact = test_input($_POST['contactNo']);
  }
}

$name = mysql_real_escape_string($_POST['ContactName']);
$email = mysql_real_escape_string($_POST['email']);
$location = mysql_real_escape_string($_POST['location']);
$service = mysql_real_escape_string($_POST['service']);
$number = mysql_real_escape_string($_POST['contactNo']);
$baseStation = mysql_real_escape_string($_POST['baseStation']);
$company = mysql_real_escape_string($_POST['Company']);
$accountNumber = mysql_real_escape_string($_POST['accountNumber']);

$sql = "INSERT INTO users(AccountNumber,[Base Station],Company,[Contact Name],ContactNo,email,Location,Service) values ('$accountNumber','$baseStation','$company','$name','$number','$email','$location','$service')";

if($conn->query($sql) == TRUE){
  echo "New record creeated successfully";
}else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$conn->close();

?>