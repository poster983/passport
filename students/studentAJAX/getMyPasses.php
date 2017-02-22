<?
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

$datas = $medooDB->select("passes", array(
  "id",
  "period",
  "place",
  "day_to_come",
  "reason_to_come"
), array(
  "AND" => array(
    "studentAccountID" => $_SESSION['studentAccID'],
    "day_to_come[<>]" => array(
      date( 'Y-m-d', strtotime(' today ')),
      date( 'Y-m-d', strtotime(' saturday this week '))
      //date("Y-m-d")
    )

  ),
  "ORDER" => "day_to_come"
));
echo "<ul class=\"collection\" style=\"border: 1px solid #424242 !important;\">";
foreach($datas as $data)
{
  switch ($data["place"]) {
    case 'LEC':
      $icon = "track_changes";
      break;
    case 'Math':
      $icon = "add";
      break;
    case 'Library':
      $icon = "book";
      break;
    case 'Help Desk':
      $icon = "computer";
      break;
    case 'Writing Lab':
      $icon = "create";
      break;
    case 'Foreign Language':
      $icon = "language";
      break;
    default:
      $icon = "receipt";
      break;
  }
  if ($data["reason_to_come"] == "") {
    $rTC_Prepare = "";
  } else {
    $rTC_Prepare = "<p>\"" . $data["reason_to_come"] . "\"</p>";
  }
	echo "<li class=\"collection-item avatar grey darken-2 hoverable\" style=\"border-bottom: 1px solid #424242\">
    <i class=\"material-icons circle red\">" . $icon . "</i>
    <span class=\"title\">" . $data["place"] . "</span>
    <p>" . date("l", strtotime($data["day_to_come"])) . "</p>
    <p>" . $data["period"] . " Period</p>
    " . $rTC_Prepare . "
    <!--<a href=\"#!\" class=\"secondary-content\"><i class=\"material-icons\">delete_forever</i></a>-->
  </li>";
}
echo "</ul>";
?>
