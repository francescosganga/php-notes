<?php
	$MySQL = Array(
		'localhost',
		'root',
		'',
		'php_notes'
	);
	
	$password = "testpw";
	
	$result = "";
	$error = "";
	
	function _error($err, $mysql_error) {
		global $result; global $error;
		
		$error = true;
		$result .= "{$err} ({$mysql_error})\n";
	}
	
	function _result($res) {
		global $result; global $error;
		
		$res = str_replace("\n", "<br />", $res);
		return $res;
	}
?>
