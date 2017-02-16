<!--

The MIT License (MIT)

Copyright (c) Thu Feb 9 2017 Joseph Hassell josephh2018@gmail.com

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
<? include "commonHead.php"; ?>
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

  <div class="fixed-action-btn">
    <a class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="left" data-delay="50" data-tooltip="Change Default Login">
      <i class="large material-icons">settings_applications</i>
    </a>
    <ul>
      <li><a onclick="switchLogin('1');" class="btn-floating red tooltipped" data-position="left" data-delay="50" data-tooltip="Student"><i class="material-icons">face</i></a></li>
      <li><a onclick="switchLogin('2');" class="btn-floating yellow darken-3 tooltipped" data-position="left" data-delay="50" data-tooltip="Teacher"><i class="material-icons">work</i></a></li>
      <li><a onclick="switchLogin('3');" class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Admin"><i class="material-icons">build</i></a></li>
      <li><a onclick="switchLogin('4');" class="btn-floating green tooltipped" data-position="left" data-delay="50" data-tooltip="Developer"><i class="material-icons">code</i></a></li>
    </ul>
    </div>

  <div class="hCenter">
    <img src="image/passportLogo/icon-144x144.png" alt="Passport Logo">
  </div>
  <div class="welcome">

    <h1 class="center white-text">Welcome to Passport!</h1>
    <p class="center white-text"> -- Developer Tooles -- </p>
    <div class="container">
        <div class="input-field col s12">
          <select id="prefSel" onchange="go(this.value);">
            <option value="" disabled selected>Where do you want to go?</option>
            <option value="1">Students</option>
            <option value="2">Teachers</option>
            <option value="3">The Admin Panel</option>
            <option value="4">The Kiosk</option>
            <option value="5">Feedback</option>
          </select>
          <label>Login Chooser</label>
        </div>
      </div>
    </div>
    <? include "commonScripts.php"; ?>
    <script>
    $(document).ready(function() {
      $('select').material_select();
    });
    function go(loc) {
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
        window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/kiosk/index.php"
        break;
      case "5":
        window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/feedback/index.php"
        break;
      default:
      console.log("No Redirect");
      break;
    }
  }
  function switchLogin(whereTo) {
    switch (whereTo) {
      case "1":
        localStorage.setItem("pwaPref", whereTo);
        window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/index.php?pwa=1"
        break;
      case "2":
      localStorage.setItem("pwaPref", whereTo);
      window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/teacher/index.php?pwa=1"
        break;
      case "3":
      localStorage.setItem("pwaPref", whereTo);
      window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/admin/index.php?pwa=1"
        break;
      case "4":
      localStorage.setItem("pwaPref", whereTo);
      window.location="http://<? echo $_SERVER['HTTP_HOST'] ?>/passport/locationLand.php"
        break;
      default:
      console.log("Nothing Selected");
    }
  }
    </script>
</body>
</html>
