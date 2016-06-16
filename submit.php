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
} else {

    
    foreach ($_POST as $key => $value) {

  }
    {
        $today = date( 'Y-m-d', strtotime(" today "));
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
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
                $shTeacher = $shTeacherA;
        } 
            elseif ($perTab === "b") {
                $shTeacher = $shTeacherB;
            }
            elseif ($perTab === "c") {
                $shTeacher = $shTeacherC;
            }
            elseif ($perTab === "d") {
                $shTeacher = $shTeacherD;
            }
            elseif ($perTab === "e") {
                $shTeacher = $shTeacherE;
            }
            elseif ($perTab === "f") {
                $shTeacher = $shTeacherF;
            }
            elseif ($perTab === "g") {
                $shTeacher = $shTeacherG;
            }
            elseif ($perTab === "h") {
                $shTeacher = $shTeacherH;
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
        
$sqltally = "SELECT tally, date, period, place FROM tally WHERE date = '$day' AND place = '$place' AND period = '$perTab'";
$resulttally = $conn->query($sqltally);

if ($resulttally->num_rows > 0) {
    
    while($rowtally = $resulttally->fetch_assoc()) {
        $newtally = $rowtally["tally"] + 1;
        
        
    echo $newtally;
        //AND 'MAX(id)'
    
    $sqlupdate = "UPDATE tally SET tally='$newtally' WHERE date = '$day' AND place = '$place' AND period = '$perTab'";

        if ($conn->query($sqlupdate) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
}
    
    
    
} else {
    echo "else";
        $sql = "INSERT INTO tally (tally, date, period, place)
VALUES ('1', '$day', '$perTab', '$place')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    
}
        
        
        
        
        
}
        $placenospace = str_replace(' ', '', $place);
    $tallylimit = $placenospace . 'slimit';
    echo $tallylimit;
    //if $newtally >= 
        
        {
             
            
            $sql = "INSERT INTO passes (firstname, lastname, email, student_id, period, sh_teacher, place, day_to_come, reason_to_come)
            VALUES ('$first_name', '$last_name', '$email', '$student_id', '$perTab', '$shTeacher', '$place', '$day', '$why')";

            if ($conn->query($sql) === TRUE) {
                
                //echo "<iframe src='animate/Confirm/publish/web/Confirm.html' style='border: 0; width: 100%; height: 100%'>Requested Pass.</iframe>";
                
               
                
                } else { echo "Error: " . $sql . "
                <br>" . $conn->error; } $conn->close(); } } }

?>