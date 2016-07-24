SELECT COUNT(*)

FROM <?=$prefix?>user_actions

WHERE uid=<?=$uid?>
AND action=<?=$action?>
AND time_done > <?=time() - $time?>

;