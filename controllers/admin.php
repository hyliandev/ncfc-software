<?php

class AdminController {
	function index(){
		
	}
	
	function ShowSQL($sql=null,$cms=null){
		global $_SETTINGS;
		
		return '<pre>'.GetFileOutput(
			$sql,
			Array(
				'prefix'=>$_SETTINGS[($cms ? 'cms_' : '') . 'table_prefix']
			),
			'sql'
		).'</pre>';
	}
}

?>