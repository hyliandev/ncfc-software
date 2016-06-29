DROP TABLE IF EXISTS <?=$prefix?>booth_likes;
CREATE TABLE <?=$prefix?>booth_likes (
	id int unsigned not null auto_increment primary key,
	uid int unsigned,
	booth_id int unsigned
);