<?php
session_start();
require_once('config.php');
require_once($lang);

$info = '<p class="alert alert-success">'.$lg['YOU_ARE_ALREDY_LOGED_IN'].'</p><br>';
$info .= '<center><a class="btn btn-success" href="index.php">'.$lg['ADMIN_AREA'].'</a>  <a class="btn btn-danger" href="login.php?logout=1">'.$lg['LOGOUT'].'</a></center>';
if(isset($_GET['logout']) && $_GET['logout'] == 1) {
	if(isset($_COOKIE[session_name()])):
		unset($_COOKIE[session_name()]);
        setcookie(session_name(), null, -1, '/');
    endif;

	if(isset($_COOKIE['username'])){
		unset($_COOKIE['username']);
		setcookie('username', null, -1, '/');
	}
	header('Location: login.php');
}

if($_POST){

	if(($admin == $_POST['username']) and ($pwd == $_POST['password'])){
		$_SESSION['username'] = $admin;
		if(isset($_POST['cookie'])){
			setcookie("username",session_id(),time() + (86400*10), "/"); // = 10 Days
		}
		$info = '<p class="alert alert-success">'.$l['LOGIN_SUCCESSFUL'].'<br><b><a href="../kalender.php">'.$lg['TO_CALENDER'].'</a><b></p>';
		$info .= '<center><a class="btn btn-success" href="index.php">'.$lg['ADMIN_AREA'].'</a>   <a class="btn btn-danger" href="login.php?logout=1">'.$lg['LOGOUT'].'</a></center>';
	} else {
		$info = $lg['LOGIN_FAILED'].'<br><b>'.$lg['PLEASE_TRY_AGAIN'].'</b></p>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<!-- Font-Awesome CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Extern Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" >

</head>
<body>
<br><br><br><br>
   <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?=$lg['LOGIN_FORM']?></h3>
                    </div>
                    <div class="panel-body">
						<?php if (!isset($_SESSION['username'])) {
							if($_POST){
								echo $info;
							}
						?>
                        <form role="form" action="login.php" method="post" >
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="<?=$lg['USERNAME']?>" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="<?=$lg['PASSWORD']?>" name="password" type="password">
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
								<button type="submit" class="btn btn-lg btn-success btn-block"><?=$lg['LOGIN']?></button>
                            </fieldset>
                        </form>
						<?php } else {
							echo $info;
						} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
