<?
include("common.php");
checklogin();
$msg = "";

if(isset($_GET['search'])) {
    $teacherEmailID=$_GET['teacherName'];
    $cookie_name = "teacherEmailRem";
    setcookie($cookie_name, $teacherEmailID, time() + (86400 * 30), "/passport/teacher/");
    //setcookie($cookie_name, $teacherEmailID, 0, "/");
}

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
	     trackerGA(); ?>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/kiosk.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
    <script src="/passport/js/materialize.js"></script>
    <script src="/passport/js/init.js"></script>

</head>

<body class="grey darken-4">
    <? date_default_timezone_set('America/Chicago'); ?>
    <h1 class="center" style='color: #ecf0f1'>Teachers</h1>
    <!-- I donno about the nav -->
    <!--
    <nav>
        <div class="nav-wrapper red darken-4">
            <a href="" class="brand-logo Center">Teacher Dashboard</a>
        </div>
    </nav>
  -->

    <!--FEEDBACK FAB-->


    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red tooltipped" data-position="left" data-delay="50" data-tooltip="Feedback">
            <i class="large material-icons">assignment</i>
        </a>
        <ul>
            <li><a class="btn-floating red modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Bug Report" href="#bugmodal"><i class="material-icons">report_problem</i></a></li>
            <li><a class="btn-floating yellow darken-1 modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Leave A Review" href="#reviewmodal"><i class="material-icons">thumbs_up_down</i></a></li>
            <li><a class="btn-floating green tooltipped" data-position="left" data-delay="50" data-tooltip="Wiki" href="https://github.com/poster983/passport/wiki"><i class="material-icons">live_help</i></a></li>
            <li><a class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Version Info and Licence"><i class="material-icons">info</i></a></li>
        </ul>
    </div>


    <? include "../sqlconnect.php"; ?>


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
    }

        $sqlbug = "INSERT INTO feedback (name, email, comment, rating, report_type, date, role)
        VALUES ('$bugname', '$bugemail', '$bugtext', '$bugseverity', 'bug', '$bugdate', 'teacher')";

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
    }

        $sqlreview = "INSERT INTO feedback (name, email, comment, rating, report_type, date, role)
        VALUES ('$reviewname', '$reviewemail', '$reviewtext', '$reviewseverity', 'review', '$reviewdate', 'teacher')";

        if ($conn->query($sqlreview) === TRUE) {
        echo "<script> Materialize.toast('Review submitted successfully', 4000) </script>";
        //echo "Review submitted successfully";
        } else {
        echo "Error: " . $sqlreview . "<br>" . $conn->error;

}

    }

    ?>

    <div class="container">

<? include "functions.php"; ?>
    <div style='color: #ecf0f1'>
    <br>
    <br>
    <form method="get" action="">
        <div class="row">
            <div class="input-field col s5">
                <label class="active">Email</label>
                <input type="text" autocomplete="off" id="autocompleteName" name="teacherName" value="<? echo $_SESSION['teacherEmail']; ?>" required class="autocomplete inputFields">
            </div>
            <? echo blackout(); ?>
            <div>
                <button class="btn waves-effect waves-light" type="submit" name="search">Search
                    <i class="material-icons right">search</i>
                </button>
            </div>
        </div>

    </form>





    <script>
        var lNameData = [
    <?

    $sql = "SELECT DISTINCT email FROM teachers ORDER BY email";
    $result = $conn -> query($sql);
    if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    echo "{ value: '" . $row["email"] . "'}, ";
                }
    } else {
        echo "{ value: 'No Teachers'}, ";
    }

        ?>
];




        $('#autocompleteName').data('array', lNameData);
    </script>



<?




        if(isset($_GET['search']) || isset($_SESSION['teacherEmail'])){
          if(!isset($_GET['search'])) {
            $teacherName = $_SESSION['teacherEmail'];
          } else {
            $teacherName = $_GET['teacherName'];
          }


            $sql = "SELECT DISTINCT name_title, firstname, lastname, email FROM teachers WHERE email = '$teacherName' ORDER BY lastname";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                     $teacherNameComb = $row["name_title"] . " " . $row["firstname"] . " " . $row["lastname"];
                     $teacherEmail = $row["email"];
                 }
            }
        echo "Showing passes for: <div class='chip'>" . $teacherNameComb . "</div>";

        //echo $teacherEmail;

           $today = date( 'Y-m-d', strtotime(" today "));
            echo "<form method = 'post' action = ''>";
             $sql = "SELECT id, firstname, lastname, period, sh_teacher, place, day_to_come, shTeacherExcused, teacherEmail FROM passes WHERE teacherEmail = '$teacherEmail' AND day_to_come = '$today' ORDER BY period, lastname";
            $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='bordered responsive-table'><thead style='color: #ecf0f1'><tr><th>Excused?</th><th>Name</th><th>Period</th><th>Study Hall Teacher</th><th>Department</th><th>Day</th></tr></thead>";
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
              $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
              });
    </script>


<?

if(isset($_POST['updateIsExcused'])){



        foreach ($_POST as $key => $value) {

  }
    $checkID = $_POST[$row["id"]];
    $sql = "SELECT id, shTeacherExcused FROM passes WHERE day_to_come = '$today' AND teacherEmail = '$teacherEmail' ORDER BY id";
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
            $sqlu = "UPDATE passes SET shTeacherExcused='$isHere' WHERE id='$hereid' AND teacherEmail = '$teacherEmail'";
            if ($conn->query($sqlu) === TRUE) {
                echo "Record updated successfully";

            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        echo "<script>  setTimeout(function () { window.location.href = '/passport/teacher/index.php?" . $_SERVER["QUERY_STRING"] . "'; }, 500);  </script>";

    } else {
        echo "nope";
    }

}


?>


</body>

</html>
