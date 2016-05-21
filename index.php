<?php

/*
	Nintendo Community Fangame Convention software
	Developed by HylianDev, 2016
*/

// Change the working directory to the MyBB directory
// This prevents any errors when we include the global.php file
chdir('../forum/');

// If MyBB sees that the IN_MYBB constant isn't defined, it'll shut down
define('IN_MYBB',true);

// This is the only file from MyBB we need to include
// It brings in everything we need
require_once 'global.php';

// $yield should contain all of the page's content
$yield=main();

// die()
die($headerinclude.'<title>'.$title.'</title>'.$header.$yield.$footer);

?>