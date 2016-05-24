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
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<style type="text/css">
/*
	I copied this right from NCFC's old CSS lololol
*/
@font-face 
{
	font-family: GameCube;
	src: url('<?=GetMainsiteUrl()?>files/theme/GameCube.ttf');
}

.alert a {
	text-decoration:none;
	float:right;
}

table {
	border-collapse:initial;
}

noscript.alert-warning {
	display:block;
	padding:0.5em;
}

div.t1.no-b {
	border-width:0px;
	text-align:left;
}

div.t2 {
	height:initial !important;
	max-height:initial;
	margin-left:0;
	font-size:1em;
}

div.t2.font {
	font-family:inherit;
}

.row.divtable .col-sm-1,
.row.divtable .col-sm-2,
.row.divtable .col-sm-3,
.row.divtable .col-sm-4,
.row.divtable .col-sm-5,
.row.divtable .col-sm-6,
.row.divtable .col-sm-7,
.row.divtable .col-sm-8,
.row.divtable .col-sm-9,
.row.divtable .col-sm-10,
.row.divtable .col-sm-11,
.row.divtable .col-sm-12 {
	padding:0.5em;
}

#container {
	padding-top:0px;
}

h1, h2, h3, h4, h5, h6 {
	margin:0;
}

.center {
	text-align:center !important;
}

.t2 h1 {
	text-align:center;
}

.row {
	padding:1em;
}

.nopadding {
	padding:0 !important;
}

p.paragraph {
	padding:1em;
}
</style>

<script type="text/javascript">
$=jQuery.noConflict();

$(document).ready(function(){
	$('.alert a').click(function(e){
		e.preventDefault();
		$(this).parent().hide(200);
	});
});
</script>

</head>

<body>
<?=$header?>

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