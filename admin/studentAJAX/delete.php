<?
header('Content-Type: application/json');
session_start();
if(!isset($_SESSION['adminok']))
{
header("location: ../login.php");
}
$msg = "";
date_default_timezone_set('America/Chicago');
include "../../medooconnect.php";
require '../../lib/plugins/PHPMailer/PHPMailerAutoload.php';

/*
The MIT License (MIT)

Copyright (c) Fri Apr 7 2017 Joseph Hassell josephh2018@gmail.com

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORTOR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
-->
*/

if($_SESSION['adminID'] == $_POST['adminIDConfirm']) {
	//never should be more than 1
	$safeCount = $medooDB->count("passes", array(
		"id" => $_POST['id']
	));
	if($safeCount != 1) {
		echo json_encode(array('status' => 'error', 'code' => '8002'));
		http_response_code (304);
	} else {
		$thisPass = $medooDB->select("passes", array(
			"firstname",
			"lastname",
			"email",
			"period",
			"place",
			"day_to_come"

		), array(
			"id" => $_POST['id']
		));

		foreach($thisPass as $row) {
			$fn = $row['firstname'];
			$ln = $row['lastname'];
			$passEmail = $row['email'];
			$passPer = $row['period'];
			$passPlace = $row['place'];
			$passDay = $row['day_to_come'];
		}
		$tallNUm = $medooDB->update("tally", array(
				"tally[-]" => 1
			), array(
				"AND" => array(
					"date" => $passDay,
					"period" => $passPer,
					"place" => $passPlace
				)
			));

		$delCount = $medooDB->delete("passes", array(
			"id" => $_POST['id']
		));
		if($delCount > 1){
			echo json_encode(array('status' => 'error', 'code' => '8003'));
		} else {
			echo json_encode(array('status' => 'success', 'code' => '7001', 'email' => emailStudent($passEmail, $fn, $ln, $passPlace, $passDay)));


		}
	}
} else {
	echo json_encode(array('status' => 'error', 'code' => '401'));
	http_response_code (401);

}


function emailStudent($eemail, $fname, $lname, $pla, $da) {
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

  $mail->Subject = 'Your Pass Has Been Cancelled';
  $mail->Body    = '<h1 style="text-align: center;">Hello ' . $fname . '</h1>
<br>
<img src="http://' . $_SERVER['HTTP_HOST'] . '/passport/image/passportLogo/icon-144x144.png" alt="Passport header" style="width:30%;height:30%;">
<br>
<h3 style="text-align: center;">Your ' . $pla . ' pass for: ' . $da . ', has been suspended.</h3>';
  $mail->AltBody = 'Your ' . $pla . ' pass for: ' . $da . ', has been suspended.';

  if(!$mail->send()) {
      $output = $mail->ErrorInfo;
  } else {
    $output =true;
  }
return $output;
}


?>
