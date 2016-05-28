DROP TABLE IF EXISTS <?=$prefix?>booths;
CREATE TABLE <?=$prefix?>booths (
	id int unsigned not null auto_increment primary key,
	uid int unsigned,
	title varchar(255),
	short_description text,
	long_description text,
	booth_url text,
	category int unsigned,
	filename varchar(255)
);