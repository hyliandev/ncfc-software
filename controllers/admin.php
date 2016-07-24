<?php

class AdminController {
	function index(){
		
	}
	
	function ShowSQL($sql=null,$cms=null){
		global $_SETTINGS;
		
		return '<textarea disabled style="display:block;width:100%;height:10em;color:#000;font-family:monospace;">'.GetFileOutput(
			$sql,
			Array(
				'prefix'=>$_SETTINGS[($cms ? 'cms_' : '') . 'table_prefix']
			),
			'sql'
		).'</textarea>';
	}
	
	function user(){
		global $mybb;
		
		return GetDebug($mybb->user);
	}
}

?>