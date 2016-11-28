<?php
/*
The MIT License (MIT)

Copyright (c) Monday November 27 2016 Joseph Hassell joseph@thehassellfamily.net

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



  if($medooDB->has("message", array(
    "AND" => array(
      "day" => $today,
      "dep" => "All Students"
    )))) {
      echo "<div class='row'><div class='col s12'><div class='hoverable card cyan accent-4'><div class='card-content white-text'><span class='card-title'>IMPORTANT PASSPORT SYSTEM MESSAGE</span>";
      $datas = $medooDB->select("message", array(
      	"reason"
      ), array(
        "AND" => array(
          "day" => $today,
          "dep" => "All Students"
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

//echo "<div class='row'>";

?>
