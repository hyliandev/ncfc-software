SELECT
*,
(<?=GetFileOutput('get_booth_likes',Array('prefix'=>$prefix,'id'=>$id),'sql')?>) AS likes,
(SELECT COUNT(*) FROM <?=$prefix?>booth_views WHERE booth_id=<?=$id?>) AS views,
(<?=GetFileOutput('get_booth_has_liked',Array('prefix'=>$prefix,'id'=>$id,'user_id'=>$user_id),'sql')?>) AS has_liked

FROM <?=$prefix?>booths

WHERE id=<?=$id?>

LIMIT 1;