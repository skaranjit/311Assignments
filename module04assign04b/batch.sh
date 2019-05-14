#!/bin/bash
mysql -u karanjitsu -p ;
use karanjitsu_manageri;
show tables;
select * from pet;
select * from event;
select distinct species from pet;
