<?
include("common.php");
checklogin();
$msg = "";

include "adminconnect.php";
ob_start();
?>
<!DOCTYPE html>

<!--

The MIT License (MIT)

Copyright (c) Sun Feb 18 2017 Joseph Hassell josephh2018@gmail.com

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
    <title>Teacher Dashboard</title>

    <? include "../personalCode.php";
        include "../versionInfo.php";
	     trackerGA(); ?>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passport.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="manifest" href="/passport/manifest.json">
    <!--FavIcon-->

    <link rel="shortcut icon" type="image/png" href="/passport/image/favicon.png"/>
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


</head>

<body class="grey darken-4">
  <!-- Dropdown Structure -->
  <ul id="threeDot" class="dropdown-content">
    <li><a href="account.php">Account</a></li>
    <li class="divider"></li>
    <li><a href="logout.php">Logout<i class="material-icons right">lock</i></a></li>
  </ul>
  <!-- Nav Bar-->
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="nav-left brand-logo">Teachers</a>
      <ul id="nav-mobile" class="right">
        <!--<li class="right"><a href="logout.php">Logout<i class="material-icons right">lock</i></a></li>-->
        <li><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"><i class="material-icons">refresh</i></a></li>
        <li><a class="dropdown-button" href="#!" data-activates="threeDot">	&nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<i class="material-icons left">more_vert</i> </a></li>
        <li><a href=""></a></li>
      </ul>
    </div>
  </nav>
    <nav>

    <div class="nav-wrapper theme-second">

      <form method="get" action="">
        <div class="input-field">
          <input autocomplete="off" id="autocomplete-input" name="teacherName" type="search" placeholder="Search by Email" required class="autocomplete">
          <label for="autocomplete-input"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>


          <button class="btn waves-effect waves-light" style="position: absolute; left: -9999px"  type="submit" name="search">Search
              <i class="material-icons right">search</i>
          </button>
        </div>
      </form>
    </div>
  </nav>
    <? date_default_timezone_set('America/Chicago'); ?>




    <!--FEEDBACK FAB-->


    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large tooltipped" data-position="left" data-delay="50" data-tooltip="Feedback">
            <i class="large material-icons">assignment</i>
        </a>
        <ul>
            <li><a class="btn-floating red modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Bug Report" href="#bugmodal"><i class="material-icons">report_problem</i></a></li>
            <li><a class="btn-floating yellow darken-1 modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Leave A Review" href="#reviewmodal"><i class="material-icons">thumbs_up_down</i></a></li>
            <li><a class="btn-floating green tooltipped" data-position="left" data-delay="50" data-tooltip="Wiki" href="https://poster983.gitbooks.io/passport-help/content/"><i class="material-icons">live_help</i></a></li>
            <li><a class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Github" href="https://github.com/poster983/passport/"><i class="material-icons">code</i></a></li>
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
                        <textarea id="bugtext" name="bugtext" required class="materialize-textarea" length="255"></textarea>
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
                      <textarea id="reviewtext" name="reviewtext" class="materialize-textarea" length="255"></textarea>
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
  <!--Content-->
  <div class="container">
    <!-- Request a pass for students -->
    <!--Students Leaving-->
    <div class="section">
      <div id="studentsLeavingReturn">
            <div class="row">
              <div class="col s12">
                <div id="MyPassesCard" class="card grey darken-3 hoverable">
                  <div class="card-content white-text">
                    <span class="card-title">Students Leaving<sup>Beta</sup></span>
                    <div id="myPassesReturn">
                      <ul class="collection" style="border: 1px solid #424242 !important;">
                        <li class="collection-item avatar grey darken-2 hoverable avatar-clickable" style="border-bottom: 1px solid #424242">
                        <!--<div class="hover-color tint"> -->
                        <div class="submitAnimationEnabled" onclick="collectionAvatarSubmitAnimation($(this));">
                            <img src="/passport/image/favicon.png" alt="Joseph Hassell" class="circle avatar-img">

                              <span class="avatar-icon"><i class="material-icons">create</i></span>
                              <span class="returnIcon"><i class="material-icons small">done</i></span>

                          </div>
                      <!--</div>-->
                          <span class="title">Joseph Hassell</span>
                          <p>LEC</p>
                          <p>A Period</p>
                          <!--<a href="#!" class="secondary-content"><i class="material-icons">delete_forever</i></a>-->
                        </li>
                        <li class="collection-item avatar grey darken-2 hoverable avatar-clickable" style="border-bottom: 1px solid #424242">
                        <!--<div class="hover-color tint"> -->
                        <div class="submitAnimationEnabled" onclick="collectionAvatarSubmitAnimation($(this));">
                            <img src="/passport/image/favicon.png" alt="Joseph Hassell" class="circle avatar-img">

                              <span class="avatar-icon"><i class="material-icons">create</i></span>
                              <span class="returnIcon"><i class="material-icons small">done</i></span>

                          </div>
                      <!--</div>-->
                          <span class="title">Caro Hassell</span>
                          <p>Math</p>
                          <p>D Period</p>
                          <!--<a href="#!" class="secondary-content"><i class="material-icons">delete_forever</i></a>-->
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

  </div>
  <footer class="page-footer grey darken-3">
<div class="footer-copyright">
  <div class="container">
      <a class="black-text left" href="https://www.josephhassell.com/">Copyright © 2016-2017 Joseph Hassell</a> &nbsp &nbsp
      <a class="black-text right" href="https://github.com/poster983/passport/blob/master/LICENSE">License </a> &nbsp &nbsp
      <a class="black-text right" href="https://poster983.github.io/passport/">Project Page &nbsp &nbsp</a>&nbsp &nbsp
  </div>
</div>
</footer>

