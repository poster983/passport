<?php
header('Content-Type: application/json');
include("common.php");
checklogin();
$msg = "";
date_default_timezone_set('America/Chicago');
include "../medooconnect.php";

/*
The MIT License (MIT)

Copyright (c) Wed Dec 28 2016 Joseph Hassell joseph@thehassellfamily.net

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
*/

/* internal error/info codes:
1xxx: Generic errors
2xxx: cred errors
3xxx: prosessing errors
5xxx: user error codes
6xxx: generic info codes
7xxx: success info codes
8xxx: warning info codes



"AJAX Error": 1001
"unknown error": 1111
"wrong creds": 2401
"Already Authed": 5001
"Debug Code": 6001
"Successful Transaction": 7001

*/
//echo json_encode(array('status' => 'debug', 'code' => '6001', 'content' => $_GET['id']));
$today = date( 'Y-m-d', strtotime(" today "));

if ($medooDB->has("passes", array(
  "AND" => array(
    "student_id" => $_GET['id'],
    "day_to_come" => $today,
    "isHere" => "0"
  )
)))
{
  $medooDB->update("passes", array(
    "isHere" => "1"
  ), array(
    "AND" => array(
      "student_id" => $_GET['id'],
      "day_to_come" => $today,
      "isHere" => "0"
  )));
	echo json_encode(array('status' => 'success', 'code' => '7001'));
}
else
{
  if ($medooDB->has("passes", array(
    "AND" => array(
      "student_id" => $_GET['id'],
      "day_to_come" => $today,
      "isHere" => "1"
    )
  ))) {
    echo json_encode(array('status' => 'error', 'code' => '5001'));
  } else {
    echo json_encode(array('status' => 'error', 'code' => '2401'));
  }

}

?>
