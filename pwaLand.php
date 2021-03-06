<!--

The MIT License (MIT)

Copyright (c) Tue Feb 8 2017 Joseph Hassell josephh2018@gmail.com

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
    <script>
    if (localStorage.getItem("pwaPref") != null) {
      var loc = localStorage.getItem("pwaPref");
      switch (loc) {
        case "1":
          window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/index.php?pwa=1"
          break;
        case "2":
          window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/teacher/index.php?pwa=1"
          break;
        case "3":
          window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/admin/index.php?pwa=1"
          break;
        case "4":
          window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/locationLand.php"
          break;
        default:
        console.log("No Redirect");
        break;
      }
    }
    </script>
    <title>Passport - Welcome</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passport.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/animate.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link rel="manifest" href="manifest.json">
    <!--FavIcon-->

    <link rel="shortcut icon" type="image/png" href="image/favicon.png"/>


    <!--Browser Colors-->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#F44336">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#F44336">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
    .welcome {
      position: relative;
      left: 50%;
      top: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    </style>
  </head>
  <body class="grey darken-4">
    <div class="hCenter">
    <img src="image/passportLogo/icon-144x144.png" alt="Passport Logo">
  </div>
    <div class="welcome">

      <h1 class="center white-text">Welcome to Passport!</h1>
      <div class="container">
          <div class="input-field col s12">
            <select id="prefSel" onchange="modelOpen('modal', this.value);">
              <option value="" disabled selected>Who Are You?</option>
              <option value="1">I Am A Student</option>
              <option value="2">I Am A Teacher</option>
              <option value="3">I Am An Admin</option>
              <option value="4">I Am A Developer</option>
            </select>
            <label>Login Chooser</label>
          </div>
        </div>
      </div>
      <!--Modals-->
      <div id="modal" class="modal">
        <div class="modal-content">
            <h4>Are You Sure?</h4>
            <p>You can change this at any time</p>
          </div>
          <div class="modal-footer">
            <a href="#!" onclick="setPref();" class=" modal-action modal-close waves-effect waves-green btn-flat">Yes, I am <span id="role"></span></a>
          </div>
        </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/passport.js"></script>
    <script>
    $(document).ready(function() {
      $('select').material_select();
      $('.modal-trigger').leanModal();
    });

    function modelOpen(id, val) {
      switch (val) {
        case 0:
          console.log("Nothing Selected");
          break;
        case "1":
          $('#role').html("a <b>Student</b>");
          $('#' + id).openModal();
          break;
        case "2":
          $('#role').html("a <b>Teacher</b>");
          $('#' + id).openModal();
          break;
        case "3":
          $('#role').html("an <b>Admin</b>");
          $('#' + id).openModal();
          break;
        case "4":
          $('#role').html("a <b>Developer</b>");
          $('#' + id).openModal();
          break;
        default:
        console.log("Nothing Selected");
      }
    }
    function modelClose(id) {
      $('#' + id).closeModal();
    }

    function setPref(){
      localStorage.setItem("pwaPref", $('#prefSel').val());
      localStorage.setItem("pwaShowSetting", "1");
      location.reload();
    }
    </script>
  </body>
  </html>
