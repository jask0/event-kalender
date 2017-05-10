<?php
  # CHANGE YOUR LOGIN DATA HERE
  $localhost = "localhost";
  $username = "root";
  $password = "";
  $database = "test";

  # DO NOT CHANGE THE SCRIPT BELOW
  $con = mysqli_connect($localhost, $username, $password, $database);

  /* check connection */
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
?>
