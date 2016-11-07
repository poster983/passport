<?php
session_start();
include "adminconnect.php";
$msg = "";
$failshake = "";
$fadein = "animated fadeInDown";
if (isset($_POST['Submit'])) {
	$Uemail = $_POST['email'];
	$password = $conn->real_escape_string($_POST['password']);
  //echo "username: " . $username . " Password: " . $password . "  ";
  //mysqli_report(MYSQLI_REPORT_ERROR);
  //  #&@% Prepared statements!!!
	if ($stmt = $conn->prepare("SELECT id, email_Verify_Status, banned_until_date, password, archived FROM studentaccount WHERE email = ?")) {
    //echo "HI";
    /* bind parameters for markers */
   $stmt->bind_param("s", $Uemail);
   /* execute query */
    $stmt->execute();
    $stmt->store_result();
    /* bind result variables */
    $stmt->bind_result($accID, $isEmailVerified, $aBannedDate, $hashedPass, $accountIsArchived);
	if($stmt->num_rows > "0") {
    while ($stmt->fetch()) {
	$accID;
	$isEmailVerified;
	$aBannedDate;
      	$hashedPass;
	$accountIsArchived;
    }
		//echo "Hashed: " . $hashedPass . "_____ Un hashed " . crypt($password, $hashedPass);
		if(crypt($password, $hashedPass) == $hashedPass) {
			session_regenerate_id();
			$_SESSION['studentok'] = "ok";
			$_SESSION['studentAccID'] = $accID;
			
			
			header("Location: index.php");
      $msg = "Your in!";
		} else {
			$msg = "Username or Password incorrect";
            $failshake = "animated wobble";
            $fadein = "";
		}
	} else {
		$msg = "Username or Password incorrect";
        $failshake = "animated wobble";
        $fadein = "";
    }
    $stmt->close();
} else {
	echo "NOPE";
}
}
?>
<!-- 
The MIT License (MIT)

Copyright (c) Monday November 7 2016 Joseph Hassell joseph@thehassellfamily.net

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
-->
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <html>


    <head>
        <title>Student Login</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="/passport/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="/passport/css/animate.css" type="text/css" rel="stylesheet" media="screen,projection" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    </head>


    <body class="blur-back">

        <div class="containerlogin signin-allign">

            <div class="card-panel blue-teal <? echo $fadein; ?>">
            <form name="form1" method="post" action="">
                <h3 class="center">Welcome To Passport</h3>
                <div class="card-panel <? echo $failshake; ?>">


                <div class="input-field">
                    <input name="email" type="email" id="email">
                    <label for="email">Email</label>
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
						<h6> <? echo $msg; ?> </h6>
            </div>
        </div>


    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/passport/js/materialize.js"></script>
    <script src="/passport/js/init.js"></script>

    </html>
