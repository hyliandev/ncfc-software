<?php

// The controller for displaying updates
class UpdatesController {
	
	// access this by going to updates/index
	function index(){
		// We need:
		// $DB, the database PDO
		// $_SETTINGS, the array of CMS settings
		global $DB, $_SETTINGS;
		
		// Get the SQL text from the get_updates.php file
		$topics=GetFileOutput('get_updates',Array('forum_id'=>3),'sql');
		
		// Run the query
		$topics=DBQuery($topics);
		
		// If there are no database errors,
		// TODO: LOG DB ERROR!
		if($topics!==false){
			// Get all of the topics returned by the query
			$topics=$topics->fetchAll(PDO::FETCH_ASSOC);
			
			// Require the postParser class so we can properly display the update text
			require_once MYBB_ROOT.'/inc/class_parser.php';
			
			// Create a new parser object
			$parser=new postParser();
			
			// Sort through all of the topics returned
			foreach($topics as $key=>$topic){
				// Parse the 'message' field
				$topics[$key]['message']=$parser->parse_message(
					$topic['message'],
					Array(
						// no HTML
						'allow_html'=>false,
						// Allow BBCode
						'allow_mycode'=>true,
						// Allow smilies
						'allow_smilies'=>true,
						// Allow images
						'allow_imgtag'=>true,
						// Filter bad words
						'filter_badwords'=>true,
						// Turn line breaks into <br> tags
						'nl2br'=>true
					)
				);
				
				// Get the user object
				$topics[$key]['user']=GetUser($topic['uid']);
				
				$topics[$key]['date']=date(GetDateFormat(),$topics[$key]['timestamp']);
			}
		}else
			// If there was an error, return an empty array
			$topics=Array();
		
		// Set the title of this page
		$_SETTINGS['page_title']='Updates';
		
		// Return the output from the 'updates' view
		return GetFileOutput('updates',Array('topics'=>$topics));
	}
}

?>