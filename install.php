<?php
	include("mysql.inc.php");
	
	$connection = new MySQLi($MySQL[0], $MySQL[1], $MySQL[2])
		or die($connection->connect_errno);
	$result .= "connected to {$MySQL[0]}.\n";
	$query = $connection->query("CREATE DATABASE {$MySQL[3]}")
		or _error("database '{$MySQL[3]}' already exists.\n");
	if(!$error)
		$result .= "database '{$MySQL[3]}' created";
	$connection->select_db($MySQL[3])
		or _error("database '{$MySQL[3]}' doesn't exist\n");
	if(!$error)
		$result .= "database '{$MySQL[3]}' selected\n";
	$query = $connection->query("CREATE TABLE notes (id INT(5) NOT NULL AUTO_INCREMENT, text TEXT, date VARCHAR(255), PRIMARY KEY(id));")
		or _error("error during creating 'notes' table: " . $query->error . "\n");
	if(!$error)
		$result .= "table '{$MySQL[3]}' created\n";
	$query = $connection->query("INSERT INTO notes (text, date) VALUE ('This is a simple note!', '17:07 @ 04-06-2015');")
		or _error("error during creating example note: " + $query->error . "\n");
	if(!$error)
		$result .= "example note created\n";
	
	print _result($result);
?>