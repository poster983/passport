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
                <h4 class="center">Blackout Manager</h4>

                <div class="input-field col s3">
                    <input type="text" id="datepicker" required name="blackoutday" />
                    <label for="blackoutday">Blackout Date</label>
                </div>
                <p class="center">Select Blackout Periods</p>
                <p class="center">
                    <input type="checkbox" id="aper" name="aper" value="A" />
                    <label for="aper">A Period</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="bper" name="bper" value="B" />
                    <label for="bper">B Period</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="cper" name="cper" value="C" />
                    <label for="cper">C Period</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="dper" name="dper" value="D" />
                    <label for="dper">D Period</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="eperL1" name="eperL1" value="E(First Lunch)" />
                    <label for="eperL1">E Period (1st Lunch)</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="eperL2" name="eperL2" value="E(Second Lunch)" />
                    <label for="eperL2">E Period (2nd Lunch)</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="fper" name="fper" value="F" />
                    <label for="fper">F Period</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="gper" name="gper" value="G" />
                    <label for="gper">G Period</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="hper" name="hper" value="H" />
                    <label for="hper">H Period</label>
                </p>
                <p class="center">Choose Department</p>
                <p class="center">
                    <input type="radio" id="lec" name="dep" value="LEC" />
                    <label for="lec">LEC</label>
                    &nbsp &nbsp
                    <input type="radio" id="math" name="dep" value="Math Department" />
                    <label for="math">Math</label>
                    &nbsp &nbsp
                    <input type="radio" id="lib" name="dep" value="Library" />
                    <label for="lib">Library</label>
                    &nbsp &nbsp
                    <input type="radio" id="hd" name="dep" value="Help Desk" />
                    <label for="hd">Help Desk</label>
                    &nbsp &nbsp
                    <input type="radio" id="wl" name="dep" value="Writing Lab" />
                    <label for="wl">Writing Lab</label>
                    &nbsp &nbsp
                    <input type="radio" id="fl" name="dep" value="Foreign Language" />
                    <label for="fl">Foreign Language</label>
                </p>
                <p>
                    <button class="btn waves-effect waves-light" type="submit" name="blackout">Blackout
                        <i class="material-icons right">visibility_off</i>
                    </button>
                </p>

            </form>
            <a class="waves-effect waves-light btn red" href="blackoutcal.php"><i class="material-icons left">today</i>Blackout Calender</a>
        </div>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="/passport/js/materialize.js"></script>
        <script src="/passport/js/init.js"></script>


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
        $eperL1 = $_POST['eperL1'];
        $eperL2 = $_POST['eperL2'];
        $fper = $_POST['fper'];
        $gper = $_POST['gper'];
        $hper = $_POST['hper'];

        $per = "$aper,$bper,$cper,$dper,$eperL1,$eperL2,$fper,$gper,$hper";

        $perarray = explode(",", $per);

        $perarray_null = array_filter($perarray );

        $percount = count($perarray_null);



echo "Blacked out period(s):";

    $sql = "INSERT INTO blackout (day, department, period)
            VALUES ('$blackoutday', '$dep', '$per')";
            if ($conn->query($sql) === TRUE) {
                echo "$per ";
                echo " on $blackoutday";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }




$conn->close();
    }
?>
