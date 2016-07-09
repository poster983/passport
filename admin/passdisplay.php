<?
include("common.php");
checklogin();
$msg = "";
?>
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
        <title>Passr-Printout</title>

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    </head>

    <body>

        <?
        
    include "../sqlconnect.php";
    
    

    
    
    if(!isset($_POST['search'])) { //exit();
    
        $where_day = "";
        $viewtype = "teacher";
    } else {
    foreach ($_POST as $key => $value) {

  }
        $viewtype = $_POST['view'];
        $datesearch = $_POST['datesearch'];
        $where_day = "WHERE day_to_come ='$datesearch'";
    
    }
        
        
        if ($viewtype == "signin") {
    $sql = "SELECT firstname, lastname, period, sh_teacher, place, day_to_come FROM passes $where_day ORDER BY period, lastname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='bordered responsive-table'><thead><tr><th>Check In</th><th>Name</th><th>Period</th><th>Study Hall Teacher</th><th>Department</th><th>Day</th></tr></thead>";
        // output data of each row
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . 'Signature:  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp' . "</td><td>" . $row["lastname"].  " " . $row["firstname"]. "</td><td>" . $row["period"]. "</td><td>" . $row["sh_teacher"]. "</td><td>" . $row["place"]. "</td><td>" . $row["day_to_come"]. "</td></tr></tbody>";
        }
        
        echo "</tbody></table>";
        } else {
            echo "0 results";
        }
        } elseif ($viewtype == "teacher") {
            echo "<form method = 'post' action = ''>";
           $sql = "SELECT id, firstname, lastname, email, student_id, period, sh_teacher, place, day_to_come, reason_to_come, isHere FROM passes $where_day ORDER BY period, lastname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        
        echo "<table class='bordered responsive-table'><thead><tr><th>Is Here?</th><th>Student ID</th><th>Name</th><th>Email</th><th>Period</th><th>Study Hall Teacher</th><th>Department</th><th>Day</th><th>Reason to come</th></tr></thead>";
        // output data of each row
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            
        if($row["isHere"] == 1){
            $inputAll = ' checked="checked"';
        } else {
            $inputAll = '';
        }
            
            echo "<tr><td> <input type='checkbox' id='" . $row["id"] . "' name='" . $row["id"] . "'" . $inputAll . " value='1' /> <label for='" . $row["id"] . "'>Is Here?</label> </td><td>" . $row["student_id"]. "</td><td>" . $row["lastname"].  " " . $row["firstname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["period"]. "</td><td>" . $row["sh_teacher"]. "</td><td>" . $row["place"]. "</td><td>" . $row["day_to_come"]. "</td><td>" . $row["reason_to_come"]. "</td></tr></tbody>";
        }
        
        echo "</tbody></table>";
        echo "<button class='btn waves-effect waves-light' type='submit' name='updateIsHere'>Submit <i class='material-icons right'>mode_edit</i></button>";
        echo "</form>";
        } else {
            echo "0 results";
        } 
        } else {
            echo "Error: Invalid View";
        }
        


if(isset($_POST['updateIsHere'])){ 

    
        foreach ($_POST as $key => $value) {

  }
    $sql = "SELECT id, isHere FROM passes $where_day ORDER BY id";
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
            $sqlu = "UPDATE passes SET isHere='$isHere' WHERE id='$hereid'";
            if ($conn->query($sqlu) === TRUE) {
                echo "Record updated successfully";
                
            } else {
                echo "Error updating record: " . $conn->error;
            }            
        }
        echo "<script>  setTimeout(function () { window.location.href = '/admin/passdisplay.php'; }, 500);  </script>";
    }

}


?>
        
    </body>
</html>