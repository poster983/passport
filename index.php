<?php
  session_start();
  if(!isset($_SESSION['studentok']))
  header("location: students/login.php");
  if(isset($_SESSION['needsUpdate'])){
    if ($_SESSION['needsUpdate'] == 1) {
      header("location: students/account.php");
    }
  }
?>
<!--

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
-->

<!--

Special Thanks

Carson Rau - He came up with the idea and told me how bad my design was.
The LC staff at STHS
IT Department at STHS
The study halls and teachers who participated in the pilot program in the fall of 2016.
Materializecss.com - They created the material design js and css library.
My Sanity :)

-->

<html>

<head>
    <title>Passport-Student</title>
    <? include "personalCode.php";
	     trackerGA(); ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passport.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/animate.css" type="text/css" rel="stylesheet" media="screen,projection" />

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

    .passportLoader.box{
      position: relative;
      width: 342px;
    height: 470px;
    background-color: #00b8d4;
    border-radius: 25px;
    box-shadow: 3px 3px 5px #00b8d4;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
    }
    .passportLoader.box > .logo{

    }
    </style>



</head>
<body class="grey darken-4">
  <? date_default_timezone_set('America/Chicago'); ?>

    <? include "sqlconnect.php";
        include "medooconnect.php";
        include "versionInfo.php";?>

        <!--Loading Screen-->
        <!--
        <section class="loadingScreen loading">


            <div class="vCenter">
              <!--<img class="hCenter" height="42" width="42" src="image/passportLogo/web_hi_res_512.png">--
              <div class="passportLoader box"></div>
              <h5 class="center white-text">Loading</h5>
            </div>

<!--342x470--
        </section>
