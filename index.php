<?php

/*
	Nintendo Community Fangame Convention software
	Developed by HylianDev, 2016
	================================
	SECTIONS:
		1. MyBB includes
		2. CMS includes
		3. Run & Display the page
*/










// ================================
// ========== SECTION #1 ==========
// ================================
// ======== MyBB includes =========
// ================================





// Change the working directory to the MyBB directory
// This prevents any errors when we include the global.php file
chdir('../forum/');

// If MyBB sees that the IN_MYBB constant isn't defined, it'll shut down
define('IN_MYBB',true);

// This is the only file from MyBB we need to include
// It brings in everything we need
require_once 'global.php';










// ================================
// ========== SECTION #2 ==========
// ================================
// ========= CMS includes =========
// ================================





// Change the working directory back to the mainsite
// We don't need to do include anything from the forum anymore
chdir('../mainsite');

// Include files from the defined directories
// They have important files with functions and classes
$include_dirs=Array('inc','models');

// Sift through the include directories
foreach($include_dirs as $dir){
	// scan all of the files in that directory
	$includes=scandir($dir);
	
	// sift through all of the files in that directory
	foreach($includes as $include){
		// add the directory to the beginning of the path
		// this makes for easy including
		$include=$dir.'/'.$include;
		
		// if it's a directory, skip to the next item in the list
		// we're only concerned with files
		if(is_dir($include)) continue;
		
		// if it's a file ending in ".php", include it
		// we're only concerned with PHP files
		// any directories or non-PHP files will be ignored
		if(substr($include,-4,4)=='.php') include_once $include;
	}
}










// ================================
// ========== SECTION #3 ==========
// ================================
// ==== Run & display the page ====
// ================================





// $yield should contain all of the page's content
// we're gonna make it whatever gets returned from the main() function
// main() is from main.php in the includes directory
$yield=main();

// Create the final title
$_SETTINGS['final_page_title']=(
	!empty($_SETTINGS['page_title']) ? $_SETTINGS['page_title'] . ' &bull; ' : ''
) . $_SETTINGS['site_title'];

// Include the "template.html" file
// It's a basic HTML template with necessary MyBB inserts
require_once 'template.php';

?>