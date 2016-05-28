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
			
			foreach($booths as $key=>$booth){
				$booths[$key]['id_base64']=base64_url_encode($booth['id']);
				$booths[$key]['user']=GetUser($booths[$key]['uid']);
			}
		}else
			$booths=Array();
		
		$_SETTINGS['page_title']='Booths';
		
		return GetFileOutput('booths',Array('booths'=>$booths));
	}
}

?>