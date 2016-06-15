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
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
student_id VARCHAR(10) NOT NULL,
period VARCHAR(10) NOT NULL,
sh_teacher VARCHAR(40) NOT NULL,
place VARCHAR(50) NOT NULL,
day_to_come VARCHAR(10) NOT NULL,
reason_to_come VARCHAR(255) NOT NULL,
request_date TIMESTAMP
)";



// sql to create table Teachers
$sqlteachers = "CREATE TABLE teachers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name_title VARCHAR(5) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
room VARCHAR(10) NOT NULL,
period VARCHAR(10) NOT NULL
)";


// sql to create table admin
$sqladmin = "CREATE TABLE admin (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(100) NOT NULL
)";


// sql to create table blackout
$sqlblackout = "CREATE TABLE blackout (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
day VARCHAR(20) NOT NULL,
department VARCHAR(50) NOT NULL,
period VARCHAR(100) NOT NULL,
reason VARCHAR(255) NOT NULL
)";

$sqlmessage = "CREATE TABLE message (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
day VARCHAR(50) NOT NULL,
dep VARCHAR(100) NOT NULL,
reason VARCHAR(255) NOT NULL
)";

$sqlwhy = "CREATE TABLE why (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
dep VARCHAR(50) NOT NULL,
why VARCHAR(255) NOT NULL
)";

$sqltally = "CREATE TABLE tally (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tally VARCHAR(255) NOT NULL,
date VARCHAR(255) NOT NULL,
period VARCHAR(255) NOT NULL,
place VARCHAR(255) NOT NULL
)";

if ($conn->query($sqlpasses) === TRUE) {
    $tablesucsess += 1;
    echo "Table Passes created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($sqlteachers) === TRUE) {
    $tablesucsess += 1;
    echo "Table teachers created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($sqladmin) === TRUE) {
    $tablesucsess += 1;
    echo "Table teachers created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($sqlblackout) === TRUE) {
    $tablesucsess += 1;
    echo "Table Blackout created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($sqlmessage) === TRUE) {
    $tablesucsess += 1;
    echo "Table Message created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($sqlwhy) === TRUE) {
    $tablesucsess += 1;
    echo "Table Why created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


if ($conn->query($sqltally) === TRUE) {
    $tablesucsess += 1;
    echo "Table Tally created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


if ($tablesucsess == 6) {
    echo "All tables created";
    $tablenext = "<a href='step3.php'>Next --></a>";
} else {
    echo "There was an error creating all the tables.";
    $tablenext = "<a href='index.php'>Try Again</a>";
        
}






$conn->close();
?>