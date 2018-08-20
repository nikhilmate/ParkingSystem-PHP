CREATE TABLE regions_included (
	region_id int(32) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	region_name varchar(256) not null,
	region_floors int(32) not null
);
CREATE TABLE region1 (
	r1_id int(32) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	area_name varchar(256) not null,
	area_status varchar(256) not null,
	area_floor int(32) not null
);
CREATE TABLE region2 (
	r2_id int(32) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	area_name varchar(256) not null,
	area_status varchar(256) not null,
	area_floor int(32) not null
);
CREATE TABLE region3 (
	r3_id int(32) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	area_name varchar(256) not null,
	area_status varchar(256) not null,
	area_floor int(32) not null
);
CREATE TABLE area_occupied (
	o_id int(32) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	area_name varchar(256) not null,
	region_name varchar(256) not null,
	area_floor varchar(256) not null,
	user_first varchar(256) not null,
	user_last varchar(256) not null,
	user_email varchar(256) not null,
	vehicle_no varchar(256) not null,
	entry_time datetime not null,
	entry_from datetime not null,
	entry_to datetime not null,
	valid_upto datetime not null
);
