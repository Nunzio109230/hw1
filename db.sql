Create DATABASE login_db;
USE login_db;

CREATE TABLE users(
	namee varchar(255) not null,
	surname varchar(255) not null,
	username varchar(255) not null,
	email varchar(255) not null,
	pass varchar(255) not null,
	data_nascita varchar(10) not null,
    img varchar(255)
);



CREATE TABLE like_album (
    id integer primary key auto_increment,
    username varchar(255) not null,
    album varchar(255) not null,
    artist varchar(255) not null,
    img varchar(255) not null,
    playcount int not null
) Engine = InnoDB;