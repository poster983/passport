<?
header('Content-Type: application/json');
session_start();
if(!isset($_SESSION['studentok']))
header("location: ../login.php");
$msg = "";
date_default_timezone_set('America/Chicago');
include "../../medooconnect.php";



/*

The MIT License (MIT)

Copyright (c) 2017 Joseph Hassell josephh2018@gmail.com

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
if (!isset($_SESSION['studentAccID'])) {
  echo json_encode(array('status' => 'error', 'code' => '2401'));
} else {
  $accID = $_SESSION['studentAccID'];

  if ($_POST['whatToDo'] == "sh") {
    if(!isset($_POST['year']) || !isset($_POST['period']) || !isset($_POST['teacher'])) {
      echo json_encode(array('status' => 'error', 'code' => $_POST['year']));
    } else {
      $year = $_POST['year'];
      $period = $_POST['period'];
      $teacher = $_POST['teacher'];

      //$_SESSION['studentAccID']
      $shChange = $medooDB->update("studentaccount", array(
      	"sh_period" => $period,
        "sh_teacher_ID" => $teacher,
        "student_year" => $year
      ), array(
      	"id" => $accID
      ));
      if($shChange > 0) {
        $_SESSION['period'] = $period;
        echo json_encode(array('status' => 'success', 'code' => '7001'));

      } else {
        echo json_encode(array('status' => 'warning', 'code' => '8002'));
      }
    }
  }
}
?>
