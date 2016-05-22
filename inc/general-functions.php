<?php

/*
	General Functions
	Put any useful functions you come up with in here
*/

// Get the 
function GetFilePath($array,$setting){
	global $_SETTINGS;
	
	if(!is_array($array)) $array=implode('/',$array);
	
	return $_SETTINGS[$setting.'_directory'] . '/' . implode('/',$array) . '.php'; 
}

// Get a view file, parse it, and return it
function GetView($view,$vars){
	// Get the actual file path of the view file
	$view=GetFilePath($view,'views');
	
	// If the file doesn't exist, just return an empty string
	if(!file_exists($view)) return '';
	
	// Sift through all of the variables that we want to use in this view
	foreach($vars as $key=>$value){
		// Set them as a variable in this scope
		$$key=$value;
	}
	
	// Start recording the output so it can be returned as a string
	ob_start();
	
	// Include the view file
	include $view;
	
	// Return the output from the file as a string
	return ob_get_clean();
}

?>