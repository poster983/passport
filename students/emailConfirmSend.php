<?php
  include "../medooconnect.php";
  date_default_timezone_set('America/Chicago');

  require '../lib/plugins/PHPMailer/PHPMailerAutoload.php';


function emailConfirm($eemail, $fname, $lname, $verID, $verCrypt) {
  global $output;
  global $emailSMTPHostServers;
  global $emailSMTPUsername;
  global $emailSuperSecretSpecialPassword;
  global $emailSMTPEncryption;
  global $emailSMTPEncryptionPORT;
  global $emailDefaultSentFromEmail;
  global $emailDefaultSentFromName;
  $mail = new PHPMailer;
  $mail->SMTPDebug = 0;
  $mail->Debugoutput = 'html';
  $mail->isSMTP();

  $mail->Host = $emailSMTPHostServers;
  $mail->SMTPAuth = true;
  $mail->Username = $emailSMTPUsername;
  $mail->Password = $emailSuperSecretSpecialPassword;
  $mail->SMTPSecure = $emailSMTPEncryption;
  $mail->Port = $emailSMTPEncryptionPORT;

  $mail->setFrom($emailDefaultSentFromEmail, $emailDefaultSentFromName);


  $mail->addAddress($eemail, $fname . $lname);
  //$mail->addReplyTo($emailSMTPReplyEMAIL, $emailSMTPReplyNAME);


  $mail->isHTML(true);

  $mail->Subject = 'Passport Account Confirmation Email';
  $mail->Body    = '<img src="http://' . $_SERVER['HTTP_HOST'] . '/passport/image/passportLogo/icon-144x144.png" alt="Passport header" style="width:10%;height:10%;">
<br>
<h1 style="text-align: center;">Hello ' . $fname . '</h1>
<br>
<h3 style="text-align: center;">Lets activate your new Passport account.</h3>
<center>
<div style="margin: 0 auto;"><!--[if mso]>
 <v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:50px;v-text-anchor:middle;width:250px;" arcsize="16%" strokecolor="#F44336" fill="t">
    <v:fill type="tile" src="" color="#F44336" />
    <w:anchorlock/>
    <center style="color:#ffffff;font-family:sans-serif;font-size:18px;font-weight:bold;">Click the Button!</center>
  </v:rect>
<![endif]-->
<div style="margin: 0 auto;mso-hide:all;">
<table align="center" cellpadding="0" cellspacing="0" height="50" width="250" style="margin: 0 auto; mso-hide:all;">
	<tbody>
		<tr>
			<td align="center" bgcolor="#F44336" height="50" style="vertical-align:middle;color: #ffffff; display: block;background-color:#F44336;background-image:url();border:1px solid #ed7014;mso-hide:all;" width="250">
				<a class="cta_button" href="http://' . $_SERVER['HTTP_HOST'] . '/passport/students/verifyEmail.php?vID=' . $verID . '&verCrypt=' . $verCrypt . '" style="font-size:16px;-webkit-text-size-adjust:none; font-weight: bold; font-family:sans-serif; text-decoration: none; line-height:50px; width:250px; display:inline-block;" title="CLICK THE BUTTON!">
					<span style="color:#ffffff">Activate Your Account!</span>
				</a>
			</td>
		</tr>
	</tbody>
</table>
</div>
</div>
</center>';
  $mail->AltBody = 'Lets activate your new Passport account ' . $fname . '  Go Here: http://' . $_SERVER['HTTP_HOST'] . '/passport/students/verifyEmail.php?vID=' . $verID . '&verCrypt=' . $verCrypt . '';

  if(!$mail->send()) {
      $output = "Message could not be sent. <br> Mailer Error: " . $mail->ErrorInfo . "<br> Please try to login <a href='login.php'>HERE</a> and Passport will try to resend the email";
  } else {
    $output ="<h5 class='center'>Almost done!</h5>
    <h5 class='center'>We sent you a confirmation email!* Please click on the link in the email.</h5>
    <p>*Remember to check spam</p>";
  }
}

  $emptyError = "";
  $output = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
    $emptyError = $emptyError . " First Name is required <br>";
  } else {
    $firstname = $_POST["firstname"];
  }
  if (empty($_POST["lastname"])) {
  $emptyError = $emptyError . " Last Name is required <br>";
  } else {
    $lastname = $_POST["lastname"];
  }
  if (empty($_POST["email"])) {
    $emptyError = $emptyError . " Email is required <br>";
  } else {
    if ($signUpDomainEmailEnding != "") {
    if(strrpos($_POST["email"], $signUpDomainEmailEnding) === false) {
      $emptyError = $emptyError . " Email " . $signUpDomainEmailEnding . " domain is required <br>";
    } else {
      if ($medooDB->has("studentaccount", array("AND" => array(
        "email" => $_POST["email"]
      )))) {
        $emptyError = $emptyError . "Someone has already created an account with that email.  <br>  Please Contact IT or the appropriate person if this was not you";
      } else {
      $email = $_POST["email"];
    }
    }
  } else {
    if(strrpos($_POST["email"], "@") === false) {
      $emptyError = $emptyError . " Email is required <br>";
    } else {
    $email = $_POST["email"];
  }
  }
  }
  if (empty($_POST["studentID"])) {
    $emptyError = $emptyError . " Student ID is required <br>";
  } else {
    $studentID = $_POST["studentID"];
  }
  if (empty($_POST["password1"])) {
    $emptyError = $emptyError . " Password is required <br>";
  } else {
    if($_POST["password1"] === $_POST['password2']) {
      $password = $_POST["password1"];
    } else {
      $emptyError = $emptyError . " Passwords Must Math <br>";
    }
  }
  if (empty($_POST["stYear"])) {
    $emptyError = $emptyError . " Class is required <br>";
  } else {
    $class = $_POST["stYear"];
  }
  if (empty($_POST["shPeriod"])) {
    $emptyError = $emptyError . " Study Hall Period is required <br>";
  } else {
    $period = $_POST["shPeriod"];
  }
  if (empty($_POST["teacher"])) {
    $emptyError = $emptyError . " Teacher is required <br>";
  } else {
    $teacher = $_POST["teacher"];
  }

    if ($emptyError == "") {
      $salt = '$2a$10$' . rand() . $studentID . rand() . rand() . '$';
      $hashedPass = crypt($password, $salt);
      if ($hashedPass == '*0') {

        $output = "<h5 class='center'>There was an error encrypting your password</h5> <h5 class='center'>Please try again.</h5>";
      } else {
        //insert account
      $insertNewAccount = $medooDB->insert("studentaccount", array(
      	"firstname" => $firstname,
      	"lastname" => $lastname,
        "email" => $email,
        "student_id" => $studentID,
        "sh_period" => $period,
        "sh_teacher_ID" => $teacher,
        "student_year" => $class,
        "password" => $hashedPass
      ));
      echo $insertNewAccount;
      $verifyCrypt = crypt(rand(), $salt);
      $accountVerify = $medooDB->insert("studentaccountverify", array(
      	"studentaccountID" => $insertNewAccount,
      	"UniquekeyVal" => $verifyCrypt
      ));
      emailConfirm($email, $firstname, $lastname, $accountVerify, $verifyCrypt);



    }
    } else {
      $output = "<h5 class='center'>There was an error</h5> <h5 class='center'>Please try again.</h5>
      <p>" . $emptyError . "</p>";
    }
}
?>

<!--
The MIT License (MIT)

Copyright (c) Friday November 11 2016 Joseph Hassell joseph@thehassellfamily.net

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
    <title>Sign Up</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/animate.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


</head>


<body class="blur-back">

    <div class="containerlogin signup-allign">

        <div id="mainCard" class="card-panel animated fadeInDown">

    <div class="container">
      <div class="row">
        <form class="col s12" method="post" id="signUpForm" action="">
            <h4 class="center">Sign Up For Passport</h4>
            <?php echo $output; ?>




            <div class="progress">
              <div class="determinate" style="width: 100%"></div>
            </div>
        </form>
    </div>
  </div>
</div>
</div>


</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="/passport/js/materialize.js"></script>
<script src="/passport/js/init.js"></script>


</html>
