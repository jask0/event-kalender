<?php
require_once('config.php');
require_once($lang);
# DO NOT CHANGE THE SCRIPT BELOW
$con = mysqli_connect($localhost, $username, $password, $database);

/* check connection */
if (mysqli_connect_errno()) {
    printf($lg['CONNECTION_FAILED'], mysqli_connect_error());
    exit();
}
