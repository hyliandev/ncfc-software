<div class="t2"><h1>Booths</h1></div>

<br>

<?php foreach($categories as $category): ?>
	<div class="t2"><h3><?=$category->title?></h3></div>
	<div class="row">
		<?php foreach($category->booths as $booth): ?>
			<!--<pre><?=print_r($booth,true)?></pre>-->
			<div class="col-xs-6 col-lg-4">
				<?=GetFileOutput('list_booth',Array('booth'=>$booth))?>
			</div>
		<?php endforeach; ?>
	</div>
<?php endforeach; ?>