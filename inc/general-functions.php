<?php

/*
	General Functions
	Put any useful functions you come up with in here
*/





// Get URL to mainsite
function GetMainsiteUrl(){
	return $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].explode('index.php',$_SERVER['SCRIPT_NAME'])[0];
}





// Get a print_r output of a variable
// Includes <pre> tag for formatting
function GetDebug($var){
	return '<pre>'.var_export($var,true).'</pre>';
}





// 
function GetDateFormat(){
	global $mybb;
	
	if(!empty($mybb->user->dateformat))
		return $mybb->user->dateformat;
	
	return $mybb->settings['dateformat'];
}





// Use this function for database queries
// It will either return a PDO query object, or false if there's an error
function DBQuery($sql){
	global $DB, $_SETTINGS;
	
	$q=$DB->query($sql);
	
	$e=$DB->errorInfo();
	
	if(empty($e[2])) return $q;
	
	file_put_contents(
		'db_error_logs',
			file_get_contents('db_error_logs') .
			'[ '.date('m/d/Y @ g:i:sa',time()).' ]: ' .
			print_r($e,true) .
			"\n\n\n"
	);
	
	$_SETTINGS['alerts']['danger'][]='Database error: ' . $e[2];
	
	return false;
}





// Check if value is a valid database ID
function IsValidID($id=null){
	// If it's empty; aka null, undefined, 0, empty string, etc
	// Then it's invalid
	if(empty($id)) return false;
	
	// If it's not a number, it's invalid
	// This will still pass if it's a string with a number in it
	if(!is_numeric($id)) return false;
	
	// If it's less than or equal to zero, it's invalid
	if($id <= 0) return false;
	
	// If it passed all this scrutiny, it's probably a valid ID!
	return true;
}





// Get the file path
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
function GetFileOutput($view,$vars,$directory='views'){
	// In case the view needs to access the settings easily
	global $_SETTINGS;
	
	// Get the actual file path of the view file
	$view=GetFilePath($view,$directory);
	
	// If the file doesn't exist, return false
	if(!file_exists($view)) return false;
	
	// Sift through all of the variables that we want to use in this view
	foreach($vars as $key=>$value){
		// Set them as a variable in this scope
		$$key=$value;
	}
	
	// If you're getting a file from the sql directory, this will be very handy
	// You can add in a different prefix if you want
	if($directory=='sql' && empty($vars['prefix'])) $prefix=$_SETTINGS['table_prefix'];
	
	// Start recording the output so it can be returned as a string
	ob_start();
	
	// Include the view file
	include $view;
	
	// Return the output from the file as a string
	return ob_get_clean();
}





// Get all of the necessary information for a user from the database
function GetUser($id){
	/*
		SECTIONS:
			1. Getting the user info from the database
			2. Preparing the user info
			3. Returning the user info
	*/
	
	// ================================
	// === SECTION 1: Get the info ====
	// ================================
	
	// We need to use the $DB PDO
	global $DB, $mybb;
	
	// If the ID is invalid, return an empty object
	if(!IsValidID($id)) return new stdClass();
	
	// Get the output of the 'get_user' SQL query
	$query=GetFileOutput('get_user',Array('uid'=>$id),'sql');
	
	// Run the query
	$query=DBQuery($query);
	
	// If there was an error, return an empty object
	if($query===false) return new stdClass();
	
	// ================================
	// = SECTION 2: Prepare the info ==
	// ================================
	
	// Get the returned info from the query
	$query=$query->fetch(PDO::FETCH_OBJ);
	
	// Get the styled username
	// If the usergroup is a valid ID,
	if(IsValidId($query->usergroup)){
		// Run the query
		$dgs=DBQuery(GetFileOutput('get_usergroup',Array('gid'=>$query->usergroup),'sql'));
		
		// If the query had no errors,
		if($dgs!==false){
			// Get all of the results
			$dgs=$dgs->fetch(PDO::FETCH_ASSOC);
			
			// If there's a returned row,
			if(!empty($dgs['namestyle'])){
				// Create the username_styled var
				$query->username_styled=str_replace('{username}',$query->username,$dgs['namestyle']);
			}
		}
	}
	
	// If the username_styled var wasn't created, just make it the plain username
	if(empty($query->username_styled))
		$query->username_styled=$query->username;
	
	// Prepare the avatar
	// This is for quick & easy avatar displaying
	$query->avatar_img=
		'<img src="'.$mybb->settings['bburl'] . '/' .
		$query->avatar.'" alt="'.$query->username
	.'\'s avatar">';
	
	// ================================
	// == SECTION 3: Return the info ==
	// ================================
	
	// Return the user object
	return $query;
}





// This is a function for base64 encoding something into a URL-safe string
// PHP's base64 uses the + / and = characters. These are not preferable for URLs
// The / interferes with the parameters
// The + and = are generally used in $_GET values; I'm replacing them because I feel like it
function base64_url_encode($value){
	$value=base64_encode($value);
	
	$value=str_replace('+','-',$value);
	$value=str_replace('/','_',$value);
	$value=str_replace('=','',$value);
	
	return $value;
}





// Decode the URL-safe base64 string
function base64_url_decode($value){
	$value=str_replace('-','+',$value);
	$value=str_replace('_','/',$value);
	
	return base64_decode($value);
}





// Use this function to make a string URL-safe
function makeURLsafe($string){
	$string=explode(' ',$string);
	
	foreach($string as $key=>$value){
		$string[$key]=strtolower(preg_replace('/[^a-zA-Z0-9]/','',$value));
	}
	
	return implode('-',$string);
}





// Use this function to parse some extra necesary values for the booth
function ParseBooth($booth){
	$booth['id_base64']=base64_url_encode($booth['id']);
	$booth['user']=GetUser($booth['uid']);
	
	return $booth;
}





// Use this function to get a more readable file size from bytes
function ParseFileSize($s){
	$suffixes=Array(
		'',
		'K',
		'M',
		'G',
		'T'
	);
	$denom_use=0;
	$denom=1024;
	
	while($s > $denom && $denom_use < count($suffixes) - 1){
		$s/=$denom;
		$denom_use++;
	}
	
	return round($s,2).' '.$suffixes[$denom_use].'B';
}





// See if a user has committed this action recently
function UserHasCommittedActionSince($action,$time){
	global $_SETTINGS, $mybb, $DB;
	
	$q=DBQuery(GetFileOutput(
		'get_special_user_action',
		Array(
			'uid'=>$DB->quote($mybb->user['uid']),
			'time'=>$DB->quote($time),
			'action'=>$DB->quote($action),
			'prefix'=>$_SETTINGS['cms_table_prefix']
		),
		'sql'
	));
	
	// If the query fails, don't let the user do it!
	if($q===false) return true;
	
	return !empty($q->fetch()[0]);
}

?>