<?php

/*
	General Functions
	Put any useful functions you come up with in here
*/





// Get the 
function GetFilePath($array,$setting,$extension='php'){
	// We need to use the gobal $_SETTINGS array
	global $_SETTINGS;
	
	// If the setting requested doesn't exist, return a blank
	if(empty($_SETTINGS[$setting.'_directory'])) return false;
		
	// If $array isn't an array, let's make it one
	// This makes it so you can put a string in there and it'll still work
	if(!is_array($array)) $array=explode('/',$array);
	
	// Return the file path to the file requested
	return $_SETTINGS[$setting.'_directory'] . '/' . implode('/',$array) . '.' . $extension;
}





// Get a view file, parse it, and return it
function GetView($view,$vars){
	// In case the view needs to access the settings easily
	global $_SETTINGS;
	
	// Get the actual file path of the view file
	$view=GetFilePath($view,'views');
	
	// If the file doesn't exist, return false
	if(!file_exists($view)) return false;
	
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