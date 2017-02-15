<?php
session_start();
include "adminconnect.php";

$msg = "";
$failshake = "";
$fadein = "animated fadeInDown";

if (isset($_POST['Submit'])) {
	$Uusername = $_POST['username'];
	$password = $conn->real_escape_string($_POST['password']);
  //echo "username: " . $username . " Password: " . $password . "  ";
  //mysqli_report(MYSQLI_REPORT_ERROR);
  //  #&@% Prepared statements!!!
	if ($stmt = $conn->prepare("SELECT id, firstname, lastname, email, password FROM admin WHERE username = ?")) {
    //echo "HI";
    /* bind parameters for markers */
   $stmt->bind_param("s", $Uusername);
   /* execute query */
    $stmt->execute();
    $stmt->store_result();

    /* bind result variables */
    $stmt->bind_result($aID, $aFN, $aLN, $aEM, $hashedPass);



	if($stmt->num_rows > "0") {
    while ($stmt->fetch()) {
      $hashedPass;
    }
		//echo "Hashed: " . $hashedPass . "_____ Un hashed " . crypt($password, $hashedPass);

		if(crypt($password, $hashedPass) == $hashedPass) {
			session_regenerate_id();
			$_SESSION['adminok'] = "ok";
			$_SESSION['adminID'] = $aID;
			$_SESSION['adminFirstName'] = $aFN;
			$_SESSION['adminLastName'] = $aLN;
			$_SESSION['adminEmail'] = $aEM;
			$_SESSION['password'] = "password";

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
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <html>


    <head>
        <title>Admin Dashboard Login</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="/passport/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="/passport/css/animate.css" type="text/css" rel="stylesheet" media="screen,projection" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
				<link rel="manifest" href="/passport/manifest.json">
		    <!--FavIcon-->

		    <link rel="shortcut icon" type="image/png" href="image/favicon.png"/>

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
