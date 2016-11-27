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

<?
include "../sqlconnect.php";

$tablesucsess = 0;
$tablenext = "<a href=''>Please Wait</a>";

// sql to create table PASSES
$sqlpasses = "CREATE TABLE passes (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
student_id VARCHAR(10) NOT NULL,
period VARCHAR(10) NOT NULL,
sh_teacher VARCHAR(40) NOT NULL,
place VARCHAR(50) NOT NULL,
day_to_come VARCHAR(10) NOT NULL,
reason_to_come VARCHAR(255) NOT NULL,
isHere VARCHAR(5) NOT NULL DEFAULT '0',
shTeacherExcused VARCHAR(5) NOT NULL DEFAULT '0',
teacherAccountID INT(10) UNSIGNED NOT NULL,
studentAccountID INT(10) UNSIGNED NOT NULL,
request_date TIMESTAMP
)";



// sql to create table Teachers
$sqlteachers = "CREATE TABLE teachers (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name_title VARCHAR(5) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
room VARCHAR(10) NOT NULL,
period VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL
)";


// sql to create table admin
$sqladmin = "CREATE TABLE admin (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(255) NOT NULL
)";


// sql to create table blackout
$sqlblackout = "CREATE TABLE blackout (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
day VARCHAR(20) NOT NULL,
department VARCHAR(50) NOT NULL,
period VARCHAR(100) NOT NULL,
reason VARCHAR(255) NOT NULL
)";

$sqlmessage = "CREATE TABLE message (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
day VARCHAR(50) NOT NULL,
dep VARCHAR(100) NOT NULL,
reason VARCHAR(255) NOT NULL
)";

$sqlwhy = "CREATE TABLE why (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
dep VARCHAR(50) NOT NULL,
why VARCHAR(255) NOT NULL
)";

$sqltally = "CREATE TABLE tally (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tally VARCHAR(255) NOT NULL,
date VARCHAR(255) NOT NULL,
period VARCHAR(255) NOT NULL,
place VARCHAR(255) NOT NULL
)";

$sqlstudentlimit = "CREATE TABLE studentlimit (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
studentlimit INT(10) UNSIGNED,
dep VARCHAR(255) NOT NULL
)";


$sqlfeedback = "CREATE TABLE feedback (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
comment VARCHAR(255) NOT NULL,
rating VARCHAR(255) NOT NULL,
report_type VARCHAR(255) NOT NULL,
date VARCHAR(255) NOT NULL,
role VARCHAR(255) NOT NULL,
forVersion VARCHAR(255) NOT NULL
)";

$sqlstudentaccount = "CREATE TABLE studentaccount (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(255) NOT NULL,
lastname VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
student_id VARCHAR(10) NOT NULL,
sh_period VARCHAR(10) NOT NULL,
sh_teacher_ID VARCHAR(40) NOT NULL,
student_year VARCHAR(255) NOT NULL,
email_Verify_Status int(1) UNSIGNED NOT NULL DEFAULT '0',
banned_until_date DATE DEFAULT '2000-01-01',
needsReset int(1) UNSIGNED NOT NULL DEFAULT '0',
password TEXT NOT NULL,
archived int(1) UNSIGNED NOT NULL DEFAULT '0'
)";

$sqlstudentaccountverify = "CREATE TABLE studentaccountverify (
  id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  studentaccountID INT(10) UNSIGNED NOT NULL,
  UniquekeyVal TEXT NOT NULL
)";




if ($conn->query($sqlpasses) === TRUE) {
    $tablesucsess += 1;
    echo "\nTable Passes created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}

if ($conn->query($sqlteachers) === TRUE) {
    $tablesucsess += 1;
    echo "\nTable teachers created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}

if ($conn->query($sqladmin) === TRUE) {
    $tablesucsess += 1;
    echo "\nTable Admin created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}

if ($conn->query($sqlblackout) === TRUE) {
    $tablesucsess += 1;
    echo "\nTable Blackout created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}

if ($conn->query($sqlmessage) === TRUE) {
    $tablesucsess += 1;
    echo "\nTable Message created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}

if ($conn->query($sqlwhy) === TRUE) {
    $tablesucsess += 1;
    echo "\nTable Why created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}


if ($conn->query($sqltally) === TRUE) {
    $tablesucsess += 1;
    echo "\nTable Tally created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}


if ($conn->query($sqlstudentlimit) === TRUE) {
    $tablesucsess += 1;
    echo "\nTable Studentlimit created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}

if ($conn->query($sqlfeedback) === TRUE) {
    $tablesucsess += 1;
    echo "\nTable Feedback created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}

if ($conn->query($sqlstudentaccount) === TRUE) {
    $tablesucsess += 1;
    echo "\nTable studentaccount created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}
if ($conn->query($sqlstudentaccountverify) === TRUE) {
    $tablesucsess += 1;
    echo "\nTable studentaccountverify created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}

if ($tablesucsess == 11) {
    echo "\n\n11 tables created";
    $tablenext = "\n<a href='step3.php'>Next --></a>";
} else {
    echo "\n\nThere was an error creating all of the tables.";
    $tablenext = "\n<a href='index.php'>Try Again</a>";

}






$conn->close();
?>
