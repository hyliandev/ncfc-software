DROP TABLE IF EXISTS <?=$_SETTINGS['cms_table_prefix']?>staff_sections;
CREATE TABLE <?=$_SETTINGS['cms_table_prefix']?>staff_sections (
	id int unsigned primary key not null auto_increment,
	title varchar(255)
);