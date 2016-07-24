<?php

class BoothsController {
	function index(){
		global $DB, $_SETTINGS, $mybb;
		
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
						'category'=>$category->id,
						'user_id'=>$mybb->user['uid']
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
				'insert_booth_view',
				Array(
					'prefix'=>$_SETTINGS['cms_table_prefix'],
					'id'=>$DB->quote($id)
				),
				'sql'
			));
			
			$booth=ParseBooth($booth->fetch(PDO::FETCH_ASSOC));
			
			$booth['file_size']=ParseFileSize(filesize('files/booths/'.$booth['id_base64'].'/booth.zip'));
			
			$_SETTINGS['page_title']=$booth['title'];
		}else $booth=Array();
		
		return GetFileOutput('booth',Array('booth'=>$booth));
	}
	
	function like($_id){
		global $DB, $mybb, $_SETTINGS;
		
		$id=base64_url_decode($_id);
		
		$uid=$mybb->user['uid'];
		
		if(!empty($uid)){
			$has_liked=DBQuery(GetFileOutput(
				'get_booth_has_liked',
				Array(
					'prefix'=>$_SETTINGS['cms_table_prefix'],
					'id'=>$id,
					'user_id'=>$uid
				),
				'sql'
			))->fetch()[0];
			
			$like=DBQuery(GetFileOutput(
				($has_liked ? 'delete' : 'insert') . '_booth_like',
				Array(
					'prefix'=>$_SETTINGS['cms_table_prefix'],
					'id'=>$DB->quote($id),
					'user_id'=>$DB->quote($mybb->user['uid'])
				),
				'sql'
			));
			
			$data=null;
			
			if($like){
				$data=DBQuery(GetFileOutput(
					'get_booth_likes',
					Array(
						'prefix'=>$_SETTINGS['cms_table_prefix'],
						'id'=>$DB->quote($id)
					),
					'sql'
				));
				if($data!==false){
					$data=$data->fetch()[0];
					$lang_data.=' Like' . ($data==1?'':'s');
					$like=true;
				}else{
					$data=null;
					$like=false;
				}
			}
			
			$error=null;
		}else{
			$like=false;
			$data=null;
			$lang_data=null;
			$has_liked=false;
			$error='You must be logged in!';
		}
		
		if(empty($_POST['ajax']))
			header('Location:' . GetMainsiteUrl() . 'booths/view/'. $_id);
		else{
			$ret=Array(
				'success'=>$like,
				'count'=>$data,
				'lang'=>$lang_data,
				'icon'=>'fa-star'.(!$has_liked?'':'-o'),
				'error'=>$error
			);
			header('Content-type:application/json');
			die(json_encode($ret));
		}
	}
	
	function download($id){
		$bid=base64_url_decode($id);
		
		return 'lol';
	}
}

?>