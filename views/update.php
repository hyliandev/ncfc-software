<div class="col-sm-12 nopadding">
	<div class="t2"><h3><?=$topic['title']?></h3></div>
</div>

<div class="row divtable">
	<div class="col-sm-3"><?=GetFileOutput('user_profile_short',Array(
		'user'=>$topic['user'],
		'string'=>'Posted '.$topic['date']
	))?></div>
	
	<div class="col-sm-9">
		<div class="t1 no-b nomargin">
			<?=$topic['message']?>
			
			<hr>
			
			<a href="<?=$_SETTINGS['forum_url']?>showthread.php?tid=<?=$topic['id']?>" target="_blank">
				<span class="fa fa-mail-forward"></span>
				<?=$topic['comments_count']?> Comment<?=$topic['comments_count']!=1 ? 's' : ''?>
			</a>
		</div>
	</div>
</div>