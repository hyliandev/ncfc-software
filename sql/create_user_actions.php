CREATE TABLE <?=$prefix?>user_actions (
	id int unsigned primary key auto_increment not null,
	uid int unsigned,
	action varchar(255),
	time_done int unsigned
);