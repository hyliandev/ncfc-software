DROP TABLE IF EXISTS <?=$prefix?>booth_categories;
CREATE TABLE <?=$prefix?>booth_categories (
	id int unsigned not null auto_increment primary key,
	title varchar(255)
);