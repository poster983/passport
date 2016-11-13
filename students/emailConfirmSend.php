<?php
  include "../medooconnect.php";
  date_default_timezone_set('America/Chicago');
  require '../lib/plugins/PHPMailer/PHPMailerAutoload.php';

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


  $mail->addAddress('no-reply@josephhassell.com', 'Joseph');
  //$mail->addReplyTo($emailSMTPReplyEMAIL, $emailSMTPReplyNAME);

  //http://www.emailonacid.com/images/orange_btn_bg.jpg
  $mail->isHTML(true);

  $mail->Subject = 'Passport Account Confirmation Email';
  $mail->Body    = '<h1 style="text-align: center;">Hello!</h1>
<br>
<img src="https://github.com/poster983/passport/blob/gh-pages/images/PassportHeader.png?raw=true" alt="Passport header" style="width:100%;height:100%;">
<br>
<h3 style="text-align: center;"> Lets activate your new Passport account {firstName} </h3>
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
				<a class="cta_button" href="http://www.josephhassell.com" style="font-size:16px;-webkit-text-size-adjust:none; font-weight: bold; font-family:sans-serif; text-decoration: none; line-height:50px; width:250px; display:inline-block;" title="CLICK THE BUTTON!">
					<span style="color:#ffffff">Activate Your Account!</span>
				</a>
			</td>
		</tr>
	</tbody>
</table>
</div>
</div>
</center>';
  $mail->AltBody = 'Lets activate your new Passport account {firstName}  Go Here: josephhassell.com';

  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message has been sent';
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
            <h5 class="center">Almost done!</h5>
            <h5 class="center">We sent you a confirmation email!* Please click on the link in the email.</h5>
            <p>*Remember to check spam</p>




            <div class="progress">
              <div class="determinate" style="width: 100%"></div>
            </div>
            <p>You may now close this tab</p>
        </form>
    </div>
  </div>
</div>
</div>


</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="/passport/js/materialize.js"></script>
<script src="/passport/js/init.js"></script>
<script>

</script>

</html>
