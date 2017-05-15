<?php
require_once('connect.php');

$query = "CREATE TABLE eventcalender (
			id INT AUTO_INCREMENT ,
			year INT(4) NOT NULL ,
			month INT(2) NOT NULL ,
			day INT(2) NOT NULL ,
			starttime VARCHAR(5) NOT NULL ,
			stoptime VARCHAR(5) NOT NULL ,
			title VARCHAR(255) NOT NULL ,
			description TEXT NOT NULL ,
			url VARCHAR(255) NOT NULL ,
			PRIMARY KEY (id)) ENGINE = InnoDB;";

if ($result = mysqli_query($con, $query)) {
	$respond = "Table successful created!!!";
 }

if(isset($respond)){
	echo $respond;
}else {
	echo "Error: Please try again or check your connection data at config.php!!";
}
