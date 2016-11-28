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



<html>

<head>

  <? include "personalCode.php";
     trackerGA(); ?>

    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

        <!--Browser Colors-->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#b71c1c">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#b71c1c">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
</head>

<body>



    <?php
    date_default_timezone_set('America/Chicago');

if(!isset($_POST['submit'])) exit();

// Required field names
$required = array('first_name', 'last_name', 'student_id', 'email', 'perTab', 'place', 'day');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
    echo "<br><a class='waves-effect waves-red btn-flat' href='index.php'>Back</a><br>";
} else {


    foreach ($_POST as $key => $value) {

  }
    {
        $today = date( 'Y-m-d', strtotime(" today "));
        $first_name = htmlspecialchars($_POST['first_name'],ENT_QUOTES);
        $last_name = htmlspecialchars($_POST['last_name'],ENT_QUOTES);
        $student_id = $_POST['student_id'];
        $email = $_POST['email'];
        $place = $_POST['place'];
        $perTab = $_POST['perTab'];
        $shTeacherA = $_POST['shTeacherA'];
        $shTeacherB = $_POST['shTeacherB'];
        $shTeacherC = $_POST['shTeacherC'];
        $shTeacherD = $_POST['shTeacherD'];
        $shTeacherE = $_POST['shTeacherE'];
        $shTeacherF = $_POST['shTeacherF'];
        $shTeacherG = $_POST['shTeacherG'];
        $shTeacherH = $_POST['shTeacherH'];
        $day = $_POST['day'];
        $whylec = $_POST['whyLEC'];
        $whymath = $_POST['whyMathDepartment'];
        $whylib = $_POST['whyLibrary'];
        $whyhd = $_POST['whyHelpDesk'];
        $whywl = $_POST['whyWritingLab'];
        $whyfl = $_POST['whyForeignLanguage'];
        $whyam = $_POST['whyAthleticMentor'];
        {
            if ($perTab === "a") {
                $shTeacherEmail = $shTeacherA;
        }
            elseif ($perTab === "b") {
                $shTeacherEmail = $shTeacherB;
            }
            elseif ($perTab === "c") {
                $shTeacherEmail = $shTeacherC;
            }
            elseif ($perTab === "d") {
                $shTeacherEmail = $shTeacherD;
            }
            elseif ($perTab == "eL1" ) {
                $shTeacherEmail = $shTeacherE;
            }
            elseif ($perTab == "eL2" ) {
                $shTeacherEmail = $shTeacherE;
            }
            elseif ($perTab == "f") {
                $shTeacherEmail = $shTeacherF;
            }
            elseif ($perTab == "g") {
                $shTeacherEmail = $shTeacherG;
            }
            elseif ($perTab == "h") {
                $shTeacherEmail = $shTeacherH;

            }
            else {
            echo "ERROR, INVALID PERIOD";
        }

        }
        {
            if ($place === "lec") {
                $why = $whylec;
            }
            elseif ($place === "math") {
                $why = $whymath;
            }
            elseif ($place === "library") {
                $why = $whylib;
            }
            elseif ($place === "hd") {
                $why = $whyhd;
            }
            elseif ($place === "Writing Lab") {
                $why = $whywl;
            }
            elseif ($place === "Foreign Language") {
                $why = $whyfl;
            }
            elseif ($place === "Athletic Mentor") {
                $why = $whyam;
            } else {
                echo "Invalid Reason";
            }
        }


        {
           /* echo "First Name: " . $first_name;
            echo "Last Name: " . $last_name;
            echo "Student ID: " . $student_id;
            echo "Email: " . $email;
            echo "Place: " . $place;
            echo "Chosen Period: " . $perTab;
            echo "Chosen Teacher: " . $shTeacher;
            echo "Day to come: " . $day;
            echo "Reason: " . $why;
            */
        }
        include "sqlconnect.php";

        //Convert teacherID to Nametitle Lastname (ID Can be any DISTINCT way of identifying a teacher)
        if ($sqltID = $conn->prepare("SELECT name_title, lastname, email FROM teachers WHERE email = ?")) {

        $sqltID->bind_param("s", $shTeacherEmail);
        $sqltID->execute();
        //$resulttID = $conn->query($sqltID);
        $sqltID->bind_result($tname_title, $tlastname, $void);
        //if ($resulttID->num_rows > 0) {
        while ($sqltID->fetch()) {
          $tname_title;
          $tlastname;

        }
        $sqltID->close();
         //while($rowtID = $resulttID->fetch_assoc()) {
              //$shTeacher =  $rowtID["name_title"] . " " . $rowtID["lastname"];
            //}
          //}
        } else {
          echo "Error finding Teacher Name";
          die ("Mysql Error: " . $conn->error);
        }
        $shTeacher = $tname_title . " " . $tlastname;
        if ($devDebugEchoToggle == 1){
          echo $shTeacher . "Teacher";
        }


//
mysqli_report(MYSQLI_REPORT_ERROR);
if ($sqltally = $conn->prepare("SELECT tally, `date`, place, period FROM `tally` WHERE `date`= ? AND `place`= ? AND `period`= ?")) {
$sqltally->bind_param("sss", $day, $place, $perTab);
$result = $sqltally->execute();
$sqltally->store_result();
$sqltally->bind_result($ctally, $void2, $void3, $void4);


if ($sqltally->num_rows > "0") {
    $sqltallyRow = 1;
    if ($devDebugEchoToggle == 1){
    echo "Number of rows " . $sqltally->num_rows;
    }
    while($sqltally->fetch()) {
        $newtally = $ctally + 1;

    if ($devDebugEchoToggle == 1){
      echo " new Tally: " . $newtally . ".......";
    }
        //AND 'MAX(id)'
}
} else {
  $sqltallyRow = 0;
}
$sqltally->close();
}
  if ($sqltallyRow == 1 ) {
    $sqlupdate = $conn->prepare("UPDATE tally SET tally= ? WHERE `date` = ? AND place = ? AND period = ?");

    $sqlupdate->bind_param('isss', $newtally, $day, $place, $perTab);


    $status = $sqlupdate->execute();
      if ($status === false) {
        trigger_error($sqlupdate->error, E_USER_ERROR);
      }

          if ($devDebugEchoToggle == 1){
            printf("%d Row inserted.\n", $sqlupdate->affected_rows);
          }

  $sqlupdate->close();



} else {
    if ($devDebugEchoToggle == 1){
      echo "else";
    }
        $one = 1;
        $sqlnTally = $conn->prepare("INSERT INTO tally (tally, date, period, place) VALUES (?, ?, ?, ?)");
        $sqlnTally->bind_param("isss", $one, $day, $perTab, $place);
        $sqlnTally->execute();
        $sqlnTally->close();
/*
if ($conn->query($sql) === TRUE) {
  if ($devDebugEchoToggle = 1){
    echo "New record created successfully";
  }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/




}

        //LIMIT CHECKER
        echo "<br><a class='waves-effect waves-red btn-flat' href='index.php'>Back</a><br>";
        /*
        $placenospace = str_replace(' ', '', $place);
    $tallylimit = $placenospace . 'slimit';
    echo $$tallylimit;
        echo $tallylimit;
        */

        $sqlslimit = $conn->prepare( "SELECT studentlimit FROM studentlimit WHERE dep = ? LIMIT 1");
        $sqlslimit->bind_param( "s", $place);

        $sqlslimit->execute();

        $sqlslimit->bind_result($studentlimitl);

        while ($sqlslimit->fetch()) {
          $studentlimitl;
        }
        $sqlslimit->close();
              if ($devDebugEchoToggle == 1){
                echo "student limit for this dep: " . $studentlimitl;
              }
    if ($newtally > $studentlimitl) {
        echo " <div class='row'><div class='col s12'><div class='card-panel red hoverable'><span class='white-text'>";
        echo "<p class='center'>Sorry, the " . $place . " is full on " . $day . " during " . $perTab . " period.    </p>";
        echo "</span></div></div></div>";
    } else {

        {

            $isHere = 0;
            $shTeacherExcused = 0;
            $sqlpin = $conn->prepare("INSERT INTO passes (firstname, lastname, email, student_id, period, sh_teacher, place, day_to_come, reason_to_come, isHere, shTeacherExcused, teacherEmail)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $sqlpin->bind_param("sssisssssiis", $first_name, $last_name, $email, $student_id, $perTab, $shTeacher, $place, $day, $why, $isHere, $shTeacherExcused, $shTeacherEmail);
            $pinexRes = $sqlpin->execute();

                if ($sqlpin && $pinexRes) {

                echo "<iframe src='animate/Confirm/publish/web/Confirm.html' style='border: 0; width: 100%; height: 100%'>Requested Pass.</iframe>";

              } else {
                echo " <div class='row'><div class='col s12'><div class='card-panel red hoverable'><span class='white-text'>";
                echo "<p class='center'>Sorry, There was an error, please try again or go see IT.</p>";
                echo "</span></div></div></div>";
              }

              $sqlpin->close();
              $conn->close();
            }
          }
        }
      }


?>
        <!--
        <script>
            setTimeout(function () {
                window.location.href = '/index.php'; // the redirect goes here

            }, 15000); // 10 seconds
        </script>
      -->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="/passport/js/materialize.js"></script>
        <script src="/passport/js/init.js"></script>

</body>

</html>
