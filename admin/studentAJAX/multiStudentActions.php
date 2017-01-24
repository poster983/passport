<?
session_start();
if(!isset($_SESSION['adminok']))
header("location: ../login.php");
$msg = "";
date_default_timezone_set('America/Chicago');
include "../../medooconnect.php";
/*

The MIT License (MIT)

Copyright (c) Mon January 22 2017 Joseph Hassell josephh2018@gmail.com

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

if ($_POST['whatToDo'] == "update") {
  if ($_POST['action'] == "go") {
    //echo json_encode(array('status' => 'success', 'code' => '7001'));

    if($_POST['selector'] == 1) {
      $rowAff = $medooDB->update("studentaccount", array(
        "needsReset" => 1
      ), array(
        "AND" => array(
          "archived" => 0,
          "needsReset" => 0
        )
      ));
      if($rowAff > 0) {
        echo json_encode(array('status' => 'success', 'code' => '7001', 'rowsAff' => $rowAff));
      } else {
        echo json_encode(array('status' => 'warning', 'code' => '8002', 'rowsAff' => $rowAff));
      }
    } else if($_POST['selector'] >= 9 && $_POST['selector'] <= 12) {
      $rowAff = $medooDB->update("studentaccount", array(
        "needsReset" => 1
      ), array(
        "AND" => array(
          "archived" => 0,
          "needsReset" => 0,
          "student_year" => $_POST['selector']
        )
      ));
      if($rowAff > 0) {
        echo json_encode(array('status' => 'success', 'code' => '7001', 'rowsAff' => $rowAff));
      } else {
        echo json_encode(array('status' => 'warning', 'code' => '8002', 'rowsAff' => $rowAff));
      }
    }
  } else if($_POST['action'] == "restore") {
    if($_POST['selector'] == 1) {
      $rowAff = $medooDB->update("studentaccount", array(
        "needsReset" => 0
      ), array(
        "AND" => array(
          "archived" => 0,
          "needsReset" => 1
        )
      ));
      if($rowAff > 0) {
        echo json_encode(array('status' => 'success', 'code' => '7001', 'rowsAff' => $rowAff));
      } else {
        echo json_encode(array('status' => 'warning', 'code' => '8002', 'rowsAff' => $rowAff));
      }
    } else if($_POST['selector'] >= 9 && $_POST['selector'] <= 12) {
      $rowAff = $medooDB->update("studentaccount", array(
        "needsReset" => 0
      ), array(
        "AND" => array(
          "archived" => 0,
          "needsReset" => 1,
          "student_year" => $_POST['selector']
        )
      ));
      if($rowAff > 0) {
        echo json_encode(array('status' => 'success', 'code' => '7001', 'rowsAff' => $rowAff));
      } else {
        echo json_encode(array('status' => 'warning', 'code' => '8002', 'rowsAff' => $rowAff));
      }
    }
  } else {
    echo json_encode(array('status' => 'error', 'code' => '3003'));
  }
}

?>
