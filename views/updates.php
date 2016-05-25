<div class="t2"><h1>Updates</h1></div>

<div class="row divtable">

<div class="col-sm-3">
	<div class="t2 font">
		Random Booth
	</div>
</div>

<div class="col-sm-9">
	<?php foreach($topics as $topic): ?>
		<div class="col-sm-12 nopadding">
			<div class="t2"><h3><?=$topic['title']?></h3></div>
		</div>
		
		<div class="row divtable">
			<div class="col-sm-3"><?=GetFileOutput('user_profile_short',Array(
				'user'=>$topic['user'],
				'string'=>'Posted '.$topic['date']
			))?></div>
			
			<div class="col-sm-9"><div class="t1 no-b">
				<?=$topic['message']?>
			</div></div>
		</div>
	<?php endforeach; ?>
</div>

</div>