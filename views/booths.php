<div class="t2"><h1>Booths</h1></div>

<div class="row">
<?php foreach($booths as $booth): ?>
	<div class="col-sm-4">
		<div class="booth-top col-xs-12">
			<div class="ncfc-thumbnail" style="background-image:url('<?=GetMainsiteUrl()?>files/booths/1/thumbnail.png');"><div class="description">
				<?=$booth['short_description']?>
				<?=$booth['short_description']?>
				<?=$booth['short_description']?>
			</div></div>
		</div>
		
		<div class="booth-bottom booth-bottom-left col-xs-1">
			
		</div>
		
		<div class="booth-bottom booth-bottom-center col-xs-9">
			<h4><a href="<?=GetMainsiteUrl()?>booths/view/<?=$booth['id_base64'] . '/' . makeURLsafe($booth['title'])?>">
				<?=$booth['title']?>
			</a></h4>
			by <?=build_profile_link($booth['user']->username_styled,$booth['user']->uid)?>
		</div>
		
		<div class="booth-bottom booth-bottom-right col-xs-2">
			
		</div>
	</div>
<?php endforeach; ?>
</div>