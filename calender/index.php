<?php
  require_once('config.php');
  require_once($lang);
?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Events</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <style>
      body {
        padding-top: 50px;
      }
      .starter-template {
        padding: 40px 15px;
        text-align: center;
      }
    </style>
  </head>

  <body onLoad="getEvents()">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><?=$lg['EVENT_CALENDER']?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#" data-toggle="modal" data-target="#addEvent"><?=$lg['ADD_EVENT']?></a></li>
            <li><a href="#about"></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>Termine im Überblick</h1>
        <table class="table table-bordered">
           <thead>
             <tr>
               <th>#</th>
               <th>Event Title</th>
               <th>Description</th>
               <th>Event Time</th>
               <th>URL</th>
               <th></th>
             </tr>
           </thead>
           <tbody id="eventRows">

           </tbody>
        </table>
      </div>

    </div><!-- /.container -->


    <div class="modal fade" tabindex="-1" role="dialog" id="addEvent">
     <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <h4 class="modal-title" id="info-title"><?=$lg['ADD_EVENT']?></h4>
           </div>
           <div class="modal-body" id="info-body">
             <form class="form-horizontal">
               <div class="form-group">
                 <label for="inputDay" class="col-sm-2 control-label">Day</label>
                 <div class="col-sm-2">
                   <input type="number" min="1" max="31" class="form-control" id="inputDay" value="<?=date('d')?>">
                 </div>
                 <label for="inputMonth" class="col-sm-2 control-label">Month</label>
                 <div class="col-sm-2">
                   <input type="number" min="1" max="12" class="form-control" id="inputMonth" value="<?=date('n')?>">
                 </div>
                 <label for="inputYear" class="col-sm-2 control-label" >Year</label>
                 <div class="col-sm-2">
                   <input type="number" length="4" class="form-control" id="inputYear" value="<?=date('Y')?>" required>
                 </div>
               </div>
               <div class="form-group">
                 <label for="inputStartTime" class="col-sm-2 control-label" >Start Time</label>
                 <div class="col-sm-4">
                   <input type="text" length="5" class="form-control" id="inputStartTime" value="<?=date('H:m')?>">
                 </div>
                 <label for="inputStopTime" class="col-sm-2 control-label" >Stop Time</label>
                 <div class="col-sm-4">
                   <input type="text" length="5" class="form-control" id="inputStopTime" value="<?=date('H:m')?>">
                 </div>
               </div>
               <div class="form-group">
                 <label for="inputTitle" class="col-sm-2 control-label" >Event title</label>
                 <div class="col-sm-10">
                   <input type="text" length="255" class="form-control" id="inputTitle" placeholder="Event title" required>
                 </div>
               </div>
               <div class="form-group">
                 <label for="inputLink" class="col-sm-2 control-label" >Link to more info</label>
                 <div class="col-sm-10">
                   <input type="url" length="255" class="form-control" id="inputLink" placeholder="https://">
                 </div>
               </div>
               <div class="form-group">
                 <label for="inputDescription" class="col-sm-2 control-label" >Event description</label>
                 <div class="col-sm-10">
                   <textarea type="text" class="form-control" id="inputDescription" placeholder="Event description"></textarea>
                 </div>
               </div>
               <div class="form-group">
                 <div class="col-sm-offset-2 col-sm-10" style="text-align:right;">
                   <button type="submit" class="btn btn-success">Save</button>
                 </div>
               </div>
             </form>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lg['CLOSE']?></button>
           </div>
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script type="text/javascript" src="js/calender.js"></script>
    <script
    			  src="https://code.jquery.com/jquery-3.2.1.min.js"
    			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    			  crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>
