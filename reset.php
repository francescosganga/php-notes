<?php
	include("mysql.inc.php");
	
	$connection = new MySQLi($MySQL[0], $MySQL[1], $MySQL[2])
		or die($connection->connect_errno);
	$result .= "connected to {$MySQL[0]}.\n";
	$connection->select_db($MySQL[3])
		or _error("can't database '{$MySQL[3]}'", $connection->error);
	if(!$error)
		$result .= "database '{$MySQL[3]}' selected\n";
	$query = $connection->query("TRUNCATE TABLE notes;")
		or _error("'notes' table doesn't exist", $connection->error);
	if(!$error)
		$result .= "table 'notes' is now empty\n";
	$query = $connection->query("ALTER TABLE notes AUTO_INCREMENT = 1;")
		or _error("auto increment not resetted", $connection->error);
	if(!$error)
		$result .= "auto increment resetted\n";
	print _result($result);
?>
