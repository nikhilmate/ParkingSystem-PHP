CREATE DATABASE carpark_admin;
CREATE TABLE admin_info (
	admin_id int(32) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	admin_first varchar(256) not null,
	admin_last varchar(256) not null,
	admin_email varchar(256) not null,
	admin_country varchar(256) not null,
	admin_phone varchar(256) not null
);
CREATE TABLE admin (
	admin_email varchar(256) not null,
	admin_uid varchar(256) not null,
	admin_pwd varchar(256) not null
);
CREATE TABLE regions_included (
	region_id int(32) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	region_name varchar(256) not null,
	region_floors int(32) not null
);
CREATE TABLE region1 (
	r_id int(32) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	area_name varchar(256) not null,
	area_status varchar(256) not null,
	area_floor int(32) not null
);
CREATE TABLE region2 (
	r_id int(32) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	area_name varchar(256) not null,
	area_status varchar(256) not null,
	area_floor int(32) not null
);
CREATE TABLE region3 (
	r_id int(32) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	area_name varchar(256) not null,
	area_status varchar(256) not null,
	area_floor int(32) not null
);
