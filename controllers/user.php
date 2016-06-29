<?php

class UserController {
	function index(){
		global $mybb;
		
		die(GetDebug($mybb->user));
	}
}

?>