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
    <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

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
        $whylec = $_POST['whylec'];
        $whymath = $_POST['whymath'];
        $whylib = $_POST['whylib'];
        $whyhd = $_POST['whyhd'];
        $whywl = $_POST['whywl'];
        $whyfl = $_POST['whyfl'];
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
        $sqltID = "SELECT name_title, lastname, email FROM teachers WHERE email = '$shTeacherEmail'";
        $resulttID = $conn->query($sqltID);

        if ($resulttID->num_rows > 0) {

            while($rowtID = $resulttID->fetch_assoc()) {
              $shTeacher =  $rowtID["name_title"] . " " . $rowtID["lastname"];
            }
          }

        if ($devDebugEchoToggle == 1){
          echo $shTeacher . "Teacher";
        }



$sqltally = "SELECT tally, date, period, place FROM tally WHERE date = '$day' AND place = '$place' AND period = '$perTab'";
$resulttally = $conn->query($sqltally);

if ($resulttally->num_rows > 0) {

    while($rowtally = $resulttally->fetch_assoc()) {
        $newtally = $rowtally["tally"] + 1;

    if ($devDebugEchoToggle == 1){
      echo $newtally;
    }
        //AND 'MAX(id)'

    $sqlupdate = "UPDATE tally SET tally='$newtally' WHERE date = '$day' AND place = '$place' AND period = '$perTab'";

        if ($conn->query($sqlupdate) === TRUE) {
          if ($devDebugEchoToggle == 1){
            echo "Record updated successfully";
          }
        } else {
            echo "Error updating record: " . $conn->error;
        }
}



} else {
    if ($devDebugEchoToggle == 1){
      echo "else";
    }
        $sql = "INSERT INTO tally (tally, date, period, place)
VALUES ('1', '$day', '$perTab', '$place')";

if ($conn->query($sql) === TRUE) {
  if ($devDebugEchoToggle = 1){
    echo "New record created successfully";
  }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}





}

        //LIMIT CHECKER
        echo "<br><a class='waves-effect waves-red btn-flat' href='index.php'>Back</a><br>";
        /*
        $placenospace = str_replace(' ', '', $place);
    $tallylimit = $placenospace . 'slimit';
    echo $$tallylimit;
        echo $tallylimit;
        */

        $sqlslimit = "SELECT studentlimit, dep FROM studentlimit WHERE dep = '$place' LIMIT 1";
        $resultslimit = $conn->query($sqlslimit);

        if ($resultslimit->num_rows > 0) {

            while($rowslimit = $resultslimit->fetch_assoc()) {
              if ($devDebugEchoToggle == 1){
                echo $rowslimit["studentlimit"];
              }
    if ($newtally > $rowslimit["studentlimit"]) {
        echo " <div class='row'><div class='col s12'><div class='card-panel red hoverable'><span class='white-text'>";
        echo "<p class='center'>Sorry, the " . $place . " is full on " . $day . " during " . $perTab . " period.    </p>";
        echo "</span></div></div></div>";
    } else {

        {

            $isHere = 0;
            $shTeacherExcused = 0;
            $sql = "INSERT INTO passes (firstname, lastname, email, student_id, period, sh_teacher, place, day_to_come, reason_to_come, isHere, shTeacherExcused, teacherEmail)
            VALUES ('$first_name', '$last_name', '$email', '$student_id', '$perTab', '$shTeacher', '$place', '$day', '$why', '$isHere', '$shTeacherExcused', '$shTeacherEmail')";

            if ($conn->query($sql) === TRUE) {

                echo "<iframe src='animate/Confirm/publish/web/Confirm.html' style='border: 0; width: 100%; height: 100%'>Requested Pass.</iframe>";



                } else { echo "Error: " . $sql . "
                <br>" . $conn->error; } $conn->close(); } } } } }

}

?>


        <script>
            setTimeout(function () {
                window.location.href = '/index.php'; // the redirect goes here

            }, 15000); // 10 seconds
        </script>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="/js/materialize.js"></script>
        <script src="/js/init.js"></script>

</body>

</html>
