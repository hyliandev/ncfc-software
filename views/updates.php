<div class="t2"><h1>Updates</h1></div>

<div class="row divtable">

<div class="col-sm-3">
	<div class="t2 font">
		Random Booth
	</div>
</div>

<div class="col-sm-9">
	<?php foreach($topics as $topic): ?>
		<?=GetFileOutput('update',Array('topic'=>$topic))?>
	<?php endforeach; ?>
</div>

</div>