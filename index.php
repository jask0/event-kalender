<?php
  if (isset($_REQUEST['y'])){
    $y = $_REQUEST['y'];
  } else {
    $y = 0;
  }
  if (isset($_REQUEST['m'])){
    # change the month because of the javascript month array [0..11]
    $m = $_REQUEST['m']-1;
  } else {
    $m = 0;
  }
  if (isset($_REQUEST['d'])){
    $d = $_REQUEST['d'];
  } else {
    $d = 0;
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>My First Calender</title>
  <style>
    td {
      text-align: center;
    }
    td > a {
      cursor: help;
    }
  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body onLoad="loadCalender(<?=$y?>,<?=$m?>,<?=$d?>)">

<h2>My Event Calender</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <td>Mo</td>
      <td>Di</td>
      <td>Mi</td>
      <td>Do</td>
      <td>Fr</td>
      <td>Sa</td>
      <td>So</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td id="d1"></td>
      <td id="d2"></td>
      <td id="d3"></td>
      <td id="d4"></td>
      <td id="d5"></td>
      <td id="d6"></td>
      <td id="d7"></td>
    </tr>
    <tr>
      <td id="d8"></td>
      <td id="d9"></td>
      <td id="d10"></td>
      <td id="d11"></td>
      <td id="d12"></td>
      <td id="d13"></td>
      <td id="d14"></td>
    </tr>
    <tr>
      <td id="d15"></td>
      <td id="d16"></td>
      <td id="d17"></td>
      <td id="d18"></td>
      <td id="d19"></td>
      <td id="d20"></td>
      <td id="d21"></td>
    </tr>
    <tr>
      <td id="d22"></td>
      <td id="d23"></td>
      <td id="d24"></td>
      <td id="d25"></td>
      <td id="d26"></td>
      <td id="d27"></td>
      <td id="d28"></td>
    </tr>
    <tr>
      <td id="d29"></td>
      <td id="d30"></td>
      <td id="d31"></td>
      <td id="d32"></td>
      <td id="d33"></td>
      <td id="d34"></td>
      <td id="d35"></td>
    </tr>
  </tbody>
</table>
<div class="modal fade" tabindex="-1" role="dialog" id="eventInfo">
 <div class="modal-dialog" role="document">
   <div class="modal-content" id="event-info">

   </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript" src="calender.js"></script>
<script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
