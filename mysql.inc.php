<?php
	$MySQL = Array(
		'localhost',
		'root',
		'',
		'php_notes'
	);
	
	$result = "";
	$error = "";
	
	function _error($err) {
		global $result; global $error;
		
		$error = true;
		$result .= $err;
	}
	
	function _result($res) {
		global $result; global $error;
		
		$res = str_replace("\n", "<br />", $res);
		return $res;
	}
?>