CREATE TABLE <?=$prefix?>user_actions (
	id unsigned int primary key auto_increment not null,
	uid unsigned int,
	action varchar(255),
	time_done unsigned int
);