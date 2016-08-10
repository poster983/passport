<!--

The MIT License (MIT)

Copyright (c) Wed Aug 10 2016 Joseph Hassell joseph@thehassellfamily.net

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
        <title>Sign in Kiosk</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
        
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    </head>
    <body>
    
<? 
include "../sqlconnect.php";
    
    //$where_day = "WHERE day_to_come ='" . date( 'Y-m-d', strtotime(" today ")) . "'";
    $where_day = "WHERE day_to_come ='2016-07-07'";

echo "<form method = 'post' action = ''>";
           $sql = "SELECT id, firstname, lastname, email, student_id, period, sh_teacher, place, day_to_come, reason_to_come, isHere FROM passes $where_day ORDER BY period, lastname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        
        echo "<table class='bordered responsive-table'><thead><tr><th>Is Here?</th><th>Name</th><th>Period</th><th>Study Hall Teacher</th><th>Department</th><th>Reason to come</th></tr></thead>";
        // output data of each row
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            
        if($row["isHere"] == 1){
            $inputAll = ' checked="checked" disabled="disabled"';
            $inputType = "<input type='checkbox' id='" . $row["id"] . "' name='" . $row["id"] . "'   checked='checked' disabled='disabled' value='1' />";
        } else {
            $inputAll = '';
            $inputType = "<input type='radio' id='" . $row["id"] . "' name='kioskIsHere' required value='" . $row["id"] . "' />";
        }
            
            echo "<tr><td> " . $inputType . " <label for='" . $row["id"] . "'>Is Here?</label> " . $row["student_id"].  " </td><td>" . $row["lastname"].  " " . $row["firstname"]. "</td><td>" . $row["period"]. "</td><td>" . $row["sh_teacher"]. "</td><td>" . $row["place"]. "</td><td>" . $row["reason_to_come"]. "</td></tr></tbody>";
        }
        
        echo "</tbody></table>";
        echo "<a class='waves-effect waves-light btn modal-trigger' href='#nextID'>Next <i class='material-icons right'>trending_flat</i></a>";

        echo "<button class='btn waves-effect waves-light' type='submit' name='updateIshereKIOSK'>Sign in <i class='material-icons right'>mode_edit</i></button>";
        
        } else {
            echo "0 results";
        }

        
        ?>
        
        <div id="nextID" class="modal">
            <div class="modal-content">
                <h4>What is your student id?</h4>
                <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="studentID" type="number" name="studentID" required class="validate">
                    <label for="studentID">Student ID</label>
                </div>
            </div>
            </div>
            <div class="modal-footer">
             
                <button class='btn waves-effect waves-light btn-flat modal-action modal-close' type='submit' name='updateIshereKIOSK'>Sign in <i class='material-icons right'>mode_edit</i></button>
            </div>
        </div>        
        
        </form>
        
        <?


if(isset($_POST['updateIshereKIOSK'])){ 

    
        foreach ($_POST as $key => $value) {

  }
    $kioskValue = $_POST['kioskIsHere'];
    $studentID = $_POST['studentID'];
    
    echo $kioskValue;
    
    $sql = "SELECT id, student_id FROM passes WHERE id ='$kioskValue' ORDER BY id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
             
             if ($row['student_id'] == $studentID) {
                 $sqlu = "UPDATE passes SET isHere='1' WHERE id='$kioskValue'";
                if ($conn->query($sqlu) === TRUE) {
                    echo "Record updated successfully";
                    echo "<script>  setTimeout(function () { window.location.href = '/kiosk/'; }, 500);  </script>";
                
                } else {
                echo "Error updating record: " . $conn->error;
            }  
             } else {
                 echo "<script> Materialize.toast('Invalid ID', 4000) </script>";
             }
         }
    }
   /* 
    $sqlu = "UPDATE passes SET isHere='1' WHERE id='$kioskValue'";
            if ($conn->query($sqlu) === TRUE) {
                echo "Record updated successfully";
                echo "<script>  setTimeout(function () { window.location.href = '/kiosk/'; }, 500);  </script>";
                
            } else {
                echo "Error updating record: " . $conn->error;
            }            
    */

        
    }


?>
        <script>  
            $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
            });
</script>
        
    </body>
</html>