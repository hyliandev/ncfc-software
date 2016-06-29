<div class="t2"><h1><?=$booth['title']?></h1></div>

<div class="row">
	<div class="col-sm-4">
		<img src="<?=GetMainsiteUrl()?>files/booths/<?=$booth['id_base64']?>/thumbnail.png"
		id="big-thumbnail" class="big-thumbnail">
	</div>
	
	<div class="col-sm-8">
		<div class="t1 no-b">
			<h3><?=$booth['short_description']?></h3>
			<hr>
			<h4>
				<span class="nowrap">
					<img src="<?=GetMainsiteUrl()?>files/theme/mario.png" class="size-icon">&nbsp;
					Mario
				</span>
				&nbsp;
				<span class="nowrap" id="booth-likes">
					<a href="<?=GetMainsiteUrl()?>booths/like/<?=$booth['id_base64']?>" data-show-like-text
					class="like-booth"><span class="fa fa-star<?=$booth['has_liked'] > 0 ? '' : '-o'?>"></span></a>&nbsp;
					<span class="like-count"><?=$booth['likes']?> Like<?=$booth['likes']==1?'':'s'?></span>
				</span>
				&nbsp;
				<span class="nowrap">
					<span class="fa fa-eye"></span>&nbsp;
					<?=$booth['views']?> View<?=$booth['views']==1?'':'s'?>
				</span>
				&nbsp;
				<span class="nowrap">
					<span class="fa fa-download"></span>&nbsp;
					0 Downloads
				</span>
			</h4>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="t1 no-b download-bar"><div class="row">
			<div class="col-xs-6 center">
				<a class="btn btn-success download-button"
				href="<?=GetMainsiteUrl()?>booths/download/<?=$booth['id_base64']?>">
					<span class="fa fa-download"></span>
					Download
				</a>
			</div>
			
			<div class="col-xs-6 center" style="padding:0.25em;">
				<span class="fa fa-file-archive-o"></span>&nbsp;
				<span class="fa fa-windows"></span>&nbsp;
				<?=$booth['file_size']?>
			</div>
		</div></div>
	</div>
	
	<div class="col-sm-12"><div class="t1 no-b">
		<?php $i=0; while(true): ?>
			<img class="small-thumb"
			src="<?=GetMainsiteUrl()?>files/booths/<?=$booth['id_base64']?>/<?=(
				$i==0?'thumbnail.png':'screen_'.$i.'.png'
			)?>">
			<?php $i++;
			if(!file_exists('./files/booths/'.$booth['id_base64'].'/screen_'.$i.'.png')) break;
		endwhile; ?>
	</div></div>
</div>

<hr>

<div class="row">
	<div class="col-sm-6"><div class="t1 controls">
		<h3>Controls</h3>
		<br>
		<h4>
			<span class="fa fa-keyboard-o"></span>
			Keyboard
		</h4>
		<div class="row">
			<div class="col-xs-4">
				<strong>Run:</strong> A
			</div>
			<div class="col-xs-4">
				<strong>Run:</strong> A
			</div>
			<div class="col-xs-4">
				<strong>Run:</strong> A
			</div>
			<div class="col-xs-4">
				<strong>Run:</strong> A
			</div>
			<div class="col-xs-4">
				<strong>Run:</strong> A
			</div>
			<div class="col-xs-4">
				<strong>Run:</strong> A
			</div>
		</div>
		
		<h4>
			<span class="fa fa-gamepad"></span>
			Gamepad
		</h4>
		<div class="row">
			<div class="col-xs-4">
				<strong>Run:</strong> A
			</div>
			<div class="col-xs-4">
				<strong>Run:</strong> A
			</div>
			<div class="col-xs-4">
				<strong>Run:</strong> A
			</div>
			<div class="col-xs-4">
				<strong>Run:</strong> A
			</div>
			<div class="col-xs-4">
				<strong>Run:</strong> A
			</div>
			<div class="col-xs-4">
				<strong>Run:</strong> A
			</div>
		</div>
	</div></div>
	
	<div class="col-sm-6"><div class="t1 no-b">
		<?=nl2br($booth['long_description'])?>
	</div></div>
</div>