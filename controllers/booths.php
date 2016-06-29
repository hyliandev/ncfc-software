<?php

class BoothsController {
	function index(){
		global $DB, $_SETTINGS;
		
		$categories=DBQuery(GetFIleOutput(
			'get_booth_categories',
			Array(
				'prefix'=>$_SETTINGS['cms_table_prefix']
			),
			'sql'
		));
		
		if($categories!==false){
			$categories=$categories->fetchAll(PDO::FETCH_OBJ);
			
			foreach($categories as $ckey=>$category){
				$booths=DBQuery(GetFileOutput(
					'get_booths',
					Array(
						'prefix'=>$_SETTINGS['cms_table_prefix'],
						'category'=>$category->id
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
				
				$categories[$ckey]->booths=$booths;
			}
		}else
			$categories=Array();
		
		$_SETTINGS['page_title']='Booths';
		
		return GetFileOutput('booths',Array('categories'=>$categories));
	}
	
	function view($id){
		global $DB, $_SETTINGS, $mybb;
		
		$id=base64_url_decode($id);
		
		$booth=DBQuery(GetFileOutput(
			'get_booth',
			Array(
				'prefix'=>$_SETTINGS['cms_table_prefix'],
				'id'=>$DB->quote($id),
				'user_id'=>$DB->quote($mybb->user['uid'])
			),
			'sql'
		));
		
		if($booth!==false){
			$create_view=DBQuery(GetFileOutput(
				'create_booth_view',
				Array(
					'prefix'=>$_SETTINGS['cms_table_prefix'],
					'booth_id'=>$DB->quote($id)
				),
				'sql'
			));
			
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