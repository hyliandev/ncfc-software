<?php

/*
	MyBB barebones template
	
	$headerinlude includes all of the stuff for <head>
	CSS, JavaScript, favicon, etc
	
	$title is the title of the page. Part of the mainsite
	
	$header is the first half of the HTML template
	Banner image, login/user panel, etc
	
	$yield is the actual page content. Part of the mainsite
	
	$footer is the second half of the HTML template
	Copyright notice, bottom links, etc
*/

?><!DOCTYPE html>
<html>

<head>
<title><?=$title?></title>
<?=$headerinclude?>
</head>

<body>
<?=$header?>
<?=$yield?>
<?=$footer?>
</body>

</html>