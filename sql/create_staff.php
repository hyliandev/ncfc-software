DROP TABLE IF EXISTS <?=$prefix?>staff; 
CREATE TABLE <?=$prefix?>staff (
	uid int unsigned,
	title varchar(255),
	section int unsigned,
	precedence int
);