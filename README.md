# php-notes
Simple PHP scripts for save notes.

# How to use
Configure mysql.inc.php<br />
Run http://localhost/install.php (if database doesn't exist it will create it<br />
For database erasing, run http://localhost/erase.php<br />

# CHANGELOG
	0.2
		- built insert.php script
		- edit: mysql.inc.php ($password variable for insert notes)
		- built reset.php (erase 'notes' table and set auto_increment to 1)
	0.1
		- fixed install.php script
	first-version
		- built install.php script
		- built erase.php script
		- built notes listing script (index.php)
