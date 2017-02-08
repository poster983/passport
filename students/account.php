<?php
  session_start();
  if(!isset($_SESSION['studentok']))
  header("location: login.php");
  date_default_timezone_set('America/Chicago');
  include "../medooconnect.php";
  include "../versionInfo.php";



?>
<!--

The MIT License (MIT)

Copyright (c) Tue Jan 22 2017 Joseph Hassell josephh2018@gmail.com

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
    <title>Passport-Student</title>
    <? include "../personalCode.php";
	     trackerGA(); ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passport.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/animate.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link rel="manifest" href="/passport/manifest.json">
    <!--FavIcon-->

    <link rel="shortcut icon" type="image/png" href="image/favicon.png"/>
    <!--Browser Colors-->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#D32F2F">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#D32F2F">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <!--FavIcon-->

    <link rel="shortcut icon" type="image/png" href="/passport/image/favicon.png"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
    .Xleft {
      position: absolute;
      display: inline-block;
      top: 30%;
      left: 50%;
      opacity: 1;
      width: 20px;
      height: 250px;
      transform: rotate(45deg);
      background-color: white;

    }
    .Xright {
      position: absolute;
      display: inline-block;
      top: 30%;
      left: 50%;
      opacity: 1;
      width: 20px;
      height: 250px;
      transform: rotate(-45deg);
      background-color: white;

    }
    </style>



