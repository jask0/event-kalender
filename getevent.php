<?php
require_once('conf/config.php');

$d = @$_REQUEST["d"];
$m = @$_REQUEST["m"];
$y = @$_REQUEST["y"];

$query = "SELECT * FROM eventcalender WHERE (year = $y) AND (month = $m) AND (day = $d);";
#echo $query;

$title = "";
$description = "";
$time = "";
$day = "";
$month = "";
$year = "";

// lookup all hints from array if $q is different from ""
if ($result = mysqli_query($con, $query)) {
    while ($row = mysqli_fetch_row($result)) {
      $title = $row[5];
      $description = $row[6];
      $time = $row[4];
      $day = $row[3];
      $month = $row[2];
      $year = $row[1];
    }
    /* free result set */
    mysqli_free_result($result);
}

// Output "no suggestion" if no hint was found or output correct values
if ($description !== "") {
  echo '<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="info-title">'. $title .'</h4>
  </div>
  <div class="modal-body" id="info-body">
    '.$description.'
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Schlißen</button>
  </div>';
}

?>
