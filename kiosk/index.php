<?
include("common.php");
checklogin();
$msg = "";
?>
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
    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/kiosk.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    </head>
    <body class="grey darken-4">
        <h1 class="center" style='color: #ecf0f1'>Student Sign In</h1>

<?

  date_default_timezone_set('America/Chicago');

include "../sqlconnect.php";

    $where_day = "WHERE day_to_come ='" . date( 'Y-m-d', strtotime(" today ")) . "'";
    //$where_day = "WHERE day_to_come ='2016-07-07'";

echo "<div class= 'container'> <form method = 'post' action = ''>";

           $sql = "SELECT id, firstname, lastname, email, student_id, period, sh_teacher, place, day_to_come, reason_to_come, isHere FROM passes $where_day AND isHere='0' ORDER BY period, lastname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {


        echo "<table class='bordered responsive-table'><thead style='color: #ecf0f1'><tr><th>Is Here?</th><th>Name</th><th>Period</th><th>Study Hall Teacher</th><th>Department</th><th>Reason to come</th></tr></thead>";
        // output data of each row
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {

        if($row["isHere"] == 1){
            $inputAll = ' checked="checked" disabled="disabled"';
            $inputType = "<input type='checkbox' id='" . $row["id"] . "' name='" . $row["id"] . "'   checked='checked' disabled='disabled' value='1' />";
        } else {
            $inputAll = '';
            $inputType = "<input type='radio' class='with-gap' id='" . $row["id"] . "' name='kioskIsHere' onclick='openNextID()' required value='" . $row["id"] . "' />";
        }

            echo "<tr style='color: #ecf0f1'><td> " . $inputType . " <label for='" . $row["id"] . "'>Is Here?</label> </td><td>" . $row["lastname"].  ", " . $row["firstname"]. "</td><td>" . $row["period"]. "</td><td>" . $row["sh_teacher"]. "</td><td>" . $row["place"]. "</td><td>" . $row["reason_to_come"]. "</td></tr></tbody>";
        }

        echo "</tbody></table>";
        //echo "<a class='waves-effect waves-light btn modal-trigger' href='#nextID'>Next <i class='material-icons right'>trending_flat</i></a>";

        //echo "<button class='btn waves-effect waves-light' type='submit' name='updateIshereKIOSK'>Sign in <i class='material-icons right'>mode_edit</i></button>";

        } else {
            echo "0 results";
        }

        ?>
        <div class="divider"></div>
        <h3 class="center white-text">Signed in</h3>
        <div class="divider"></div>


        <?

        $sql = "SELECT id, firstname, lastname, email, student_id, period, sh_teacher, place, day_to_come, reason_to_come, isHere FROM passes $where_day AND isHere='1' ORDER BY period, lastname";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {


     echo "<table class='bordered responsive-table'><thead style='color: #ecf0f1'><tr><th>Signed In?</th><th>Name</th><th>Period</th><th>Study Hall Teacher</th><th>Department</th><th>Reason to come</th></tr></thead>";
     // output data of each row
     echo "<tbody>";
     while($row = $result->fetch_assoc()) {

     if($row["isHere"] == 1){
         $inputAll = ' checked="checked" disabled="disabled"';
         $inputType = "<input type='checkbox'checked='checked' disabled='disabled' value='1' />";
     } else {
         $inputAll = '';
         $inputType = "<input type='radio' class='with-gap' id='" . $row["id"] . "' name='kioskIsHere' onclick='openNextID()' required value='" . $row["id"] . "' />";
     }

         echo "<tr style='color: #ecf0f1'><td> <input type='checkbox'checked='checked' id='" . $row["id"] . "' disabled='disabled' value='1' /> <label for='" . $row["id"] . "'>Signed In</label> </td><td>" . $row["lastname"].  ", " . $row["firstname"]. "</td><td>" . $row["period"]. "</td><td>" . $row["sh_teacher"]. "</td><td>" . $row["place"]. "</td><td>" . $row["reason_to_come"]. "</td></tr></tbody>";
     }

     echo "</tbody></table>";
     //echo "<a class='waves-effect waves-light btn modal-trigger' href='#nextID'>Next <i class='material-icons right'>trending_flat</i></a>";

     //echo "<button class='btn waves-effect waves-light' type='submit' name='updateIshereKIOSK'>Sign in <i class='material-icons right'>mode_edit</i></button>";

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
    </div>

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
                    echo "<script>  setTimeout(function () { window.location.href = '/passport/kiosk/'; }, 500);  </script>";

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

        <footer class="page-footer grey darken-3">
            <div class="footer-copyright">
                <div class="container">
                    <a class="white-text left" href="https://www.josephhassell.com/">Copyright © 2016 Joseph Hassell</a> &nbsp &nbsp
                    <a class="white-text right" href="https://github.com/poster983/passr/blob/master/LICENSE">License </a> &nbsp &nbsp
                    <a class="white-text right" href="https://poster983.github.io/passr/">Project Page &nbsp &nbsp</a>&nbsp &nbsp
                </div>
            </div>
        </footer>


        <script>
            $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
            });
        </script>
        <script>
            function openNextID() {
             $('#nextID').openModal();
            }
        </script>

        <script>
           var time = new Date().getTime();
           $(document.body).bind("mousemove keypress", function(e) {
               time = new Date().getTime();
           });

           function refresh() {
               if(new Date().getTime() - time >= 120000)
                   window.location.reload(true);
               else
                   setTimeout(refresh, 10000);
           }

           setTimeout(refresh, 10000);
      </script>

    </body>
</html>