</head>
<body class="grey darken-4">






    <!--Navbar-->
    <nav id="navBar">
        <div class="nav-wrapper">
          <!--SideNav-->
          <ul id="slide-out" class="side-nav">
           <li><div class="userView">
             <div class="background">
               <img src="/passport/image/stunav.jpg">
             </div>
             <a href="#!user"><i class="material-icons md-48 md-light">account_circle</i></a>
             <a href="#!name"><span class="white-text name"><?php echo $_SESSION['sFN'] . " " . $_SESSION['sLN']; ?></span></a>
             <a href="#!email"><span class="white-text email"><?php echo $_SESSION['email']; ?></span></a>
           </div></li>
           <li><a class="waves-effect" href="index.php">Home</a></li>
           <li><a class="waves-effect" href="#!">Your Account</a></li>
           <li><div class="divider"></div></li>
           <!--<li><a class="subheader">Subheader</a></li>-->
           <li><a class="waves-effect" href="logout.php">Logout<i class="material-icons right">lock_outline</i></a></li>

         </ul>
          <a href="#" data-activates="slide-out" class="nav-sandwich button-collapse left-allign show-on-large"><i class="material-icons">menu</i></a>
            <a href="index.php" class="brand-logo center">Passport</a>
            <span class="nav-right"><?echo $CurrentVersionOfPassport;?></span>
        </div>
    </nav>
    <div class="container">
      <h5 class="center white-text">Your Account</h5>
      <div class="row">
        <div class="col s12">
          <div id="behindCard"></div>
          <div id="PassCard" class="card grey darken-3">
            <div class="card-content white-text">
              <span class="card-title">Change Your Default Study Hall</span>
              <div id="stYear" class="input-field col s12">
                <select name="stYear" required onchange="stYearTall();">
                  <option value="" disabled selected>Choose a Class</option>
                  <option value="9">Freshman</option>
                  <option value="10">Sophomore</option>
                  <option value="11">Junior</option>
                  <option value="12">Senior</option>
                </select>
                <label>Your Class</label>
              </div>

              <div id="shPer" class="input-field col s12">
                <select name="shPeriod" required onchange="periodToTeacher(this.value)">
                  <option value="" disabled selected>Choose a Period</option>
                  <option value="A">A Period</option>
                  <option value="B">B Period</option>
                  <option value="C">C Period</option>
                  <option value="D">D Period</option>
                  <option value="E1">E Period (You Have First Lunch)</option>
                  <option value="E2">E Period (You Have Second Lunch)</option>
                  <option value="F">F Period</option>
                  <option value="G">G Period</option>
                  <option value="H">H Period</option>
                </select>
                <label>Study Hall Period</label>
              </div>

              <div id="shTeacherAJAX"></div>
              <br>
              <a class="waves-effect waves-light btn-large disabled " onclick="submitUpdatedStudyhall();" id="shSubmit"><i class="material-icons left">fast_forward</i>Update Studdy Hall Details</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="updateWelcomeMod" class="modal">
      <div class="modal-content">
        <h4>Update Your Account</h4>
        <p>You must update your Study Hall before you can continue.</p>
        <p>This won't take long</p>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Got It!</a>
      </div>
    </div>


    <!--Scripts-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/passport/js/materialize.js"></script>
    <script src="/passport/js/passport.js"></script>
    <script>
      $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
        $(".button-collapse").sideNav();
        //$('.tooltipped').tooltip({delay: 50});
        $('select').material_select();
      });

      selVal = 0;
      yrLock = 0;
      function stYearTall() {

        $("#stYear input[type=text]").addClass('valid');
        if(yrLock == 0) {
          selVal +=1;
          yrLock = 1;
        }
        updateLength();
      }

      //Periods
      perLock = 0;
      function periodToTeacher(period) {

        if(perLock == 0) {
          selVal +=2;
          perLock = 1;

        }

        $("#shPer input[type=text]").addClass('valid');
        updateLength();
        $('#shTeacherAJAX').html("<img class='svg-dis' src='/passport/image/rings.svg' /> <h5 class='center'>Loading</h5>");
        $.ajax({
      url: 'ajaxCreateAccountPeriodToTeacher.php',
      data: {'period': period},
      type: 'get',
      success: function(data) {
        $('#shTeacherAJAX').html(data);

        $('select').material_select();
        if(selVal == 1) {
          $("#stYear input[type=text]").addClass('valid');
        } else if(selVal ==2) {
          $("#shPer input[type=text]").addClass('valid');
        } else if(selVal == 3) {
          $("#shPer input[type=text]").addClass('valid');
          $("#stYear input[type=text]").addClass('valid');
        }
        updateLength();
      },
      error: function(xhr, desc, err) {
      console.log(xhr);
      console.log("Details: " + desc + "\nError:" + err);
      $('#shTeacherAJAX').html("There was an error.  Please check the console for more details.");
      }
    })};

    $( document ).ajaxComplete(function() {


    });
    // for studyhalls
    submitOpen = 0;
    function updateLength() {
      if($('.valid').length >2) {
        $("#shSubmit").removeClass( "disabled" ).addClass("eagleBlood white-text");
        submitOpen = 1;
      } else {
        submitOpen = 0;
        $("#shSubmit").addClass( "disabled" ).removeClass("eagleBlood white-text");;
      }
    }


    function submitUpdatedStudyhall() {

      if(submitOpen == 1){


      $('#behindCard').html("<img class='svg-dis' src='/passport/image/rings.svg' /> <h5 class='center'>Loading</h5>");
      $.ajax({
    url: 'studentAJAX/account.php',
    data: {'whatToDo':'sh','year':$("[name='stYear']").val(),'period':$("[name='shPeriod']").val(),'teacher':$("#shTeacherAJAX [name='teacher']").val()},
    type: 'post',
    success: function(data) {
      //$('#behindCard').html(data.return);

      $('#behindCard').html("");
      //console.log(data.code);

      if(data.status == "success") {
        Materialize.toast('Changed Default Study Hall Successfully', 15000);
        console.log(data.code);
        <?php
          if(isset($_SESSION['needsUpdate'])){
            if ($_SESSION['needsUpdate'] == 1) {
              echo "Materialize.toast('You May Now Request Passes', 15000);";
            }
          }
        ?>
      } else if (data.status == "error") {
        if (data.code == "3001") {
          Materialize.toast('Error Code: 3001, See Console For More Details', 15000);
          console.error("Passport Info Code System: Returned with code \"" + data.code + "\"-Database Error");
        } else if(data.code == "2401") {
          Materialize.toast('Error Code: 2401, See Console For More Details', 15000);
          console.error("Passport Info Code System: Returned with code \"" + data.code + "\"-Wrong Credentials");
        } else if(data.code == "3002") {
          Materialize.toast('Error Code: 3002, See Console For More Details', 15000);
          console.error("Passport Info Code System: Returned with code \"" + data.code + "\"-Required Values not Satisfied");
        } else {
          Materialize.toast('Error Code: 1111, See Console For More Details', 15000);
          console.error("Passport Info Code System: Returned with code 1111 - Unknown Error.  Code slot returned: " + data.code);
        }
      } else if (data.status == "warning") {
        if (data.code == "8002") {
          Materialize.toast('Warning Code: 8002, No Values Changed', 15000);
          console.error("Passport Info Code System: Returned with code \"" + data.code + "\"-Nothing Changed");
        }
      }

    },
    error: function(xhr, desc, err) {
      console.warn("Passport Info Code System: Returned with code \"1001\"-AJAX Error");
      console.log(xhr);
      console.error("Details: " + desc + "\nError:" + err);
      console.warn(xhr.responseText)
      $('#behindCard').html("There was an error.  Please check the console for more details.");
    }
  })
  }};

  function modelActOpen(id) {
    $('#' + id).openModal();
  }
  function modelActClose(id) {
    $('#' + id).closeModal();
  }
    </script>
  </body>
  </html>

  <?php
  if (isset($_GET['updateWelcome'])) {
    echo "<script>modelActOpen('updateWelcomeMod');</script>";
  }
   ?>
