SELECT uid, username, avatar, usergroup, additionalgroups, displaygroup
FROM <?=$prefix?>users
WHERE uid=<?=$uid?> 
LIMIT 1;