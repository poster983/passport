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
include "../medooconnect.php";

$dep = $_GET['dep'];


$datas = $medooDB->select("why", array(
  "why"
),array(
  "dep" => $dep
));

  echo "
  <script>

  function shTeacherTall() {
    $('#" . $dep . "department input[type=text]').addClass('valid');
    showDatePicker();
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



?>
