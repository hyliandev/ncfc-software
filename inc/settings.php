<?php

/*
	Settings file
	Throw any global settings you might need site-wide in here
*/

$_SETTINGS=Array(
	
	// FRAMEWORK INFORMATION
	
	
	
	// Directory with the controllers
	'controller_directory'=>'controllers',
	
	// Directory with the models
	'models_directory'=>'models',
	
	// Directory with the views
	'views_directory'=>'views',
	
	// Directory with the pre-written queries
	'sql_directory'=>'sql',
	
	
	
	// END FRAMEWORK INFORMATION
	
	
	
	
	
	
	
	
	
	
	// SITE INFORMATION
	
	
	
	// This is for the title of the website
	'site_title'=>$mybb->settings['bbname'],
	
	// This is for the title of the current page
	'page_title'=>'',
	
	// The actual title to put in <title>
	'final_page_title'=>'',
	
	
	
	// END SITE INFORMATION
	
	
	
	
	
	
	
	
	
	
	// REQUEST INFORMATION
	
	
	
	// This is the raw value of $_GET['page']
	'request_raw'=>'',
	
	// This is the request as an array
	'request'=>Array(),
	
	// This is the path up to the included file as an array
	'controller_path'=>Array(),
	
	// This is the parameters as an array
	'parameters'=>Array(),
	
	// List of routes
	'routes'=>Array(
		'index'=>'updates'
	),
	
	
	
	// END REQUEST INFORMATION
	
	
	
	
	
	
	
	
	
	
	// OTHER
	
	
	
	// Errors and other short page messages
	// These are displayed at the top of the page, above the content
	// Find their implementation in template.php
	// They're based on bootstrap classes
	'alerts'=>Array(
		'warning'=>Array(),
		'info'=>Array(),
		'success'=>Array(),
		'danger'=>Array()
	),
	
	'table_prefix'=>$config['database']['table_prefix']
	
	
	
	// END OTHER
	
);

?>