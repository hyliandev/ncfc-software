DROP TABLE IF EXISTS <?=$prefix?>staff_sections;
CREATE TABLE <?=$prefix?>staff_sections (
	id int unsigned primary key not null auto_increment,
	title varchar(255)
);