<?php
session_start();
include("adminconnect.php");

$msg = "";
$failshake = "";
$fadein = "animated fadeInDown";

if (isset($_POST['Submit'])) {
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$result = mysql_query("select * from admin where username='$username'", $link);
	
	if(mysql_num_rows($result) > 0) {
		$row = mysql_fetch_array($result, MYSQL_BOTH);
		if($password == $row["password"]) {
			session_regenerate_id();
			$_SESSION['adminok'] = "ok";
			$_SESSION['username'] = "username";
			$_SESSION['password'] = "password";
			header("Location: index.php");
		} else {
			$msg = "Password incorrect";
            $failshake = "animated wobble";
            $fadein = "";
		}
	} else {
		$msg = "Username incorrect";
        $failshake = "animated wobble";
        $fadein = "";
    }
}
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <html>


    <head>
        <title>Admin Dashboard Login</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="/css/animate.css" type="text/css" rel="stylesheet" media="screen,projection" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    </head>


    <body class="grey darken-4">
        <div class="containerlogin signin-allign">
            
            <div class="card-panel blue-teal <? echo $fadein; ?>">
            <form name="form1" method="post" action="">
                <h3 class="center">Admin Login</h3>
                <div class="card-panel <? echo $failshake; ?>">

                
                <div class="input-field">
                    <input name="username" type="text" id="username">
                    <label for="username">Username</label>
                </div>

                <div class="input-field">
                    <input name="password" type="password" id="password">
                    <label for="password">Password</label>
                </div>
                </div>
                <button class="btn waves-effect waves-light red darken-4" type="submit" name="Submit">Login
                    <i class="material-icons right">lock_open</i>
                </button>
            </form>
            </div>
        </div>


    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/js/materialize.js"></script>
    <script src="/js/init.js"></script>

    </html>