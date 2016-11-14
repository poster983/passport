<?php
/*
The MIT License (MIT)

Copyright (c) Monday November 7 2016 Joseph Hassell joseph@thehassellfamily.net

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
include "../medooconnect.php";

$period = $_GET['period'];



$datas = $medooDB->select("teachers", array(
  "id",
  "name_title",
  "firstname",
  "lastname",
  "period"
));

  echo "
  <script>

  function shTeacherTall() {
    $('#" . $period . "perTeacher input[type=text]').addClass('valid');
    updateLength();
  }
  </script>
  <div id='" . $period . "perTeacher' class='input-field col s12'>
  <div>
    <select name='teacher' required onchange='shTeacherTall();'>
      <option value='' disabled selected>Choose a Teacher</option>";


foreach ($datas as $row) {

  if(strpos($row["period"], $period) === false){
    continue;
  } else {
    echo "<option value='" . $row['id'] . "'>" . $row["name_title"] . " " . $row["firstname"] . " " . $row["lastname"] . "</option>";
  }
}

echo "
</select>
<label>Study Hall Teacher</label>
</div>
</div>";



?>
