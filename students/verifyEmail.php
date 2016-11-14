<?php
/*
The MIT License (MIT)

Copyright (c) Friday November 13 2016 Joseph Hassell joseph@thehassellfamily.net

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
date_default_timezone_set('America/Chicago');

$dataverify = $medooDB->select("studentaccountverify", array(
	"studentaccountID"
), array("AND" => array(
  "id" => $_GET['vID'],
  "UniquekeyVal" => $_GET['verCrypt']
)));

foreach($dataverify as $row)
{
  $studentID = $row['studentaccountID'];
}
$medooDB->update("studentaccount", array(
  "email_Verify_Status" => 1
), array(
  "id" => $studentID
));
?>
<html>
<head>
  <title>Verify Email</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />

</head>
<body class="grey darken-4">
  <div id="checkmarkAnimationfull"></div>
  <h1 id="textVeri" class="center white-text"></h1>
  <p id="more" class="center white-text"></p>
  <script>
setTimeout(function(){
  $( "#checkmarkAnimationfull" ).html('<svg class="pause-Ani checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path id="checkMarkAni"  class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>');
  $('#textVeri').html("Verified Email");
  $('#more').html("You may now login <br> <a class='waves-effect waves-light btn-large' href='http://<?php echo $_SERVER['HTTP_HOST']; ?>/passport'><i class='material-icons right'>lock_open</i>Login</a>");
  $('#checkMarkAni').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
    function(e) {
      console.log("done");

    });
}, 500);
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="/passport/js/materialize.js"></script>
</body>
</html>
