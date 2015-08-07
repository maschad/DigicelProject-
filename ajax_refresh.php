<?php

	/ PDO connect *********
	function connect() {
		//establish a connection
	    return new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}
	 
	$pdo = connect();
	$keyword = '%'.$_POST['accountNumber'].'%';
	$sql = "SELECT * FROM users WHERE accountNumber LIKE (:keyword) ORDER BY Location ASC LIMIT 0, 10";
	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	foreach ($list as $rs) {
		// put in bold the written text
		$accountNumber = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['accountNumber']);
		// add new option
	    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['accountNumber']).'\')">'.$accountNumber.'</li>';
	}

?>