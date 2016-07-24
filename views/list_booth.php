<?php $url=GetMainsiteUrl() . 'booths/view/' . $booth['id_base64'] . '/' . makeURLsafe($both['title']); ?>
<div class="booth-top col-xs-12">
	<a href="<?=$url?>"><div class="ncfc-thumbnail" style="background-image:url('<?=GetMainsiteUrl()?>files/booths/<?=$booth['id_base64']?>/thumbnail.png');"><div class="description">
		<?=$booth['short_description']?>
	</div></div></a>
</div>

<div class="booth-bottom booth-bottom-left col-xs-1"></div>

<div class="booth-bottom booth-bottom-center col-xs-9">
	<h4><a href="<?=$url?>">
		<?=$booth['title']?>
	</a></h4>
	by <?=build_profile_link($booth['user']->username_styled,$booth['user']->uid)?>
</div>

<div class="booth-bottom booth-bottom-right col-xs-2"></div>

<div class="col-xs-2 rating">
	<strong class="like-count"><?=$booth['likes']?></strong>
	<br>
	<a href="<?=GetMainsiteUrl()?>booths/like/<?=$booth['id_base64']?>" class="like-booth">
		<span class="fa fa-star<?=$booth['has_liked'] > 0 ? '' : '-o'?>"></span>
	</a>
</div>