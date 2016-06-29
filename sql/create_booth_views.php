DROP TABLE IF EXISTS <?=$prefix?>booth_views;
CREATE TABLE <?=$prefix?>booth_views (
	id int unsigned not null auto_increment primary key,
	booth_id int unsigned
);