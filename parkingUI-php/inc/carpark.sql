CREATE DATABASE carpark;
CREATE TABLE user_info (
	user_id int(32) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	user_first varchar(256) not null,
	user_last varchar(256) not null,
	user_email varchar(256) not null,
	user_country varchar(256) not null,
	user_phone varchar(256) not null
);
CREATE TABLE users (
	user_email varchar(256) not null,
	user_uid varchar(256) not null,
	user_pwd varchar(256) not null
);