# event-kalender

This calendar is based on javascript and php, and it uses mysql to storage the events.

To run it properly you have to modify the conf/config.php file, and set the
your login data right.

As for now, you must also create a table within your database by executing the 
SQL statement below:
CREATE TABLE `eventcalender` (
  `id` INT NULL AUTO_INCREMENT ,
  `year` INT(4) NOT NULL ,
  `month` INT(2) NOT NULL ,
  `day` INT(2) NOT NULL ,
  `time` VARCHAR(5) NOT NULL ,
  `title` VARCHAR(255) NOT NULL ,
  `description` TEXT NOT NULL ,
  PRIMARY KEY (`id`)) ENGINE = InnoDB;
