<?php

/*
	This file houses the main() function
	The $yield variable, which should contain the page's content, catches the main() return
*/

function main(){
	// We need to access the settings in this function
	global $_SETTINGS;
	
	/*
		SECTIONS:
			1. Parsing Request
			2. Get Controller
	*/
	
	// ================================
	// == SECTION 1: Parsing Request ==
	// ================================
	
	// Get the raw page request
	// If it's empty(), then make it index
	// Index should either have a route or a controller
	$_SETTINGS['request_raw']=!empty($_GET['page'])?$_GET['page']:'index';
	
	// See if the raw request matches a route
	if(isset($_SETTINGS['routes'][$_SETTINGS['request_raw']]))
		$_SETTINGS['request_raw']=$_SETTINGS['routes'][$_SETTINGS['request_raw']]; 

	// Get the raw page request as an array
	// Split it by /
	$_SETTINGS['request']=explode('/',$_SETTINGS['request_raw']);
	
	// Sort through the parameters of the request
	// We're trying to find a file in the controller directory
	foreach($_SETTINGS['request'] as $dir){
		// If the parameters we've sifted through so far aren't a valid file,
		if(!file_exists(GetFilePath($_SETTINGS['controller_path'],'controller')))
			// Add the newest node to the array and we'll try again next time
			$_SETTINGS['controller_path'][]=$dir;
		else
			// Add the rest of the request parameters to the parameters array
			$_SETTINGS['parameters'][]=$dir;
	}
	
	// ================================
	// == SECTION 2: Get Controller ===
	// ================================
	
	do {
		// SECTION 1:
		// Do some basic checks with the request
		
		// See if there is a name for the controller
		if(empty($_SETTINGS['controller_path'][0])) break;
		
		// The path to the controller file
		$file_path=GetFilePath($_SETTINGS['controller_path'],'controller');
		
		// If the controller file cannot be found
		if(!file_exists($file_path)) break;
		
		// File exists. Let's require it
		require_once $file_path;
		
		// If the method doesn't exist
		
		// Get the name of the class
		$class=$_SETTINGS['controller_path'];
		$class=$class[count($class)-1].'Controller';
		
		// If the controller class doesn't exist
		if(!class_exists($class)) break;
		
		// Get the class object
		$class=new $class();
		
		// Get the name of the method
		$methodname=empty($_SETTINGS['parameters'][0]) ? 'index' : $_SETTINGS['parameters'][0];
		
		// If the requested method doesn't exist
		if(!method_exists($class,$methodname)) break;
		
		// The file exists, the proper class exists, the method exists
		return call_user_func_array(
			array($class,$methodname),
			array_slice(
				$_SETTINGS['parameters'],
				1
			)
		);
	} while(false);
	
	return GetFileOutput('404error');
}

?>