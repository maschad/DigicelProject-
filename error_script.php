<?php

//error handler function
function customError($errno, $errstr) {
	
	echo "<b>Error:</b> [$errno] $errstr<br>";
	echo "Ending Script";
	die();
}

//set error handler
set_error_handler("customError",E_USER_WARNING);

?>