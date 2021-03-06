<?php
header('Content-Type: application/json');
session_start();
if(!isset($_SESSION['studentok'])){
header("location: login.php");
}
date_default_timezone_set('America/Chicago');
include "../medooconnect.php";
/*

The MIT License (MIT)

Copyright (c) Mon May 23 2016 Joseph Hassell joseph@thehassellfamily.net

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




//get account
$medooSAccount = $medooDB->select("studentaccount", array(
  "firstname",
  "lastname",
  "email",
  "student_id",
  "sh_period",
  "sh_teacher_ID"
), array(
  "id" => $_GET["sAccID"]
));
foreach($medooSAccount as $row) {
  $stuAccFirstname = $row['firstname'];
  $stuAccLastname = $row['lastname'];
  $stuAccEmail = $row['email'];
	$stuID = $row['student_id'];
  $period = $row['sh_period'];
  $teacher = $row['sh_teacher_ID'];
}
$dupeCheck = $medooDB->has("passes", array(
  "AND" => array(
    "period" => $period,
    "place" => $_GET["dep"],
    "day_to_come" => $_GET["day"],
    "studentAccountID" => $_GET["sAccID"]
  )
));
//echo $dupeCheck;
if (!($_GET['isDebug']) && ($dupeCheck))
{

	echo json_encode(array('status' => 'error', 'code' => '5002'));
}
else
{


//limit system
$tally = $medooDB->get("tally", "tally", array(
  "AND" => array(
    "date" => $_GET["day"],
    "period" => $period,
    "place" => $_GET["dep"]
  )
));

$studentLimit = $medooDB->get("studentlimit", "studentlimit", array(
    "dep" => $_GET["dep"]
  )
);

if ($studentLimit > $tally) {
    //get teacher
    $medooTeacher = $medooDB->select("teachers", array(
      "name_title",
      "firstname",
      "lastname"
    ), array(
      "id" => $teacher
    ));
    foreach($medooTeacher as $row) {
    	$teacherTitle = $row['name_title'];
      $teacherFirstName = $row['firstname'];
      $teacherLastName = $row['lastname'];
    }
    //request pass
    $medooDB->insert("passes", array(
    	"firstname" => $stuAccFirstname,
    	"lastname" => $stuAccLastname,
    	"email" => $stuAccEmail,
      "student_id" => $stuID,
      "period" => $period,
      "sh_teacher" => $teacherTitle . " " . $teacherFirstName . " " . $teacherLastName,
      "place" => $_GET["dep"],
      "day_to_come" => $_GET["day"],
      "reason_to_come" => $_GET["reason"],
      "teacherAccountID" => $teacher,
      "studentAccountID" => $_GET["sAccID"]
    ));

  echo json_encode(array('status' => 'success', 'code' => '7001'));
} else {
  //limit reached
  echo json_encode(array('status' => 'error', 'code' => '8001'));
}
//tally System

if ($medooDB->update("tally", array(
  "tally[+]" => 1
), array(
  "AND" => array(
    "date" => $_GET["day"],
    "period" => $period,
    "place" =>$_GET["dep"]
  )
)) == 0) {
  $medooDB->insert("tally", array(
    "tally" => 1,
    "date" => $_GET["day"],
    "period" => $period,
    "place" =>$_GET["dep"]
  ));
}
}
?>
