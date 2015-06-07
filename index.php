<?php
	/* DB DUMP
	CREATE TABLE notes (
		id INT(5) NOT NULL AUTO_INCREMENT,
		text TEXT,
		date VARCHAR(255),
		PRIMARY KEY(id)
	);
	*/
	
	include("mysql.inc.php");
	$connection = new MySQLi($MySQL[0], $MySQL[1], $MySQL[2], $MySQL[3])
		or die($connection->connect_errno);
	$result = $connection->query("SELECT * FROM notes ORDER BY id DESC");
	$Notes = Array();
	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$Notes[$row['id']] = Array(
			'text' => $row['text'],
			'date' => $row['date']
		);
	}
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
			<ul class="notes">
				<?php
				foreach($Notes as $Note) {
					?>
				<li>
					<div class="text"><?php print $Note['text']; ?></div>
					<div class="date"><?php print $Note['date']; ?></div>
				</li>
					<?php
				}
				?>
			</ul>
		</div>
		<footer>
			PHP Notes by <a href="http://www.francescosganga.it" target="_BLANK">Francesco Sganga</a>
		</footer>
	</body>
</html>
