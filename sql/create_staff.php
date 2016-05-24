DROP TABLE IF EXISTS <?=$_SETTINGS['cms_table_prefix']?>staff; 
CREATE TABLE <?=$_SETTINGS['cms_table_prefix']?>staff (
	uid int unsigned,
	title varchar(255),
	section int unsigned,
	precedence int
);