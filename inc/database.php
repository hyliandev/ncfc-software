<?php

/*
	Database connection
	Connect using the $config variables from MyBB
	It only supports MySQL!!
	We're using a PDO because it's much better than using mysql_* or mysqli_* functions
*/

$DB = new PDO(
	'mysql:host='.$config['database']['hostname'].';dbname='.$config['database']['database'],
	$config['database']['username'],
	$config['database']['password']
);

?>