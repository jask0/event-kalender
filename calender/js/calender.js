var DAYS = ["Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag","Sonntag"];
var MONTHS = ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"];

function loadCalender(y, m, selectedDay=0){
  nowDate = new Date();
  if (y == 0) {
    y = nowDate.getFullYear();
  }
  if (m == 0) {
    m = nowDate.getMonth();
  }
  var firstDate = new Date(y, m, 1).getDay();
  if(firstDate == 0){
    firstDate=7;
  }

  var month_length = [];
  for (i = 1; i <= 31; i++) {
    var d = new Date(y, m, i);
    var date =  d.getDate();

    var tdId = firstDate + i - 1;

    document.getElementById('selectedMonth').innerHTML = MONTHS[m];
    document.getElementById('selectedMonth').setAttribute("value",m);
    if (date in month_length){
      continue;
    }else{
      month_length.push(date);
      document.getElementById('d'+tdId).innerHTML = date;
      if (date == nowDate.getDate() && m == nowDate.getMonth() && y == nowDate.getFullYear()){
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
        xmlhttp.open("GET", "calender/getevent.php?d=" + date + "&m=" + month + "&y=" + year);
        xmlhttp.send();
    }
}

function showEvent(day, month, year) {
  var xmlhttp = new XMLHttpRequest();
  var m = Number(document.getElementById('selectedMonth').getAttribute("value"));
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200 && this.responseText !== "") {
      document.getElementById('event_day').innerHTML = day;
      document.getElementById('event_month').innerHTML = MONTHS[m];
      document.getElementById('event-info').innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "calender/getevent.php?d=" + day + "&m=" + month + "&y=" + year);
  xmlhttp.send();
}

function getEvents(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200 && this.responseText !== "") {
      document.getElementById('eventRows').innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "./getevent.php?all=true");
  xmlhttp.send();

}

function editEvent(id){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    var resp = JSON.parse(this.responseText);
    if (this.readyState == 4 && this.status == 200 && this.responseText !== "") {
      document.getElementById('eventId').setAttribute("value", resp[0]);
      document.getElementById('inputYear').setAttribute("value", resp[1]);
      document.getElementById('inputMonth').setAttribute("value", resp[2]);
      document.getElementById('inputDay').setAttribute("value", resp[3]);
      document.getElementById('inputStartTime').setAttribute("value", resp[4]);
      document.getElementById('inputStopTime').setAttribute("value", resp[5]);
      document.getElementById('inputTitle').setAttribute("value", resp[6]);
      document.getElementById('inputDescription').innerHTML = resp[7];
      document.getElementById('inputLink').setAttribute("value", resp[8]);
    }
  };
  xmlhttp.open("GET", "./getevent.php?id="+id);
  xmlhttp.send();
}

function deleteEvent(id){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200 && this.responseText !== "") {
      getEvents();
    }
  };
  xmlhttp.open("GET", "./getevent.php?delete=true&id="+id);
  xmlhttp.send();
}
/*
function monthNavi() {
  var m = Number(document.getElementById('selectedMonth').getAttribute("value"));
  document.getElementById('previusMonth').setAttribute("href","?m="+(m));
  document.getElementById('nextMonth').setAttribute("href","?m="+(m+2));
}*/
