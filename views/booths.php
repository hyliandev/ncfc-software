<div class="t2"><h1>Booths</h1></div>

<div class="row">
<?php foreach($booths as $booth): ?>
	<div class="col-xs-6 col-lg-4">
		<?=GetFileOutput('list_booth',Array('booth'=>$booth))?>
	</div>
<?php endforeach; ?>
</div>