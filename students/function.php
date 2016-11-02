<?
/*

The MIT License (MIT)

Copyright (c) Tue Nov 1 2016 Joseph Hassell joseph@thehassellfamily.net

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
$mondisday = date( 'Y-m-d', strtotime(" monday this week "));
$tusdisday = date( 'Y-m-d', strtotime(" tuesday this week "));
$weddisday = date( 'Y-m-d', strtotime(" wednesday this week "));
$thurdisday = date( 'Y-m-d', strtotime(" thursday this week "));
$fridisday = date( 'Y-m-d', strtotime(" friday this week "));

$today = date( 'Y-m-d', strtotime(" today "));

function allStudentMess() {
  global $conn;
  global $today;

  $sqlmessage = "SELECT day, dep, reason FROM message WHERE day = '$today' AND dep = 'All Students'";
  $resultmessage = $conn->query($sqlmessage);
  echo "<div class='row'>";
if ($resultmessage->num_rows > 0) {
  echo "<div class='col s12'><div class='hoverable card cyan accent-4'><div class='card-content white-text'><span class='card-title'>IMPORTANT PASSPORT SYSTEM MESSAGE</span>";
  // output data of each row
  while($rowmessage = $resultmessage->fetch_assoc()) {
      echo "<p>";
      echo $rowmessage["reason"];
      echo "</p>";
  }
  echo "</div></div></div>";
  } else {

}
  echo "</div>";
}



//Reasons
function reasonSel($reaDep) {
    global $conn;
    $reaDepNoSpace = preg_replace('/\s+/', '', $reaDep);
    echo "<select id='" . $reaDepNoSpace . "ID' name='why" . $reaDepNoSpace . "' class='browser-default' onchange=\"incBlur('why')\">";



        $sql="SELECT dep, why FROM why WHERE dep='$reaDep' ORDER BY why";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
          echo "<option selected value='No Choices'>--Not Required--</option>";
        } else {
          echo "<option selected disabled value=''>--Choose A Topic--</option>";
        // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['why'].'">' . $row['why']. "</option>";
            }
        }
    echo "</select>";
}







?>
