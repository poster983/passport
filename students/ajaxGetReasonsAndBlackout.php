<?php
/*
The MIT License (MIT)

Copyright (c) Monday November 21 2016 Joseph Hassell joseph@thehassellfamily.net

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
*/
date_default_timezone_set('America/Chicago');
include "../medooconnect.php";
$today = date( 'Y-m-d', strtotime(" today "));
$dep = $_GET['dep'];



if($medooDB->has("message", array(
  "AND" => array(
    "day" => $today,
    "dep" => $dep
  )))) {
    echo "<div class='row'><div class='col s12'><div class='hoverable card cyan accent-4'><div class='card-content white-text'><span class='card-title'>Important Message (" . $dep . ")</span>";
    $datas = $medooDB->select("message", array(
      "reason"
    ), array(
      "AND" => array(
        "day" => $today,
        "dep" => $dep
      )));
      foreach ($datas as $row) {
        echo "<p>";
        $url = '@(http)?(s)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
        $urlParse = preg_replace($url, '<a class="black-text" href="http$2://$4" target="_blank" title="$0">$0</a>', $row["reason"]);
        echo $urlParse;
        echo "</p>";
      }
      echo "</div></div></div></div>";
  }

$datas = $medooDB->select("why", array(
  "why"
),array(
  "dep" => $dep
));

  echo "
  <script>

  function shTeacherTall() {
    $('#" . $dep . "department input[type=text]').addClass('valid');
    reasonReady = true;
    showDatePicker();
    checkPassSubmit();
  }
  </script>
  <div id='" . $dep . "department' class='input-field col s12'>
  <div>
    <select id='ajaxReason' name='reasonToCome' required onchange='shTeacherTall()'>
      <option value='' disabled selected>Reason To Come</option>";


foreach ($datas as $row) {

    echo "<option value='" . $row['why'] . "'>" . $row['why'] . "</option>";
}

echo "
</select>
<label>Reason To Come</label>
</div>
</div>";

/*
  I need to get
  "period"
  where day = monday this week OR tuesday this week ect..
  AND
  ehere dep = $dep
*/
$blackout = $medooDB->select("blackout", array(
  "day",
  "period"
),array(
  "AND" => array(
    "department" => $dep,
    "day[<>]" => array(
      date( 'Y-m-d', strtotime(' monday this week ')),
      //date( 'Y-m-d', strtotime(' friday this week '))
      date("Y-m-d")
    )
  )

));
foreach($blackout as $row)
{
	echo "day:" . $row["day"] . " - periods:" . $row["period"] . "<br/>";
  $perarray = explode(",", $row["period"]);
  for ($i=0; $i < count($perarray); $i++) {
    if($perarray[i] == "G") {
      echo "yes";
      echo date("l", $row["day"]);
      break;
    }
  }

}

echo"<div id='datePicker' class='center' style='display: none;' >
    <input type='radio' class='with-gap' id='monday' onclick='dateVal();' name='day' on required value='" . date( 'Y-m-d', strtotime(' monday this week ')) . "'>
    <label for='monday'>Monday</label>
    &nbsp; &nbsp;
    <input type='radio' class='with-gap' id='tuesday' onclick='dateVal();' name='day' value='" . date( 'Y-m-d', strtotime(' tuesday this week ')) . "'>
    <label for='tuesday'>Tuesday</label>
    &nbsp;&nbsp;";
    if($dep == "LEC" || $dep == "Library"){
      echo"<input type='radio' class='with-gap' id='wednesday' disabled onclick='dateVal();' name='day' value='" . date( 'Y-m-d', strtotime(' wednesday this week ')) . "'>
      <label for='wednesday'>Wednesday</label>
      &nbsp;&nbsp;";
    } else {
      echo"<input type='radio' class='with-gap' id='wednesday' onclick='dateVal();' name='day' value='" . date( 'Y-m-d', strtotime(' wednesday this week ')) . "'>
      <label for='wednesday'>Wednesday</label>
      &nbsp;&nbsp;";
    }


echo "
    <input type='radio' class='with-gap' id='thursday' onclick='dateVal();' name='day' value='" . date( 'Y-m-d', strtotime(' thursday this week ')) . "'>
    <label for='thursday'>Thursday</label>
    &nbsp;&nbsp;
    <input type='radio' class='with-gap' id='friday' onclick='dateVal();' name='day' value='" . date( 'Y-m-d', strtotime(' friday this week ')) . "'>
    <label for='friday'>Friday</label>

</div>
";


?>
