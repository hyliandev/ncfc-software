SELECT
*,
(<?=GetFileOutput('get_booth_likes',Array('prefix'=>$prefix,'id'=>$prefix.'booths.id'),'sql')?>) AS likes
FROM <?=$prefix?>booths
WHERE category=<?=$category?>
;