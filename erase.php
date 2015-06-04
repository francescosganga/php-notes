<?php
	include("mysql.inc.php");
	
	$connection = new MySQLi($MySQL[0], $MySQL[1], $MySQL[2])
		or die($connection->connect_errno);
	$result .= "connected to {$MySQL[0]}.\n";
	$query = $connection->query("DROP DATABASE {$MySQL[3]}")
		or _error("database '{$MySQL[3]}' doesn't exist.\n");
	if(!$error)
		$result .= "database '{$MySQL[3]}' was deleted.\n";
	
	print _result($result);
?>