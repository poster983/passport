<?
session_start();
?>
<!--The MIT License (MIT)

Copyright (c) Sun Jan 29 2017 Joseph Hassell josephh2018@gmail.com

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
-->

<html>

<head>
    <title>The Ban Hammer Has Spoken!</title>
    <? include "../personalCode.php";
	     trackerGA(); ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/animate.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <!--Browser Colors-->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#D32F2F">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#D32F2F">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <style>
    .vallCOn{
      position: absolute;
      display: inline-block;
      top: 0%;
      left: 0%;
      width:100vw;
      height: 100%;
      overflow: hidden;
      z-index: -20;
    }
    .vall {
      position: relative;
      left: 50%;
      top: 50%;
      -webkit-transform: translate(-50%, -300%);
      -ms-transform: translate(-50%, -300%);
      transform: translate(-50%, -300%);
    }
    </style>


</head>
<body class="grey darken-4">
  <? date_default_timezone_set('America/Chicago'); ?>

  <div class="vallCOn">
    <i class="material-icons vall md-light large">gavel</i>
  </div>
  <div class="white-text">
    <h3 class="center">Sorry <? echo $_SESSION['sFN']; ?>.</h3>
    <h5 class="center"> You have been banned from the LC until <? echo date("l", strtotime($_SESSION['btD'])) . " " . date("F j", strtotime($_SESSION['btD'])) . "<sup>" . date("S", strtotime($_SESSION['btD'])) . "</sup>, " . date("Y", strtotime($_SESSION['btD'])); ?>.</h5>
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

  <!-- Compiled and minified JavaScript -->
  <script src="/passport/js/materialize.js"></script>
</body>
</html>
