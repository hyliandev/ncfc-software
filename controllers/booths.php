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
				$booths[$key]=ParseBooth($booth);
			}
		}else
			$booths=Array();
		
		$_SETTINGS['page_title']='Booths';
		
		return GetFileOutput('booths',Array('booths'=>$booths));
	}
	
	function view($id){
		global $DB, $_SETTINGS;
		
		$id=base64_url_decode($id);
		
		$booth=DBQuery(GetFileOutput(
			'get_booth',
			Array(
				'prefix'=>$_SETTINGS['cms_table_prefix'],
				'id'=>$DB->quote($id)
			),
			'sql'
		));
		
		if($booth!==false){
			$booth=ParseBooth($booth->fetch(PDO::FETCH_ASSOC));
			
			$booth['file_size']=ParseFileSize(filesize('files/booths/'.$booth['id_base64'].'/booth.zip'));
			
			$_SETTINGS['page_title']=$booth['title'];
		}else $booth=Array();
		
		return GetFileOutput('booth',Array('booth'=>$booth));
	}
	
	function download($id){
		$bid=base64_url_decode($id);
		
		return 'lol';
	}
}

?>