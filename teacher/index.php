<?
include("common.php");
checklogin();
$msg = "";

include "adminconnect.php";
ob_start();
?>


<!--

The MIT License (MIT)

Copyright (c) Sat Jul 02 2016 Joseph Hassell joseph@thehassellfamily.net

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
    <link href="/passport/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/kiosk.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--FavIcon-->

    <link rel="shortcut icon" type="image/png" href="/passport/image/favicon.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
    <script src="/passport/js/materialize.js"></script>
    <script src="/passport/js/passport.js"></script>

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
      <a href="#" class="brand-logo left">Teachers</a>
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
          <input autocomplete="off" id="autocomplete-input" name="teacherName" type="search" required class="autocomplete">
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
            <li><a class="btn-floating green tooltipped" data-position="left" data-delay="50" data-tooltip="Wiki" href="https://github.com/poster983/passport/wiki"><i class="material-icons">live_help</i></a></li>
            <li><a class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Version Info and Licence"><i class="material-icons">info</i></a></li>
        </ul>
    </div>
<?
if (isset($_COOKIE['errorExcused'])) {
  $modalConfirmar = explode("&&%%", $_COOKIE["errorExcused"]);
?>
<!--ConfirmModel-->

<div id="confirmModel" class="modal">
    <div class="modal-content">
      <h4><? echo $modalConfirmar[0]; ?></h4>
      <p><? echo $modalConfirmar[1]; ?></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
    </div>
  </div>

<?

  echo "<script>$('#confirmModel').openModal();</script>";
  setcookie("errorExcused","byebye",time()-1);
}
if (isset($_COOKIE['confirmExcused'])) {
  ?>

  <div id="confirmOver" class="overlay-full">
    <div class="overlay-content">
    <div id="checkmarkAnimationfull">

  </div>
    <h1 class="center white-text">Operation Complete</h1>
    <a href="javascript:void(0)" class="closebtn-overlay" onclick="closeFullOverlay('confirmOver', 0)">&times;</a>
  </div>
</div>
  <script>
  openFullOverlay("confirmOver");
  setTimeout(function(){
    $( "#checkmarkAnimationfull" ).html('<svg class="pause-Ani checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path id="checkMarkAni"  class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>');
    $('#checkMarkAni').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
      function(e) {
        console.log("done");
      closeFullOverlay("confirmOver", 1000);
      });
  }, 500);

  </script>
  <?
  setcookie("confirmExcused","byebye",time()-1);
}

?>

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

    ?>



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
   include "functions.php";
    teacherMess();
    ?>

    <div class="container">



    <br>
    <br>


<div style='color: #ecf0f1'>
  <? echo blackout(); ?>









<?




        if(isset($_GET['search']) || isset($_SESSION['teacherID'])){
          if(!isset($_GET['search'])) {
            $teacherName = "id = '" . $_SESSION['teacherID'] . "'";
          } else {
            $teacherName = "email = '" . $_GET['teacherName'] . "'";
          }


            $sql = "SELECT id, name_title, firstname, lastname, email FROM teachers WHERE $teacherName ORDER BY lastname";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                     $teacherNameComb = $row["name_title"] . " " . $row["firstname"] . " " . $row["lastname"];
                     $teacherID = $row["id"];
                 }
            }
        echo "Showing passes for: <div class='chip'>" . $teacherNameComb . "</div>";

        //echo $teacherEmail;

           $today = date( 'Y-m-d', strtotime(" today "));
            echo "<form method = 'post' action = ''>";
             $sql = "SELECT id, firstname, lastname, period, sh_teacher, place, day_to_come, shTeacherExcused, teacherAccountID FROM passes WHERE teacherAccountID = '$teacherID' AND day_to_come = '$today' ORDER BY period, lastname";
            $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='bordered'><thead style='color: #ecf0f1'><tr><th>Excused?</th><th>Name</th><th>Period</th><th>Study Hall Teacher</th><th>Department</th><th>Day</th></tr></thead>";
        // output data of each row
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            if($row["shTeacherExcused"] == 1){
            $inputChecked = ' checked="checked"';
        } else {
            $inputChecked = '';
        }
            echo "<tr style='color: #ecf0f1'><td><input type='checkbox' id='" . $row["id"] . "' name='" . $row["id"] . "'" . $inputChecked . "' value='1' /> <label for='" . $row["id"] . "'>Student Excused</label> </td><td>" . $row["lastname"] . ", " . $row["firstname"]. "</td><td>" . $row["period"]. "</td><td>" . $row["sh_teacher"]. "</td><td>" . $row["place"]. "</td><td>" . $row["day_to_come"]. "</td></tr></tbody>";
        }

        echo "</tbody></table>";
        echo "<button class='btn waves-effect waves-light' type='submit' name='updateIsExcused'>Submit <i class='material-icons right'>mode_edit</i></button>";
        echo "</form>";
        } else {
            echo "0 results";
        }

        }
    ?>
  </div>
</div>
            <footer class="page-footer grey darken-3">
        <div class="footer-copyright">
            <div class="container">
                <a class="black-text left" href="https://www.josephhassell.com/">Copyright © 2016 Joseph Hassell</a> &nbsp &nbsp
                <a class="black-text right" href="https://github.com/poster983/passport/blob/master/LICENSE">License </a> &nbsp &nbsp
                <a class="black-text right" href="https://poster983.github.io/passport/">Project Page &nbsp &nbsp</a>&nbsp &nbsp
            </div>
        </div>
    </footer>


    <script>
    $('.modal-trigger').leanModal();
    $(document).ready(function(){
    $('input.autocomplete').autocomplete({
        data: {
        <?
        $sql = "SELECT DISTINCT email FROM teachers ORDER BY email";
        $result = $conn -> query($sql);
        if ($result -> num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        echo '"' . $row['email']. '"'. ": null, ";
                    }
        } else {
            echo "{ value: 'No Teachers'}, ";
        }
        ?>
      }
    });
  });
    </script>
<?
    if(isset($_POST['updateIsExcused'])){



            foreach ($_POST as $key => $value) {

      }
        $checkID = $_POST[$row["id"]];
        $sql = "SELECT id, shTeacherExcused FROM passes WHERE day_to_come = '$today' AND teacherAccountID = '$teacherID' ORDER BY id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $$row["id"] = $_POST[$row["id"]];
                $hereid = $row["id"];
                echo $hereid;
                if ($$row["id"] == 1) {
                    $isHere = 1;
                    echo $isHere;
                } else {
                    $isHere = 0;
                    echo $isHere;
                }
                $sqlu = "UPDATE passes SET shTeacherExcused='$isHere' WHERE id='$hereid' AND teacherAccountID = '$teacherID'";
                if ($conn->query($sqlu) === TRUE) {

                    setcookie("confirmExcused", "Yes");

                } else {
                    $updateResponse = "Error updating record: " . $conn->error;
                    $updateResponseShort = "Error";
                    setcookie("errorExcused", $updateResponseShort . "&&%%" .  $updateResponse);
                }
            }



        } else {
            $updateResponse =  "No idea what went wrong... Just submit a bug report saying: <br> \"updateIsExcused\" num_rows == 0 error.";
            $updateResponseShort = "Error";
            setcookie("errorExcused", $updateResponseShort . "&&%%" .  $updateResponse);
        }



        echo "<script>  setTimeout(function () { window.location.href = '/passport/teacher/index.php?" . $_SERVER["QUERY_STRING"] . "'; }, 500);  </script>";
    }


    ?>


</body>

</html>
