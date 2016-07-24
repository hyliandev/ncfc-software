SELECT
*,
(<?=GetFileOutput('get_booth_likes',Array('prefix'=>$prefix,'id'=>$prefix.'booths.id'),'sql')?>) AS likes,
(<?=GetFileOutput('get_booth_has_liked',Array('prefix'=>$prefix,'id'=>$prefix . 'booths.id','user_id'=>$user_id),'sql')?>) AS has_liked
FROM <?=$prefix?>booths
WHERE category=<?=$category?>
;