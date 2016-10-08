<!--

The MIT License (MIT)

Copyright (c) Mon May 23 2016 Joseph Hassell joseph@thehassellfamily.net

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

-->

<html>

<head>
    <title>Passport</title>
    <? include "personalCode.php";
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

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>



</head>

<body>
  <? date_default_timezone_set('America/Chicago'); ?>
    <!-- Request closed overlay -->

    <?

    if(date("l") == "Sunday" OR date("l") == "Saturday") {
        $overlayClosedReasonH1 = "Pass Requests are closed on the weekends.";
        $closedFormAction = "";
        $blurClass = "blur-g";
        echo "<script>$(document).ready(function(){openFullOverlay()});</script>";
    } else {
        $closedFormAction = "/passport/submit.php";

    }

    ?>


    <div id="overlayFull" class="overlay-full">

        <div class="overlay-full-content">
            <h1 class="black-text"><? echo $overlayClosedReasonH1; ?></h1>
        </div>

    </div>

    <div id="blurg" class="<? echo $blurClass; ?>">

    <!--Navbar-->
    <nav>
        <div class="nav-wrapper ">
            <a href="#" class="brand-logo center">Passport</a>

        </div>
    </nav>

    <!--Body-->



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


    <? include "sqlconnect.php"; ?>


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
    }

        $sqlbug = $conn->prepare("INSERT INTO feedback (name, email, comment, rating, report_type, `date`, role)
        VALUES (?, ?, ?, ?, ?, ?, ?)");

        $sqlbug->bind_param("sssisss", $bugname, $bugemail, $bugtext, $bugseverity, $bugReportType, $bugdate, $bugRole);
        if ($sqlbug->execute()) {
          echo "<script> Materialize.toast('Bug report submitted successfully', 4000) </script>";
        } else {
          echo "<script> Materialize.toast('There was an error. contact IT', 14000) </script>";
        }
        $sqlbug->close();


    }

    ?>

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

    <?

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
    }

        $sqlbug = $conn->prepare("INSERT INTO feedback (name, email, comment, rating, report_type, `date`, role)
        VALUES (?, ?, ?, ?, ?, ?, ?)");

        $sqlbug->bind_param("sssisss", $reviewname, $reviewemail, $reviewtext, $reviewseverity, $reviewReportType, $reviewdate, $reviewRole);
        if ($sqlbug->execute()) {
          echo "<script> Materialize.toast('Review submitted successfully', 4000) </script>";
        } else {
          echo "<script> Materialize.toast('There was an error. contact IT', 14000) </script>";
        }
        $sqlbug->close();
    }

    ?>




    <!--Tabs-->
    <br>

        <form method="post" action=" <? echo $closedFormAction; ?> ">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">

                        <li class="tab col s3"><a id="efTab" href="#lec">Executive Functioning</a></li>
                        <li class="tab col s3"><a id="mathTab" href="#math">Math</a></li>
                        <li class="tab col s3"><a id="libTab" href="#library">Library</a></li>
                        <li class="tab col s3"><a id="hdTab" href="#helpDesktab">Help Desk</a></li>
                        <li class="tab col s3"><a id="wlTab" href="#writingLabtab">Writing Lab</a></li>
                        <li class="tab col s3"><a id="flTab" href="#FLtab">Foreign Language</a></li>
                        <li class="tab col s3"><a id="amTab" href="#AMtab">Athletic Mentor</a></li>
                    </ul>
                </div>

                <div id="depCont" class="container blur-sect">
                    <? include "function.php"; ?>

                        <div id="lec" class="col s12">
                            <p>
                                <!-- Blackout Function -->
                                <? LECout(); ?>
                                <!-- Message Function -->
                                    <? LECmess(); ?>
                                <!-- Confirm Radio -->
                                        <input class="with-gap" type="radio" name="place" value="lec" required id="lecConfirm" />
                                        <label for="lecConfirm">Confirm Executive Functioning</label>
                                        <br>
                                        <br>
                                        <br>
                                        <? reasonSel('LEC'); ?>
                            </p>
                        </div>
                        <div id="math" class="col s12">
                            <p>
                                <!-- Blackout Function -->
                                <? MATHout(); ?>
                                <!-- Message Function -->
                                    <? MATHmess(); ?>
                                <!-- Confirm Radio -->
                                        <input class="with-gap" type="radio" name="place" value="math" id="mathConfirm" />
                                        <label for="mathConfirm">Confirm Math</label>
                                        <br>
                                        <br>
                                        <br>
                                        <? reasonSel('Math Department'); ?>

                            </p>
                        </div>
                        <div id="library" class="col s12">
                            <p>
                                <!-- Blackout Function -->
                                <? LIBout(); ?>
                                <!-- Message Function -->
                                    <? LIBmess(); ?>
                                <!-- Confirm Radio -->

                                        <input class="with-gap" type="radio" name="place" value="library" id="libConfirm" />
                                        <label for="libConfirm">Confirm Library</label>
                                        <br>
                                        <br>
                                        <br>
                                        <? reasonSel('Library'); ?>

                            </p>
                        </div>
                        <div id="helpDesktab" class="col s12">
                            <p>
                                <!-- Blackout Function -->
                                <? HDout(); ?>
                                <!-- Message Function -->
                                    <? HDmess(); ?>
                                <!-- Confirm Radio -->
                                        <input class="with-gap" type="radio" name="place" value="hd" id="HDConfirm" />
                                        <label for="HDConfirm">Confirm Help Desk</label>
                                        <br>
                                        <br>
                                        <br>
                                        <? reasonSel('Help Desk'); ?>

                            </p>
                        </div>
                        <div id="writingLabtab" class="col s12">
                            <p>
                                <!-- Blackout Function -->
                                <? WLout(); ?>
                                <!-- Message Function -->
                                    <? WLmess(); ?>
                                <!-- Confirm Radio -->
                                        <input class="with-gap" type="radio" name="place" value="Writing Lab" id="WLConfirm" />
                                        <label for="WLConfirm">Confirm Writing Lab</label>
                                        <br>
                                        <br>
                                        <br>
                                        <? reasonSel('Writing Lab'); ?>

                            </p>
                        </div>
                        <div id="FLtab" class="col s12">
                            <p>
                                <!-- Blackout Function -->
                                <? FLout(); ?>
                                <!-- Message Function -->
                                    <? FLmess(); ?>
                                <!-- Confirm Radio -->
                                        <input class="with-gap" type="radio" name="place" value="Foreign Language" id="FLConfirm" />
                                        <label for="FLConfirm">Confirm Foreign Language</label>
                                        <br>
                                        <br>
                                        <br>
                                        <? reasonSel('Foreign Language'); ?>

                            </p>
                        </div>
                        <div id="AMtab" class="col s12">
                            <p>
                                <!-- Blackout Function -->
                                <? AMout(); ?>
                                <!-- Message Function -->
                                    <? AMmess(); ?>
                                <!-- Confirm Radio -->
                                        <input class="with-gap" type="radio" name="place" value="Athletic Mentor" id="AMConfirm" />
                                        <label for="AMConfirm">Confirm Athletic Mentor</label>
                                        <br>
                                        <br>
                                        <br>
                                        <? reasonSel('Athletic Mentor'); ?>

                            </p>
                        </div>
                </div>
            </div>
            <!-- general info inputs -->
            <div class="container">
                <div class="row">
                    <div class="col s12">



                        <div id="genInfoInput" class="row blur-sect">
                            <div class="input-field col s6">
                                <input id="first_name" name="first_name" type="text" required class="validate">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="last_name" name="last_name" type="text" required class="validate">
                                <label for="last_name">Last Name</label>
                            </div>
                            <div class="input-field col s8">
                                <input id="email" name="email" type="email" required class="validate">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="student_id" name="student_id" type="text" required class="validate">
                                <label for="student_id">Student ID</label>
                            </div>
                            <div class="section">
                                <!-- Date radios -->
                                <h5 class="center">Pick the day that you are coming.</h5>

                                <div>
                                    <p class="center">
                                        <input type="radio" id="monday" onclick="incBlur('day')" name="day" on required value="<? echo date( 'Y-m-d', strtotime("monday this week")); ?>">
                                        <label for="monday">Monday</label>
                                        &nbsp &nbsp
                                        <input type="radio" id="tuesday" onclick="incBlur('day')" name="day" value="<? echo date( 'Y-m-d', strtotime(" tuesday this week ")); ?>">
                                        <label for="tuesday">Tuesday</label>
                                        &nbsp &nbsp
                                        <input type="radio" id="wednesday" onclick="incBlur('day')" name="day" value="<? echo date( 'Y-m-d', strtotime(" wednesday this week ")); ?>">
                                        <label for="wednesday">Wednesday</label>
                                        &nbsp &nbsp
                                        <input type="radio" id="thursday" onclick="incBlur('day')" name="day" value="<? echo date( 'Y-m-d', strtotime(" thursday this week ")); ?>">
                                        <label for="thursday">Thursday</label>
                                        &nbsp &nbsp
                                        <input type="radio" id="friday" onclick="incBlur('day')" name="day" value="<? echo date( 'Y-m-d', strtotime(" friday this week ")); ?>">
                                        <label for="friday">Friday</label>

                                    </p>

                                </div>
                            </div>
                        </div>
                        <!-- Period Tabs -->
                        <div class="row">
                            <div class="col s12">
                                <ul id="periodTabs" class="tabs blur-sect">
                                    <li class="tab col s3"><a id="aperTab" href="#aper">A Period</a></li>
                                    <li class="tab col s3"><a id="bperTab" href="#bper">B Period</a></li>
                                    <li class="tab col s3"><a id="cperTab" href="#cper">C Period</a></li>
                                    <li class="tab col s3"><a id="dperTab" href="#dper">D Period</a></li>
                                    <li class="tab col s3"><a id="eperTab" href="#eper">E Period</a></li>
                                    <li class="tab col s3"><a id="fperTab" href="#fper">F Period</a></li>
                                    <li class="tab col s3"><a id="gperTab" href="#gper">G Period</a></li>
                                    <li class="tab col s3"><a id="hperTab" href="#hper">H Period</a></li>
                                </ul>
                            </div>
                            <div id="shTeacherALLSelect" class="blur-sect">
                            <!--AAAAAAAAAAAAAAAAAAA-->

                            <div id="aper" class="col s12">
                                <p>
                                    <select name="shTeacherA" class="browser-default" onchange="perTabBundCheck('shTeacher')">
                                        <option selected value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";


                                    $sql="SELECT name_title,firstname,lastname,email FROM teachers WHERE period='a' ORDER BY lastname";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            echo '<option value="'. $row['email'] . '">' .$row['name_title'] . ' ' . $row['firstname'] . ' ' . $row['lastname'] . "</option>";
                                        }

                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>
                                    <input class="with-gap" type="radio" onclick="perTabBundCheck('confirm')" name="perTab" value="a" required id="aConfirm" />
                                    <label for="aConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--BBBBBBBBBBBBBBBBBBB-->
                            <div id="bper" class="col s12">
                                <p>
                                    <select name="shTeacherB" class="browser-default" onchange="perTabBundCheck('shTeacher')">
                                        <option selected disabled value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";


                                    $sql="SELECT name_title,firstname,lastname,email FROM teachers WHERE period='b' ORDER BY lastname";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            echo '<option value="'. $row['email'] . '">' .$row['name_title'] . ' ' . $row['firstname'] . ' ' . $row['lastname'] . "</option>";
                                        }

                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>


                                    <input class="with-gap" type="radio" onclick="perTabBundCheck('confirm')" name="perTab" value="b" id="bConfirm" />
                                    <label for="bConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--CCCCCCCCCCCCCCCCCCCC-->
                            <div id="cper" class="col s12">
                                <p>

                                    <select name="shTeacherC" class="browser-default" onchange="perTabBundCheck('shTeacher')">
                                        <option selected disabled value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";


                                    $sql="SELECT name_title,firstname,lastname,email FROM teachers WHERE period='c' ORDER BY lastname";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            echo '<option value="'. $row['email'] . '">' .$row['name_title'] . ' ' . $row['firstname'] . ' ' . $row['lastname'] . "</option>";
                                        }

                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>

                                    <input class="with-gap" type="radio" onclick="perTabBundCheck('confirm')" name="perTab" value="c" id="cConfirm" />
                                    <label for="cConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--DDDDDDDDDDDDDDDDDDDD-->
                            <div id="dper" class="col s12">
                                <p>
                                    <select name="shTeacherD" class="browser-default" onchange="perTabBundCheck('shTeacher')">
                                        <option selected disabled value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";


                                    $sql="SELECT name_title,firstname,lastname,email FROM teachers WHERE period='d' ORDER BY lastname";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            echo '<option value="'. $row['email'] . '">' .$row['name_title'] . ' ' . $row['firstname'] . ' ' . $row['lastname'] . "</option>";
                                        }

                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>
                                    <input class="with-gap" type="radio" onclick="perTabBundCheck('confirm')" name="perTab" value="d" id="dConfirm" />
                                    <label for="dConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--EEEEEEEEEEEEEEEEEEEE-->
                            <div id="eper" class="col s12">
                                <p>
                                    <select name="shTeacherE" class="browser-default" onchange="perTabBundCheck('shTeacher')">
                                        <option selected disabled value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";


                                    $sql="SELECT name_title,firstname,lastname,email FROM teachers WHERE period='e' ORDER BY lastname";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            echo '<option value="'. $row['email'] . '">' .$row['name_title'] . ' ' . $row['firstname'] . ' ' . $row['lastname'] . "</option>";
                                        }

                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>
                                    <input class="with-gap" type="radio" onclick="perTabBundCheck('confirm')" name="perTab" value="eL1" id="eL1Confirm" />
                                    <label for="eL1Confirm">Confirm E Period (First Lunch)</label>
                                    <input class="with-gap" type="radio" onclick="perTabBundCheck('confirm')" name="perTab" value="eL2" id="eL2Confirm" />
                                    <label for="eL2Confirm">Confirm E Period (Second Lunch)</label>
                                </p>
                            </div>
                            <!--FFFFFFFFFFFFFFFFFFFF-->
                            <div id="fper" class="col s12">
                                <p>
                                    <select name="shTeacherF" class="browser-default" onchange="perTabBundCheck('shTeacher')">
                                        <option selected disabled value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";


                                    $sql="SELECT name_title,firstname,lastname,email FROM teachers WHERE period='f' ORDER BY lastname";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            echo '<option value="'. $row['email'] . '">' .$row['name_title'] . ' ' . $row['firstname'] . ' ' . $row['lastname'] . "</option>";
                                        }

                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>
                                    <input class="with-gap" type="radio" onclick="perTabBundCheck('confirm')" name="perTab" value="f" id="fConfirm" />
                                    <label for="fConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--GGGGGGGGGGGGGGGGGGGG-->
                            <div id="gper" class="col s12">
                                <p>
                                    <select name="shTeacherG" class="browser-default" onchange="perTabBundCheck('shTeacher')">
                                        <option selected disabled value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";


                                    $sql="SELECT name_title,firstname,lastname,email FROM teachers WHERE period='g' ORDER BY lastname";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            echo '<option value="'. $row['email'] . '">' .$row['name_title'] . ' ' . $row['firstname'] . ' ' . $row['lastname'] . "</option>";
                                        }

                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>
                                    <input class="with-gap" type="radio" onclick="perTabBundCheck('confirm')" name="perTab" value="g" id="gConfirm" />
                                    <label for="gConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--HHHHHHHHHHHHHHHHHHHH-->
                            <div id="hper" class="col s12">
                                <p>
                                    <select name="shTeacherH" class="browser-default" onchange="perTabBundCheck('shTeacher')">
                                        <option selected disabled value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";


                                    $sql="SELECT name_title,firstname,lastname,email FROM teachers WHERE period='h' ORDER BY lastname";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            echo '<option value="'. $row['email'] . '">' .$row['name_title'] . ' ' . $row['firstname'] . ' ' . $row['lastname'] . "</option>";
                                        }

                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>
                                    <input class="with-gap" type="radio" onclick="perTabBundCheck('confirm')" name="perTab" value="h" id="hConfirm" />
                                    <label for="hConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                          </div>
                            <!--END-->
                            <!--SH Select-->

                        </div>

                    </div>
                </div>

                <button id="finPassSubmitThang" class="btn waves-effect waves-light tooltipped blur-sect" data-position="top" data-delay="50" data-tooltip="You CANNOT cancel this pass.  You are required to come. " type="submit" name="submit">Request a pass
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>




        <!-- Footer -->


        <footer class="page-footer white">
            <div class="footer-copyright">
                <div class="container">
                    <a class="black-text left" href="https://www.josephhassell.com/">Copyright © 2016 Joseph Hassell</a> &nbsp &nbsp
                    <a class="black-text right" href="https://github.com/poster983/passport/blob/master/LICENSE">License </a> &nbsp &nbsp
                    <a class="black-text right" href="https://poster983.github.io/passport/">Project Page &nbsp &nbsp</a>&nbsp &nbsp
                </div>
            </div>
        </footer>
    </div>



        <!--js-->





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
        <script>
              $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
              });

              </script>
<script src="/passport/js/passr.js"></script>
</body>

</html>
