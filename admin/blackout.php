<?
include("common.php");
checklogin();
$msg = "";
?>
    <!--

The MIT License (MIT)

Copyright (c) Thu May 26 2016 Joseph Hassell joseph@thehassellfamily.net

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

    <? include "nav.php"; ?>
        <div class="container">
            <form method="post" action="">
                <h4 class="center">Pass Settings</h4>

                <div class="input-field col s3">
                    <input type="text" id="datepicker" required name="blackoutday" />
                    <label for="blackoutday">Choose a day to blackout</label>
                </div>
                <p class="center">Select Blackout Periods</p>
                <p class="center">
                    <input type="checkbox" id="aper" name="aper" value="a" />
                    <label for="aper">A Period</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="bper" name="bper" value="b" />
                    <label for="bper">B Period</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="cper" name="cper" value="c" />
                    <label for="cper">C Period</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="dper" name="dper" value="d" />
                    <label for="dper">D Period</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="eper" name="eper" value="e" />
                    <label for="eper">E Period</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="fper" name="fper" value="f" />
                    <label for="fper">F Period</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="gper" name="gper" value="g" />
                    <label for="gper">G Period</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="hper" name="hper" value="h" />
                    <label for="hper">H Period</label>
                </p>
                <p class="center">Choose Department</p>
                <p class="center">
                    <input type="radio" id="lec" name="dep" value="lec" />
                    <label for="lec">LEC</label>
                    &nbsp &nbsp
                    <input type="radio" id="math" name="dep" value="math" />
                    <label for="math">Math</label>
                    &nbsp &nbsp
                    <input type="radio" id="lib" name="dep" value="lib" />
                    <label for="lib">Library</label>
                    &nbsp &nbsp
                    <input type="radio" id="hd" name="dep" value="hd" />
                    <label for="hd">Help Desk</label>

                </p>
                <p>
                    <button class="btn waves-effect waves-light" type="submit" name="blackout">Blackout
                        <i class="material-icons right">visibility_off</i>
                    </button>
                </p>

            </form>
        </div>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="/js/materialize.js"></script>
        <script src="/js/init.js"></script>


        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


        <!-- Scripts -->
        <script>
            $(document).ready(function () {
                $("#datepicker").datepicker({
                    dateFormat: 'yy-mm-dd'
                , });
            });
        </script>
        <!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
        <script>
            if ('addEventListener' in window) {
                window.addEventListener('load', function () {
                    document.body.className = document.body.className.replace(/\bis-loading\b/, '');
                });
                document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
            }
        </script>


        </html>


        <?
        
    include "../sqlconnect.php";
    
    

    
    
    if(isset($_POST['blackout'])) { 
    
        $loopcount = 0;
    
    foreach ($_POST as $key => $value) {

  }
        $blackoutday = $_POST['blackoutday'];
        $dep = $_POST['dep'];
        $aper = $_POST['aper'];
        $bper = $_POST['bper'];
        $cper = $_POST['cper'];
        $dper = $_POST['dper'];
        $eper = $_POST['eper'];
        $fper = $_POST['fper'];
        $gper = $_POST['gper'];
        $hper = $_POST['hper'];
        
        {
            if ($aper == "a") {
                $loopcount += 1;
            }
            if ($bper == "b") {
                $loopcount += 1;
            }
            if ($cper == "c") {
                $loopcount += 1;
            }
            if ($dper == "d") {
                $loopcount += 1;
            }
            if ($eper == "e") {
                $loopcount += 1;
            }
            if ($fper == "f") {
                $loopcount += 1;
            }
            if ($gper == "g") {
                $loopcount += 1;
            }
            if ($hper == "h") {
                $loopcount += 1;
            }
        }
        echo $loopcount;
        echo $aper;
    echo $bper;
        echo $cper;
    }

while($loopcount > 0) {
    $sql = "INSERT INTO blackout (day, department, period)
            VALUES ('$name_title', '$first_name', '$last_name')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

}

   /* $sql = "SELECT firstname, lastname, email, student_id, period, sh_teacher, place, day_to_come FROM passes $where_day ORDER BY period";
    $result = $conn->query($sql);



    if ($loopcount > 0) {
        echo "<table class='bordered responsive-table'><thead><tr><th>Check In</th><th>Student ID</th><th>Name</th><th>Email</th><th>Period</th><th>Study Hall Teacher</th><th>Department</th><th>Day</th></tr></thead>";
        // output data of each row
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . 'Signature:  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp' . "</td><td>" . $row["student_id"]. "</td><td>" . $row["firstname"]. " " . $row["lastname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["period"]. "</td><td>" . $row["sh_teacher"]. "</td><td>" . $row["place"]. "</td><td>" . $row["day_to_come"]. "</td></tr></tbody>";
        }
        
        echo "</tbody></table>";
        } else {
            echo "Done";
        }
*/
$conn->close();
?>