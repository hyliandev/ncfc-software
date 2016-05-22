<h1>Updates</h1>

<?php foreach($topics as $topic): ?>
	<h2><?=$topic['title']?></h2>
	<h3><?=build_profile_link($topic['user']->username_styled,$topic['user']->uid)?></h3>
	<?=$topic['user']->avatar_img?>
	<p><?=$topic['message']?></p>
<?php endforeach; ?>