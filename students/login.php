<?php
session_start();
include "../medooconnect.php";
$msg = "";
$failshake = "";
$fadein = "animated fadeInDown";
date_default_timezone_set('America/Chicago');

if (isset($_POST['Submit'])) {
	$Uemail = $_POST['email'];
	$password = $_POST['password'];



		if ($medooDB->has("studentaccount", array(
			"AND" => array(
				"email" => $Uemail,
				"archived" => 0
			)

		)))
		{
			$medoo = $medooDB->select("studentaccount", array(
				"id",
				"firstname",
				"lastname",
				"sh_period",
				"email_Verify_Status",
				"banned_until_date",
				"needsReset",
				"password"
			), array(
				"AND" => array(
					"email" => $Uemail,
					"archived" => 0
				)
			));


			foreach ($medoo as $row) {
				$accID = $row['id'];
				$firstName = $row['firstname'];
				$lastName = $row['lastname'];
				$shPeriod = $row['sh_period'];
				$emailVerStat = $row['email_Verify_Status'];
				$bannedUntilDate = $row['banned_until_date'];
				$needsReset = $row['needsReset'];
				$hashedPass = $row['password'];
			}
			//echo $accID;
			//echo $emailVerStat;
			//echo $bannedUntilDate;
			//echo $hashedPass;

		if(crypt($password, $hashedPass) == $hashedPass) {
			$bdateTempArr = explode('-', $bannedUntilDate);
			$banned_until_date_compare = date('Y-m-d', mktime(0, 0, 0, $bdateTempArr[1], $bdateTempArr[2], $bdateTempArr[0]));
			if ($banned_until_date_compare > date( 'Y-m-d', strtotime(" today "))) {
				$_SESSION['sFN'] = $firstName;
				$_SESSION['btD'] = $banned_until_date_compare;
				header("Location: banHammer.php");
			} else {
				session_regenerate_id();
				$_SESSION['studentok'] = "ok";
				$_SESSION['sFN'] = $firstName;
				$_SESSION['sLN'] = $lastName;
				$_SESSION['email'] = $Uemail;
				$_SESSION['period'] = $shPeriod;
				$_SESSION['studentAccID'] = $accID;
				if($emailVerStat == 0) {
					$_SESSION['messageFromLogin'] = "Please check your email for the confirmation email<br>If you did not get it, please contact your teacher.";
				}
				if($needsReset == 1) {
					$_SESSION['needsUpdate'] = 1;
					header("Location: account.php?updateWelcome=");
				} else {

					header("Location: ../index.php");
		      $msg = "Your in!";
				}
			}
		} else {
			$msg = "Email or Password incorrect";
            $failshake = "animated wobble";
            $fadein = "";
		}

	} else {
		$msg = "Email or Password incorrect";
        $failshake = "animated wobble";
        $fadein = "";
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
        <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="/passport/css/animate.css" type="text/css" rel="stylesheet" media="screen,projection" />
				<link rel="manifest" href="/passport/manifest.json">
				<!--FavIcon-->
				<link rel="shortcut icon" type="image/png" href="/passport/image/favicon.png"/>
				<!--Browser Colors-->
				<!-- Chrome, Firefox OS and Opera -->
				<meta name="theme-color" content="#F44336">
				<!-- Windows Phone -->
				<meta name="msapplication-navbutton-color" content="#F44336">
				<!-- iOS Safari -->
				<meta name="apple-mobile-web-app-capable" content="yes">
				<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
				<!--Let browser know website is optimized for mobile-->
				<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>


    <body class="blur-back">
			<div id="pwaSettings" style="display: none;">
				<div class="fixed-action-btn">
			    <a class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="left" data-delay="50" data-tooltip="Change Default Login">
			      <i class="large material-icons">settings_applications</i>
			    </a>
					<ul>
						<li><a onclick="switchLogin('1');" class="btn-floating red tooltipped" data-position="left" data-delay="50" data-tooltip="Student"><i class="material-icons">face</i></a></li>
						<li><a onclick="switchLogin('2');" class="btn-floating yellow darken-3 tooltipped" data-position="left" data-delay="50" data-tooltip="Teacher"><i class="material-icons">work</i></a></li>
						<li><a onclick="switchLogin('3');" class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Admin"><i class="material-icons">build</i></a></li>
						<li><a onclick="switchLogin('4');" class="btn-floating green tooltipped" data-position="left" data-delay="50" data-tooltip="Developer"><i class="material-icons">code</i></a></li>
			    </ul>
					</div>
				</div>
        <div class="containerlogin signin-allign">

            <div class="card-panel eagleBlood <? echo $fadein; ?>">
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
								<br>
								<div class="section">
								<a class="waves-effect waves-light btn" href="createAccount.php">Create An Account</a>
							</div>
            </form>
						<h6> <? echo $msg; ?> </h6>
            </div>
        </div>

    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/passport/js/materialize.js"></script>
		<script src="/passport/js/passport.js"></script>
    <script src="/passport/js/init.js"></script>
		<script>
		if(localStorage.getItem("pwaShowSetting") == "1") {
			$('#pwaSettings').show();
		}
		function switchLogin(whereTo) {
			switch (whereTo) {
        case "1":
          localStorage.setItem("pwaPref", whereTo);
					window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/index.php?pwa=1"
          break;
        case "2":
				localStorage.setItem("pwaPref", whereTo);
				window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/teacher/index.php?pwa=1"
          break;
        case "3":
				localStorage.setItem("pwaPref", whereTo);
				window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/admin/index.php?pwa=1"
          break;
        case "4":
				localStorage.setItem("pwaPref", whereTo);
				window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/locationLand.php"
          break;
        default:
        console.log("Nothing Selected");
      }
		}
		</script>
    </html>
