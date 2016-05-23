<?php

if(!isset($_POST['submit'])) exit();

// Required field names
$required = array('first_name', 'last_name', 'student_id', 'email', 'perTab', 'place');

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