-->



      <!-- Normal Page -->


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
           <li><a class="waves-effect" href="#!">Home</a></li>
           <li><a class="waves-effect" href="students/account.php">Your Account</a></li>
           <li><div class="divider"></div></li>
           <!--<li><a class="subheader">Subheader</a></li>-->
           <li><a class="waves-effect" href="students/logout.php">Logout<i class="material-icons right">lock_outline</i></a></li>

         </ul>
          <a href="#" data-activates="slide-out" class="nav-sandwich button-collapse left-allign show-on-large"><i class="material-icons">menu</i></a>
            <a href="#" class="brand-logo center">Passport</a>
            <span class="nav-right"><?echo $CurrentVersionOfPassport;?></span>
        </div>
    </nav>

    <div id="confirmOver" class="overlay-full">
      <div class="overlay-content">
      <div id="checkmarkAnimationfull">

    </div>
      <h1>
      <h1 id="ConfirmOverlayWords" class="center white-text">Pass Requested</h1>
      <a href="javascript:void(0)" class="closebtn-overlay" onclick="closeFullOverlay('confirmOver', 0)">&times;</a>
    </div>
  </div>
    <!--FEEDBACK FAB-->


    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large tooltipped" data-position="left" data-delay="50" data-tooltip="Feedback">
            <i class="large material-icons">assignment</i>
        </a>
        <ul>
            <li><a class="btn-floating red modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Bug Report" href="#bugmodal"><i class="material-icons">report_problem</i></a></li>
            <li><a class="btn-floating yellow darken-1 modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Leave A Review" href="#reviewmodaldis"><i class="material-icons">thumbs_up_down</i></a></li>
            <li><a class="btn-floating green tooltipped" data-position="left" data-delay="50" data-tooltip="Wiki" href="https://github.com/poster983/passport/wiki"><i class="material-icons">live_help</i></a></li>
            <li><a class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Version Info and Licence"><i class="material-icons">info</i></a></li>
        </ul>
    </div>





  <!-- Bug Modal -->
  <div id="bugmodal" class="modal bottom-sheet">
    <div class="modal-content">
        <h4>Bug report</h4>
        <div class="row">
            <form class="col s12" method="post" action="">
                <div class="row">
                    <div class="input-field col s6"> <i class="material-icons prefix">account_circle</i>
                        <input id="bugname" name="bugname" required type="text" class="validate">
                        <label for="bugname">Name</label>
                    </div>
                    <div class="input-field col s6"> <i class="material-icons prefix">email</i>
                        <input id="bugemail" name="bugemail" required type="email" class="validate">
                        <label for="bugemail">Email</label>
                    </div>
                    <div class="input-field col s12"> <i class="material-icons prefix">comment</i>
                        <textarea id="bugtext" name="bugtext" required class="materialize-textarea"></textarea>
                        <label for="bugtext">Describe the bug or issue</label>
                    </div>
                    <h5 class="center">Bug Severity Slider</h5>
                    <p class="center">1 being low priority and 5 being high priority</p>
                        <p class="range-field">
                            <input type="range" id="bugseverity" name="bugseverity" min="1" max="5" value="3" />
                        </p>
                </div>
                <div class="modal-footer">

                    <button class="btn waves-effect waves-light modal-action modal-close" type="submit" name="submitbug">Submit Bug Report
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>

    </div>

  </div>



      <!--Review Modal disclaimer -->
  <div id="reviewmodaldis" class="modal">
    <div class="modal-content">
      <h4>Reminder</h4>
      <p>A review should include helpful information. Reviews that are bias and/or spam will be ignored.</p>
    </div>
    <div class="modal-footer">
      <a href="#reviewmodal" class=" modal-action modal-close modal-trigger waves-effect waves-green btn-flat">I Agree</a>
    </div>
  </div>

    <!-- Review Modal -->
  <div id="reviewmodal" class="modal bottom-sheet">
    <div class="modal-content">
        <h4>Leave a review</h4>
        <div class="row">
            <form class="col s12" method="post" action="">
                <div class="row">
                    <div class="input-field col s6"> <i class="material-icons prefix">account_circle</i>
                        <input id="reviewname" name="reviewname" required type="text" class="validate">
                        <label for="reviewname">Name</label>
                    </div>
                    <div class="input-field col s6"> <i class="material-icons prefix">email</i>
                        <input id="reviewemail" name="reviewemail" required type="email" class="validate">
                        <label for="reviewemail">Email</label>
                    </div>
                    <div class="input-field col s12"> <i class="material-icons prefix">comment</i>
                        <textarea id="reviewtext" name="reviewtext" class="materialize-textarea"></textarea>
                        <label for="reviewtext">Comment</label>
                    </div>
                    <h5 class="center">Rating Slider</h5>

                        <p class="range-field">
                            <input type="range" id="rating" name="rating" min="1" max="10" value="5" />
                        </p>
                </div>
                <div class="modal-footer">

                    <button class="btn waves-effect waves-light modal-action modal-close" type="submit" name="submitreview">Submit Review
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>

    </div>

  </div>





    <!-- System Message-->
        <div id="ajaxAllStudentMess"></div>
        <!--login Message-->
        <?php
        if (isset($_SESSION['messageFromLogin'])) {
          echo "<div class='row'>
            <div class='col s12'>
              <div class='card-panel teal'>
                <h1>NOTE FROM LAST LOGIN!</h1>
                <h3>" . $_SESSION['messageFromLogin'] . "</h3>
              </div>
            </div>
          </div>";
        }
        ?>

        <div class="container">
          <div class="section">
            <div class="row">
              <div class="col s12">
                <div id="behindCard"></div>
                <div id="PassCard" class="card grey darken-3">
                  <div class="card-content white-text">
                    <span class="card-title">Passes</span>

                      <form id="passForm" method="post">

                          <div id="depDiv" class="input-field col s12">
                            <select id="department" name="department" required class="white-text validate" onchange="depToReasonAJAX(this.value, '<?php echo $_SESSION['period'] ?>');">
                              <option value="" disabled selected>Choose A Department</option>
                              <option value="LEC">Executive Functioning (LEC)</option>
                              <option value="Math">Math Tutoring</option>
                              <option value="Library">Library</option>
                              <option value="Help Desk">Help Desk</option>
                              <option value="Writing Lab">Writing Lab</option>
                              <option value="Foreign Language">Foreign Language Tutoring</option>
                              <option value="Athletic Mentor">Athletic Mentor</option>
                            </select>
                            <label>Department</label>

                          </div>
                          <div id="ReasonAJAX"></div>

                          <br>
                        <!--Advanced-->
                      <div>
                        <input type="checkbox" id="sao" />
                        <label for="sao">Show Advanced Options</label>
                      </div>
                      <div class="divider"></div>
                      <div id="passrequestAdvanced" style="display: none;">
                        <h5 class="center white-text">Advanced Options</h5>
                        <div class="divider"></div>
                        <p class="center white-text">Nothing Here Yet.</p>
                      </div>
                      <div class="section">
                        <a class="waves-effect waves-light btn-large red" id="submitPass" disabled onclick="submitPass(<?php echo $_SESSION['studentAccID'] ?>, 0);">Submit Pass<span id="subPassAdv"><i class='material-icons right'>send</i></span></a>
                        <span id="debugSubmit"></span>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        <!-- Scripts -->
        <!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
        <script>
            if ('addEventListener' in window) {
                window.addEventListener('load', function () {
                    document.body.className = document.body.className.replace(/\bis-loading\b/, '');
                });
                document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
            }
        </script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

        <!-- Compiled and minified JavaScript -->
        <script src="js/materialize.js"></script>
        <script src="js/passport.js"></script>
        <script>


              $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
                $(".button-collapse").sideNav();
                $('.tooltipped').tooltip({delay: 50});
                $('select').material_select();
                AllStudentmessageAjaxAfterPageLoad();
                checkDebugModeCookies();
              });

              function debugMode() {

                if (getCookie("debugMode") == "") {
                  document.cookie = "debugMode=1";
                  toggleDebugModeDOMElements(true);
                } else if (getCookie("debugMode") == 1){
                  document.cookie = "debugMode=0";
                  toggleDebugModeDOMElements(false);
                } else if (getCookie("debugMode") == 0){
                  document.cookie = "debugMode=1";
                  toggleDebugModeDOMElements(true);
                }
              }
              function checkDebugModeCookies() {
                if (getCookie("debugMode") == 1){
                  toggleDebugModeDOMElements(true);
                }
              }
              function toggleDebugModeDOMElements(state) {
                if (state) {
                  $('#debugSubmit').html("<a class='waves-effect waves-light btn-large red' id='debugSubmitPass' onclick=\"submitPass(<?php echo $_SESSION['studentAccID'] ?>, 1);\">Debug Submit Pass<span id='subPassAdv'><i class='material-icons right'>send</i></span></a>");
                } else {
                  $('#debugSubmit').html("");
                }
              }
              /*
              depLock = 0;
              dateshowLock = 0;
              selVal = 0;

              passSubmitReady = 0;
              depReady = false;
              reasonReady = false;
              dateReady = false;
              function carsonRau(){
                $(document.body).css('background-image', 'url(/passport/image/cork-board.jpg)');
                $('#PassCard').addClass("animated infinite jello");
                $('#navBar').addClass("animated infinite rubberBand");
                console.log("There You Go Carson");
              }
              function showDatePicker() {
                if(dateshowLock == 0) {
                $('#datePicker').show();

                  dateshowLock = 1;
                }
              }
              function dateVal() {

                    dateReady = true;

                checkPassSubmit();

              }
                  function depToReasonAJAX(depart, perd) {



                    if(depLock == 0) {
                      selVal +=1;
                      depLock = 1;
                      depReady = true;
                    }
                    dateshowLock = 0;
                    reasonReady = false;
                    dateReady = false;
                    checkPassSubmit();

                    $('#ReasonAJAX').html("<img class='svg-dis' src='/passport/image/rings.svg' /> <h5 class='center'>Loading</h5>");
                    $.ajax({
                  url: 'ajaxGetReasonsAndBlackout.php',
                  data: {'dep': depart, 'per': perd},
                  type: 'get',
                  success: function(data) {
                    $('#ReasonAJAX').html(data);
                  },
                  error: function(xhr, desc, err) {
                  console.log(xhr);
                  console.log("Details: " + desc + "\nError:" + err);
                  $('#ReasonAJAX').html("There was an error.  Please check the console for more details.");
                  }
                })
                $( document ).ajaxComplete(function() {

                  $('select').material_select();
                  if(selVal == 1) {
                    $("#depDiv input[type=text]").addClass('valid');
                  } else if(selVal ==2) {
                    $("#shPer input[type=text]").addClass('valid');
                  } else if(selVal == 3) {
                    $("#shPer input[type=text]").addClass('valid');
                    $("#stYear input[type=text]").addClass('valid');
                  }

                });
                };

                function submitPassToAjax(id, depart, reason, day) {
                  $('#behindCard').html("<img class='svg-dis' src='/passport/image/rings.svg' /> <h5 class='center'>Loading</h5>");
                  $.ajax({
                url: 'ajaxSubmit.php',
                data: {'sAccID': id, 'dep': depart, 'reason': reason, 'day': day},
                type: 'get',
                success: function(data) {

                  $('#behindCard').html(data);
                  depLock = 0;
                  dateshowLock = 0;
                  selVal = 0;

                  dateshowLock = 0;
                  depReady = false;
                  reasonReady = false;
                  dateReady = false;
                  console.log("AJAX");
                  $('#ReasonAJAX').html("");
                  $('#submitPass').attr("disabled",true);
                  $('#datePicker').hide();
                  $('#passForm').formClear();
                  $('#PassCard').show();
                  $('#PassCard').animateCss('fadeInLeft');
                  $('#PassCard').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
                function(e) {
                $('select').material_select();
                if(!depReady || !reasonReady || !dateReady){
                openFullOverlay("confirmOver");
                setTimeout(function(){
                  $( "#checkmarkAnimationfull" ).html('<svg class="pause-Ani checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path id="checkMarkAni"  class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>');
                  $('#checkMarkAni').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
                    function(e) {
                      console.log("done");
                    closeFullOverlay("confirmOver", 1000);
                    });
                }, 500);
              }
                });

                },
                error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
                $('#behindCard').html("There was an error.  Please check the console for more details.");
                }
              })};

                function submitPass(id) {
                  if (passSubmitReady == 1 && dateshowLock == 1){
                    passSubmitReady = 0;
                    console.log("hi");
                    $('#PassCard').animateCss('fadeOutRight');
                    $('#PassCard').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
                  function(e) {

                    console.log($("input[name=day]:checked").val());
                    if($("input[name=day]:checked").val() != undefined) {
                      $('#PassCard').hide();
                  submitPassToAjax(id,$('#department').val(),$('#ajaxReason').val(),$("input[name=day]:checked").val());
                  console.log("byeee");
                } else {
                  console.log("aaaaaaaaaaaaa");
                }
                console.log("bysdfsdeee");
                  });
                  console.log("bye");
                  }
                };

                function checkPassSubmit(){
                  if(depReady && reasonReady && dateReady){
                    $('#submitPass').attr("disabled",false);
                    passSubmitReady = 1;
                  } else {
                    $('#submitPass').attr("disabled",true);
                    passSubmitReady = 0;
                  }
                };

                function AllStudentmessageAjaxAfterPageLoad() {
                  $('#ajaxAllStudentMess').html("<img class='svg-dis' src='/passport/image/rings.svg' /> <h5 class='center'>Checking for Messages</h5>");
                  $.ajax({
                url: 'ajaxMessage.php',
                success: function(data) {
                  $('#ajaxAllStudentMess').html(data);
                },
                error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
                $('#ajaxAllStudentMess').html("There was an error.  Please check the console for more details.");
                }
              })};

              */

              </script>

  </body>
  </html>

  <?

  //bug report submit code


  if(isset($_POST['submitbug'])){


      foreach ($_POST as $key => $value) {

  }
  {


      $bugname = $_POST['bugname'];
      $bugemail = $_POST['bugemail'];
      $bugseverity = $_POST['bugseverity'];
      $bugdate = date( 'Y-m-d', strtotime(" today "));
      $bugtext = htmlspecialchars($_POST['bugtext'],ENT_QUOTES);
      $bugReportType = "bug";
      $bugRole = "student";
      $bugVersion = $CurrentVersionOfPassport;
  }
  /*
      $medooDB->action(function($database) {
      $bugLAstID = $database->insert("feedback", array(
        "name" => $bugname,
        "email" => $bugemail,
        "comment" => $bugtext,
        "rating" => $bugseverity,
        "report_type" => "bug",
        "date" => $bugdate,
        "role" => "student",
        "forVersion" => $bugVersion
      ));/*
      if ($medooDB->has("feedback", array("id" => $bugLAstID))) {
        echo "<script> Materialize.toast('Bug report submitted successfully', 4000) </script>";
      } else {
        echo "<script> Materialize.toast('There was an error. contact IT and send them the error code at the bottom of the page', 14000) </script>";
        var_dump($medooDB->error());
        //return false;

      }
    };
    */


      $sqlbug = $conn->prepare("INSERT INTO feedback (name, email, comment, rating, report_type, `date`, role, forVersion)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

      $sqlbug->bind_param("sssissss", $bugname, $bugemail, $bugtext, $bugseverity, $bugReportType, $bugdate, $bugRole, $bugVersion);
      if ($sqlbug->execute()) {
        echo "<script> Materialize.toast('Bug report submitted successfully', 4000) </script>";
      } else {
        echo "<script> Materialize.toast('There was an error. contact IT', 14000) </script>";
      }
      $sqlbug->close();


  }



  //bug report submit code


  if(isset($_POST['submitreview'])){


      foreach ($_POST as $key => $value) {

  }
  {


      $reviewname = $_POST['reviewname'];
      $reviewemail = $_POST['reviewemail'];
      $reviewtext = htmlspecialchars($_POST['reviewtext'],ENT_QUOTES);
      $reviewseverity = $_POST['rating'];
      $reviewdate = date( 'Y-m-d', strtotime(" today "));
      $reviewReportType = "review";
      $reviewRole = "student";
      $reviewVersion = $CurrentVersionOfPassport;
  }

      $sqlbug = $conn->prepare("INSERT INTO feedback (name, email, comment, rating, report_type, `date`, role, forVersion)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

      $sqlbug->bind_param("sssissss", $reviewname, $reviewemail, $reviewtext, $reviewseverity, $reviewReportType, $reviewdate, $reviewRole, $reviewVersion);
      if ($sqlbug->execute()) {
        echo "<script> Materialize.toast('Review submitted successfully', 4000) </script>";
      } else {
        echo "<script> Materialize.toast('There was an error. contact IT', 14000) </script>";
      }
      $sqlbug->close();
  }

  ?>
