SELECT
*,
(SELECT COUNT(*) FROM <?=$prefix?>booth_likes WHERE booth_id=<?=$id?>) AS likes,
(SELECT COUNT(*) FROM <?=$prefix?>booth_views WHERE booth_id=<?=$id?>) AS views,
(SELECT COUNT(*) FROM <?=$prefix?>booth_likes WHERE booth_id=<?=$id?> AND uid=<?=$user_id?> LIMIT 1) AS has_liked

FROM <?=$prefix?>booths

WHERE id=<?=$id?>

LIMIT 1;