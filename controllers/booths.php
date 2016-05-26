<?php

class BoothsController {
	function index(){
		global $DB, $_SETTINGS;
		
		$booths=DBQuery(GetFileOutput(
			'get_booths',
			Array(
				'prefix'=>$_SETTINGS['cms_table_prefix']
			),
			'sql'
		));
		
		if($booths!==false){
			$booths=$booths->fetchAll(PDO::FETCH_ASSOC);
		}else
			$booths=Array();
		
		$_SETTINGS['page_title']='Booths';
		
		return GetFileOutput('booths',Array('booths'=>$booths));
	}
}

?>