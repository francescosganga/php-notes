<?php
	function htmlentitiesOutsideHTMLTags ($htmlText)
	{
	    $matches = Array();
	    $sep = '###HTMLTAG###';

	    preg_match_all("@<[^>]*>@", $htmlText, $matches);   
	    $tmp = preg_replace("@(<[^\/>]*>)@", $sep, $htmlText);
	    $tmp = preg_replace("@(<[^>]*>)@", $sep, $htmlText);
	    $tmp = explode($sep, $tmp);

	    for ($i=0; $i<count($tmp); $i++)
		$tmp[$i] = htmlentities($tmp[$i]);

	    $tmp = join($sep, $tmp);

	    for ($i=0; $i<count($matches[0]); $i++)
		$tmp = preg_replace("@$sep@", $matches[0][$i], $tmp, 1);

	    return $tmp;
	}
	include("mysql.inc.php");
	$connection = new MySQLi($MySQL[0], $MySQL[1], $MySQL[2], $MySQL[3])
		or die($connection->connect_errno);
	if(isset($_GET['do'])) {
		if(isset($_POST['text']) and isset($_POST['password'])) {
			if($_POST['password'] != $password)
				die("Password error!");
			$text = $_POST['text'];
			$text = str_replace("\n", "<br />", $text);
			$text = htmlentitiesOutsideHTMLTags($text);
			$text = $connection->real_escape_string($text);

			
			$date = "written the " . date("d-m-Y") . " at " . date("h:i A") . "";
			$query = $connection->query("INSERT INTO notes (text, date) VALUES (\"{$text}\", \"{$date}\");")
				or die($connection->error);
			header("Location: index.php");
		} else {
			print "_POST['text'] error";
		}
	} else {
		?>
<html>
	<head>
		<title>Francesco Sganga's Notes</title>
		
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js" type="text/javascript"></script>
		
		<script type="text/javascript">
			$(document).ready(function() {
				
			});
		</script>
	</head>
	<body>
		<div class="content">
			<form action="insert.php?do" method="POST">
				<span style="font-variant: small-caps; font-weight: bold">Password</span> <input type="password" name="password" /><br />
				<span style="font-variant: small-caps; font-weight: bold">Note</span><br />
				<textarea style="width: 500px; height: 250px;" name="text"></textarea>
				<input type="submit" value="Insert" />
			</form>
		</div>
		<footer>
			PHP Notes by <a href="http://www.francescosganga.it" target="_BLANK">Francesco Sganga</a>
		</footer>
	</body>
</html>
		<?php
	}
?>