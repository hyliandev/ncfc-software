<?php

class AboutController {
	function index(){
		global $_SETTINGS, $DB;
		
		$sections=DBQuery(GetFileOutput(
			'get_staff_sections',
			Array('prefix'=>$_SETTINGS['cms_table_prefix']),
			'sql'
		));
		
		if($sections!==false){
			$sections=$sections->fetchAll(PDO::FETCH_ASSOC);
		}
		
		$sections=array_merge(array(0=>array('id'=>0)),$sections);
		
		foreach($sections as $key=>$section){
			$users=DBQuery(GetFileOutput(
				'get_staff',
				Array(
					'prefix'=>$_SETTINGS['cms_table_prefix'],
					'section_id'=>$section['id']
				),
				'sql'
			));
			
			if($users!==false){
				$users=$users->fetchAll(PDO::FETCH_ASSOC);
				
				foreach($users as $u_key=>$user){
					$userobj=GetUser($user['uid']);
					$userobj->staff_page_title=$user['title'];
					$users[$u_key]=$userobj;
				}
				$sections[$key]['staff']=$users;
			}
		}
		
		$_SETTINGS['page_title']='About';
		
		return GetFileOutput('about',Array('sections'=>$sections));
	}
}

?>