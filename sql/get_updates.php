SELECT
<?=$prefix?>posts.subject AS title,
<?=$prefix?>posts.message AS message,
<?=$prefix?>posts.uid AS uid
FROM <?=$prefix?>posts
LEFT JOIN <?=$prefix?>threads ON <?=$prefix?>threads.tid=<?=$prefix?>posts.tid
LEFT JOIN <?=$prefix?>users ON <?=$prefix?>users.uid=<?=$prefix?>posts.uid
WHERE <?=$prefix?>threads.fid=<?=$forum_id?> AND <?=$prefix?>posts.replyto=0
ORDER BY pid DESC
LIMIT 5;