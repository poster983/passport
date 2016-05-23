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
            echo "First Name: " . $first_name;
            echo "Last Name: " . $last_name;
            echo "Student ID: " . $student_id;
            echo "Email: " . $email;
            echo "Place: " . $place;
            echo "Chosen Period: " . $perTab;
            echo "Chosen Teacher: " . $shTeacher;
            echo "Day to come: " . $day;
        }
        {
            include "sqlconnect.php";
            
            $sql = "INSERT INTO passes (firstname, lastname, email, student_id, period, sh_teacher, place, day_to_come)
            VALUES ('$first_name', '$last_name', '$email', '$student_id', '$perTab', '$shTeacher', '$place', '$day')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }

    }
    ?>