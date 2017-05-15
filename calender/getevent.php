<?php
require_once('connect.php');

$d = @$_REQUEST["d"];
$m = @$_REQUEST["m"];
$y = @$_REQUEST["y"];
$all = @$_REQUEST["all"];
$id = @$_REQUEST["id"];
$delete = @$_REQUEST["delete"];
$add = @$_REQUEST["add"];
$edit = @$_REQUEST["edit"];

$title = "";
$description = "";
$time = "";
$day = "";
$month = "";
$year = "";

if (isset($delete) && isset($id)) {
  $query = "DELETE FROM eventcalender
            WHERE id=$id;";
  // lookup all hints from array if $q is different from ""
  if ($result = mysqli_query($con, $query)) {
      $respond = "true";
  }

  if(isset($respond)){
    echo $respond;
  }

  return 0;

}

if (isset($add)) {
  $query = "SELECT * FROM eventcalender WHERE id=$id;";
  $respond = array();
  // lookup all hints from array if $q is different from ""
  if ($result = mysqli_query($con, $query)) {
      while ($row = mysqli_fetch_row($result)) {
        $respond = $row;
      }
      /* free result set */
      mysqli_free_result($result);
  }

  if(!empty($respond)){
    echo  json_encode($respond);
  }

  return 0;

}

if (isset($id) && !isset($edit)) {
  $query = "SELECT * FROM eventcalender WHERE id=$id;";
  $respond = array();
  // lookup all hints from array if $q is different from ""
  if ($result = mysqli_query($con, $query)) {
      while ($row = mysqli_fetch_row($result)) {
        $respond = $row;
      }
      /* free result set */
      mysqli_free_result($result);
  }

  if(!empty($respond)){
    echo  json_encode($respond);
  }

  return 0;

}

if(isset($all)){
  $respond = '';
  $query = "SELECT * FROM eventcalender ORDER BY id DESC;";

  // lookup all hints from array if $q is different from ""
  if ($result = mysqli_query($con, $query)) {
      while ($row = mysqli_fetch_row($result)) {
        $id = $row[0];
        $title = $row[6];
        $description = $row[7];
        $starttime = $row[4];
        $stoptime = $row[5];
        $day = $row[3];
        $month = $row[2];
        $year = $row[1];
        $link = $row[8];

        if ($link === ""){
          $link = "#";
          $target = "_self";
        } else {
          $target = "_blank";
        }

        $time = "";
        if($starttime != "") {
          $time = $starttime;
          if($stoptime != ""){
            $time .= " - ". $stoptime;
          }
        }
        if(strlen($description) >= 53){
    			$description = substr($description, 0, 49) . '...';
    		}
    		if(strlen($link) >= 43){
    			$link_text = substr($link, 0, 39) . '...';
    		} else {
    			$link_text = $link;
    		}

        $respond .= '<tr><td id="eventId_'.$id.'">'.$id.'</td>
                     <td>'.$title.'</td>
                     <td>'.$description.'</td>
                     <td>'.$day.'.'.$month.'.'.$year.' | '.$time.'</td>
                     <td><a href="'.$link.'" target="_blank">'.$link.'</a></td>
                     <td><a href="edit_event.php?id='.$id.'" class="btn btn-primary btn-xs">Edit</a>  <a onClick="deleteEvent('.$id.')" class="btn btn-danger btn-xs">Delete</a></td></tr>';
      }

      /* free result set */
      mysqli_free_result($result);

      if ($respond !='')
        echo $respond;

      return 0;
    }
}

if (isset($y) && isset($m) && isset($d)){
  $query = "SELECT * FROM eventcalender WHERE (year = $y) AND (month = $m) AND (day = $d);";
  #echo $query;
  $respond = '<div class="list-group">';

  // lookup all hints from array if $q is different from ""
  if ($result = mysqli_query($con, $query)) {
      while ($row = mysqli_fetch_row($result)) {
        $title = $row[6];
        $description = $row[7];
        $starttime = $row[4];
        $stoptime = $row[5];
        $day = $row[3];
        $month = $row[2];
        $year = $row[1];
        $link = $row[8];

        if ($link === ""){
          $link = "#";
          $target = "_self";
        } else {
          $target = "_blank";
        }

        $time = "";
        if($starttime != "") {
          $time = $starttime;
          if($stoptime != ""){
            $time .= " - ". $stoptime;
          }
        }

        $respond .= '<a href="'.$link.'" target="'.$target.'" class="list-group-item">
                      <h4 class="list-group-item-heading"><span class="badge">'.$time.'</span> '.$title.'</h4>
                      <p class="list-group-item-text">'.$description.'</p>
                    </a>';
      }

      /* free result set */
      mysqli_free_result($result);
  }



  if ($respond !='<div class="list-group">')
    echo $respond, "</div>";

  return 0;
}
?>
