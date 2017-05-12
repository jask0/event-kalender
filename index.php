<?php
  require_once('calender/config.php');
  require_once('calender/'.$lang);


  $yearUp = false;
  $yearDown = false;
  if (isset($_REQUEST['m'])){
    # change the month because of the javascript month array [0..11]
    $m = intval($_REQUEST['m'])-1;
    if($m<0){
      $m=11;
      $yearDown = true;
    }
    if($m>11){
      $m=0;
      $yearUp = true;
    }
  } else {
    $m = date('n')-1;
  }
  if (isset($_REQUEST['y'])){
    $y = $_REQUEST['y'];
    if($yearUp){
      $y = intval($y)+1;
    }
    if($yearDown){
      $y = intval($y)-1;
    }
  } else {
    $y = date('Y');
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
    .calender {
      width:95%;
      margin:auto;
    }
  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body onLoad="loadCalender(<?=$y?>,<?=$m?>,<?=$d?>)">
<h2> Mein Kalender</h2>
<div class="calender">
    <table class="table table-bordered">
      <thead>
        <tr>
          <td><a id="previusMonth" href="?y=<?=$y?>&m=<?=$m?>"><<</a></td>
          <td><center><span id="selectedMonth"></span></center></td>
          <td><a id="nextMonth" href="?y=<?=$y?>&m=<?=($m+2)?>">>></a></td>
          <td></td>
          <td><a id="previusYear" href="?y=<?=($y-1)?>&m=<?=($m+1)?>"><<</a></td>
          <td><center><span id="selectedYear"><?=$y?></span></center></td>
          <td><a id="nextYear" href="?y=<?=($y+1)?>&m=<?=($m+1)?>">>></a></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?=$lg['MON']?></td>
          <td><?=$lg['TUE']?></td>
          <td><?=$lg['WED']?></td>
          <td><?=$lg['THU']?></td>
          <td><?=$lg['FRI']?></td>
          <td><?=$lg['SAT']?></td>
          <td><?=$lg['SUN']?></td>
        </tr>
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
        </tr>,
        <tr>
          <td id="d36"></td>
          <td id="d37"></td>
          <td id="d38"></td>
          <td id="d39"></td>
          <td id="d40"></td>
          <td id="d41"></td>
          <td id="d42"></td>
        </tr>
      </tbody>
    </table>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="eventInfo">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="info-title"><?=$lg['YOUR_EVENTS_AT']?> <span id="event_day"></span>.<span id="event_month"></span>.<?=$y?></h4>
       </div>
       <div class="modal-body" id="info-body">
         <span id="event-info"></span>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lg['CLOSE']?></button>
       </div>
   </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript" src="calender/js/calender.js"></script>
<script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
