<?php

/*
	MyBB barebones template
	
	$headerinlude includes all of the stuff for <head>
	CSS, JavaScript, favicon, etc
	
	$title is the title of the page. Part of the mainsite
	
	$header is the first half of the HTML template
	Banner image, login/user panel, etc
	
	$yield is the actual page content. Part of the mainsite
	
	$footer is the second half of the HTML template
	Copyright notice, bottom links, etc
*/

?><!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$_SETTINGS['final_page_title']?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<?=$headerinclude?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=GetMainsiteUrl()?>files/theme/style.css">

<script type="text/javascript" src="<?=GetMainsiteUrl()?>files/theme/script.js"></script>

</head>

<body>
<?=$header?>

<!-- DELETE ME LATER -->
<?php foreach(scandir($_SETTINGS['controller_directory']) as $controller): ?>
	<?php if(substr($controller,-4)=='.php'): $controller=substr($controller,0,strlen($controller)-4); ?>
		<a href="<?=GetMainsiteUrl() . $controller ?>"><?=strtoupper($controller)?></a>
	<?php endif; ?>
<?php endforeach; ?>
<!-- END DELETE ME LATER -->

<?php foreach($_SETTINGS['alerts'] as $class=>$alert_group): ?>
	<?php foreach($alert_group as $alert): ?>
		<div class="alert alert-<?=$class?>">
			<?=$alert?>
			<a href="#">&times;</a>
		</div>
	<?php endforeach; ?>
<?php endforeach; ?>

<?=$yield?>
<?=$footer?>
<noscript class="alert-warning">The site works better with JavaScript!</noscript>
</body>

</html>