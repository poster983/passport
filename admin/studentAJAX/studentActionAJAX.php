<?
header('Content-Type: application/json');
session_start();
if(!isset($_SESSION['adminok']))
header("location: ../login.php");
$msg = "";
date_default_timezone_set('America/Chicago');
include "../../medooconnect.php";
/*

The MIT License (MIT)

Copyright (c) Sat January 28 2017 Joseph Hassell josephh2018@gmail.com

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
if($_POST['whatToDo'] == "ban") {
  if($_POST['action'] == "ban") {
    if(isset($_POST['banUntil'])) {
      //echo json_encode(array('status' => 'error', 'code' => '6001', 'stu1d' => $_POST['stuID']));
      $rowAff = $medooDB->update("studentaccount", array(
        "banned_until_date" => $_POST['banUntil']
      ), array(
        "id" => $_POST['stuID']
      ));
      if($rowAff > 0) {
        echo json_encode(array('status' => 'success', 'code' => '7001'));
      } else {
        echo json_encode(array('status' => 'warning', 'code' => '8002'));
      }
    } else {
      echo json_encode(array('status' => 'error', 'code' => '3002'));
    }
  } else if ($_POST['action'] == "unban") {
    $rowAff = $medooDB->update("studentaccount", array(
      "banned_until_date" => date( 'Y-m-d', strtotime(" today "))
    ), array(
      "id" => $_POST['stuID']
    ));
    if($rowAff > 0) {
      echo json_encode(array('status' => 'success', 'code' => '7001'));
    } else {
      echo json_encode(array('status' => 'warning', 'code' => '8002'));
    }
  } else {
    echo json_encode(array('status' => 'error', 'code' => '3003'));
  }
}
//echo json_encode(array('status' => 'success', 'code' => '601', 'banUntil' => $_POST['banUntil'], 'SendEmail' => $_POST['sendEmail'], 'EmailMessage' => $_POST['emailMessage']));
?>
