<?
include "sqlconnect.php";

// sql to create table PASSES
$sqlpasses = "CREATE TABLE passes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
student_id VARCHAR(10) NOT NULL,
period VARCHAR(10) NOT NULL,
sh_teacher VARCHAR(40) NOT NULL,
place VARCHAR(10) NOT NULL,
day_to_come VARCHAR(10) NOT NULL,
request_date TIMESTAMP
)";



// sql to create table Teachers
$sqlteachers = "CREATE TABLE teachers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name_title VARCHAR(5) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
period VARCHAR(10) NOT NULL
)";

if ($conn->query($sqlpasses) === TRUE) {
    echo "Table Passes created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($sqlteachers) === TRUE) {
    echo "Table teachers created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






$conn->close();
?>