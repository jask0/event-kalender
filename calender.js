function loadCalender(y=0, m=0, selectedDay=0){
  nowDate = new Date();
  if (y === 0) {
    y = nowDate.getFullYear();
  }
  if (m === 0) {
    m = nowDate.getMonth();
  }
  var firstDate = new Date(y, m, 1).getDay();
  var days = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
  var month_length = [];
  curent_date =  nowDate.getDate()
  curent_month =  nowDate.getMonth()
  curent_year =  nowDate.getFullYear()
  for (i = 1; i <= 31; i++) {
    var d = new Date(y, m, i);
    var date =  d.getDate();

    var tdId = firstDate + i - 1;

    if (date in month_length){
      continue;
    }else{
      month_length.push(date);
      document.getElementById('d'+tdId).innerHTML = date;
      if (date == curent_date && m == curent_month && y == curent_year){
        document.getElementById('d'+tdId).style.color = "red";
        document.getElementById('d'+tdId).setAttribute("class", "success")
      }
      if (date == selectedDay){
        document.getElementById('d'+tdId).style.color = "orange";
        document.getElementById('d'+tdId).setAttribute("class", "danger")
      }
      showLink('d'+tdId, date, m, y)
    }
  }
}

function showLink(tdid, date, month, year) {
    /* change the month because of the javascript month array [0..11]*/
    month = month+1;
    if (tdid.length == 0) {
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200 && this.responseText !== "") {

                document.getElementById(tdid).innerHTML = '<a data-toggle="modal" data-target="#eventInfo" onClick="showEvent('+ date + ', ' + month + ', '+ year+')">'+ date + ' <span class="glyphicon glyphicon-tag" aria-hidden="true"></span></a>';
            }
        };
        xmlhttp.open("GET", "getevent.php?d=" + date + "&m=" + month + "&y=" + year);
        xmlhttp.send();
    }
}

function showEvent(day, month, year) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200 && this.responseText !== "") {
      document.getElementById('event-info').innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "getevent.php?d=" + day + "&m=" + month + "&y=" + year);
  xmlhttp.send();
}
