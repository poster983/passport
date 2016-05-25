<?php

session_start();
include("adminconnect.php");

$msg = "";

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
		}
	} else {
		$msg = "Username incorrect";
    }
}
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <html>

    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>

    <body>
        <h1>lijo.pw Admin Panel</h1>
        <form name="form1" method="post" action="">
            <p>Please enter correct username and password to login</p>
            <table border="0" align="center" cellpadding="1" cellspacing="1" bordercolor="#dedede">
                <tr>
                    <td colspan="2">Admin Login</td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input name="username" type="text" id="username">
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input name="password" type="password" id="password">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="Submit" value="Submit">
                    </td>
                </tr>
            </table>
    </body>

    </html>