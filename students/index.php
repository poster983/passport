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





</head>
<body class="grey darken-4">
  <? date_default_timezone_set('America/Chicago'); ?>

    <? include "../sqlconnect.php";
        include "../versionInfo.php";?>
    <!--Navbar-->
    <nav>
        <div class="nav-wrapper ">
            <a href="#" class="brand-logo center">Passport</a>
            <span class="right"><?echo $CurrentVersionOfPassport;?></span>
        </div>
    </nav>
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
      <? include "function.php"; ?>

        <? allStudentMess(); ?>
        <div class="container">
          <div class="section">
            <div class="row">
              <div class="col s12">
                <div id="PassCard" class="card grey darken-3">
                  <div class="card-content white-text">
                    <span class="card-title">Passes</span>

                      <form method="post">

                          <div id="depDiv" class="input-field col s12">
                            <select name="department" required class="white-text validate" onchange="depToReasonAJAX(this.value);">
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
                        <!--Advanced-->
                      <p>
                        <input type="checkbox" id="sao" />
                        <label for="sao">Show Advanced Options</label>
                      </p>
                      <div class="divider"></div>
                      <div id="passrequestAdvanced" style="display: none;">
                        <h5 class="center white-text">Advanced Options</h5>
                        <div class="divider"></div>
                      </div>
                      <div class="section">
                        <button class="btn waves-effect waves-light" type="submit" name="passSubmit">Request Pass<span id="submitAdvantext"><i class="material-icons right">send</i></span></button>
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
        <script src="/passport/js/materialize.js"></script>
        <script>
        depLock = 0;
        selVal = 0;
        function carsonRau(){
          $(document.body).css('background-image', 'url(/passport/image/cork-board.jpg)');
          $('#PassCard').addClass("animated infinite jello");
          console.log("There You Go Carson");
        }

              $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
              });
              $(document).ready(function(){
                  $('.tooltipped').tooltip({delay: 50});
                });

              $(document).ready(function() {
                $('select').material_select();
              });


                  function depToReasonAJAX(depart) {

                    if(depLock == 0) {
                      selVal +=1;
                      depLock = 1;

                    }

                    $('#ReasonAJAX').html("<img class='svg-dis' src='/passport/image/rings.svg' /> <h5 class='center'>Loading</h5>");
                    $.ajax({
                  url: 'ajaxGetReasonsAndBlackout.php',
                  data: {'dep': depart},
                  type: 'get',
                  success: function(data) {
                    $('#ReasonAJAX').html(data);
                  },
                  error: function(xhr, desc, err) {
                  console.log(xhr);
                  console.log("Details: " + desc + "\nError:" + err);
                  $('#ReasonAJAX').html("There was an error.  Please check the console for more details.");
                  }
                })};
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


              </script>
        <script src="/passport/js/passport.js"></script>
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