<!-- Scripts -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
<script src="/passport/js/materialize.js"></script>
<script src="/passport/js/passport.js"></script>

<script>

// Pass Avatar Button
  //hover Effect
  $("ul.collection > li.avatar-clickable").hover(
    function(){
      if ($(".submitAnimationEnabled", this).data("submit-success") != true) {
        $("img.avatar-img", this).addClass("hover-color", 500);
        $("span.avatar-icon", this).addClass("animate");
      }
    }, function() {
      if ($(".submitAnimationEnabled", this).data("submit-success") != true) {
        $("img.avatar-img", this).removeClass("hover-color", 300);
        $("span.avatar-icon", this).removeClass("animate");
      }
    }
  );
//submit animation

function collectionAvatarSubmitAnimation(selector){
  selector.find("span.avatar-icon > i").addClass("animateSubmit");
  selector.find("span.returnIcon").addClass("animate");
  selector.find("span.avatar-icon > i").one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
    function(e) {
      selector.find("span.avatar-icon > i").removeClass("animateSubmit");
      $('span.avatar-icon.animate').removeClass("animate");
      //console.log("done");
  });
  selector.data("submit-success", true);
  //console.log("Animated");
}


//Get Students Leaving
function getStudentsLeaving(teacher, state) {
  $('#studentsLeavingReturn').html("<div class=\"hCenter\">\r\n                <div class=\"preloader-wrapper big active\">\r\n                 <div class=\"spinner-layer spinner-blue\">\r\n                   <div class=\"circle-clipper left\">\r\n                     <div class=\"circle\"><\/div>\r\n                   <\/div><div class=\"gap-patch\">\r\n                     <div class=\"circle\"><\/div>\r\n                   <\/div><div class=\"circle-clipper right\">\r\n                     <div class=\"circle\"><\/div>\r\n                   <\/div>\r\n                 <\/div>\r\n\r\n                 <div class=\"spinner-layer spinner-red\">\r\n                   <div class=\"circle-clipper left\">\r\n                     <div class=\"circle\"><\/div>\r\n                   <\/div><div class=\"gap-patch\">\r\n                     <div class=\"circle\"><\/div>\r\n                   <\/div><div class=\"circle-clipper right\">\r\n                     <div class=\"circle\"><\/div>\r\n                   <\/div>\r\n                 <\/div>\r\n\r\n                 <div class=\"spinner-layer spinner-yellow\">\r\n                   <div class=\"circle-clipper left\">\r\n                     <div class=\"circle\"><\/div>\r\n                   <\/div><div class=\"gap-patch\">\r\n                     <div class=\"circle\"><\/div>\r\n                   <\/div><div class=\"circle-clipper right\">\r\n                     <div class=\"circle\"><\/div>\r\n                   <\/div>\r\n                 <\/div>\r\n\r\n                 <div class=\"spinner-layer spinner-green\">\r\n                   <div class=\"circle-clipper left\">\r\n                     <div class=\"circle\"><\/div>\r\n                   <\/div><div class=\"gap-patch\">\r\n                     <div class=\"circle\"><\/div>\r\n                   <\/div><div class=\"circle-clipper right\">\r\n                     <div class=\"circle\"><\/div>\r\n                   <\/div>\r\n                 <\/div>\r\n               <\/div>\r\n              <\/div> <br> <br> <h5 class='center'>Checking for Passes</h5>");
  $.ajax({
url: 'teacherAJAX/getStudentData.php',
data: {'whatToDo':"getStudentsLeaving",'toState':state,'teacher':teacher},
type: 'post',
success: function(data) {
  var returnPICS = PICS(data);
  if (returnPICS.result == false) {
    Materialize.toast(returnPICS.text, 15000);
  }
$('#studentsLeavingReturn').html("Returned Values");

},
error: function(xhr, desc, err) {
  console.warn("Passport Info Code System: Returned with code \"1001\"-AJAX Error");
  console.log(xhr);
  console.error("Details: " + desc + "\nError:" + err);
  console.warn(xhr.responseText)
  Materialize.toast("There was an error, check console.", 15000);
  $('#studentsLeavingReturn').html("");
}
})};

</script>
</body>

</html>




<?php

//bug report submit code


if(isset($_POST['submitbug'])){


    foreach ($_POST as $key => $value) {

}
{


    $bugname = $_POST['bugname'];
    $bugemail = $_POST['bugemail'];
    $bugtext = htmlspecialchars($_POST['bugtext'],ENT_QUOTES);
    $bugseverity = $_POST['bugseverity'];
    $bugdate = date( 'Y-m-d', strtotime(" today "));
    $bugVersion = $CurrentVersionOfPassport;
}

    $sqlbug = "INSERT INTO feedback (name, email, comment, rating, report_type, date, role, forVersion)
    VALUES ('$bugname', '$bugemail', '$bugtext', '$bugseverity', 'bug', '$bugdate', 'teacher', '$bugVersion')";

    if ($conn->query($sqlbug) === TRUE) {
    echo "<script> Materialize.toast('Bug report submitted successfully', 4000) </script>";
    //echo "Bug report submitted successfully";
    } else {
    echo "Error: " . $sqlbug . "<br>" . $conn->error;

}

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
    $reviewVersion = $CurrentVersionOfPassport;
}

    $sqlreview = "INSERT INTO feedback (name, email, comment, rating, report_type, date, role, forVersion)
    VALUES ('$reviewname', '$reviewemail', '$reviewtext', '$reviewseverity', 'review', '$reviewdate', 'teacher', '$reviewVersion')";

    if ($conn->query($sqlreview) === TRUE) {
    echo "<script> Materialize.toast('Review submitted successfully', 4000) </script>";
    //echo "Review submitted successfully";
    } else {
    echo "Error: " . $sqlreview . "<br>" . $conn->error;

}

}
?>
