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
                <div class="row">
                <input type="hidden" id="BO-type" name="BO-type" value="one-time">
                <div class="col s12">
               <ul class="tabs" id="viewType">
                   <li class="tab col s6" name="view-option" id="onetimeview" value="one-time"><a href="#one-time">One Time Blackout</a></li>
                   <li class="tab col s6"name="view-option" id="recurringview" value="recurring"><a href="#recurring">Recurring Blackout</a></li>

               </ul>
             </div>
              <div id="one-time" class="col s12">
                  <div class="input-field col s12">
                  <input type="date" class="datepicker" name="blackoutday" id="datepicker" required readonly>
                  <label for="datepicker">Blackout Date</label>

                </div>
              </div>
              <div id="recurring" class="col s12 center">
                <br><br>

                <input type="radio" id="monday" name="recurrdate" value="MONDAY" />
                <label for="monday">Every Monday</label>
                &nbsp &nbsp
                <input type="radio" id="tuesday" name="recurrdate" value="TUESDAY" />
                <label for="tuesday">Every Tuesday</label>
                &nbsp &nbsp
                <input type="radio" id="wednesday" name="recurrdate" value="WEDNESDAY" />
                <label for="wednesday">Every Wednesday</label>
                &nbsp &nbsp
                <input type="radio" id="thursday" name="recurrdate" value="THURSDAY" />
                <label for="thursday">Every Thursday</label>
                &nbsp &nbsp
                <input type="radio" id="friday" name="recurrdate" value="FRIDAY" />
                <label for="friday">Every Friday</label>

              </div>
              <br>

            </div>
            <div class="row">
              <div class="section">
              <div class="divider"></div>


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
                    <input type="checkbox" id="eperL1" name="eperL1" value="E1" />
                    <label for="eperL1">E Period (1st Lunch)</label>
                    &nbsp &nbsp
                    <input type="checkbox" id="eperL2" name="eperL2" value="E2" />
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
                    &nbsp &nbsp
                    <input type="checkbox" id="AD" name="AD" value="All Day" />
                    <label for="AD">All Day</label>
                </p>
                <p class="center">Choose Department</p>
                <p class="center">
                    <input type="radio" id="lec" name="dep" value="LEC" />
                    <label for="lec">LEC</label>
                    &nbsp &nbsp
                    <input type="radio" id="math" name="dep" value="Math" />
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
                    &nbsp &nbsp
                    <input type="radio" id="am" name="dep" value="Athletic Mentor" />
                    <label for="am">Athletic Mentor</label>
                </p>
                <p>
                  <br>



                    <button class="btn waves-effect waves-light" type="submit" name="blackout">Blackout
                        <i class="material-icons right">visibility_off</i>
                    </button>
                </p>

            </form>
            <a class="waves-effect waves-light btn red" href="blackoutcal.php"><i class="material-icons left">today</i>Blackout Calender</a>
        </div>
      </div>
      </div>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="/passport/js/materialize.js"></script>
        <script src="/passport/js/init.js"></script>

        <script>
        $("#AD").change(function() {
          if(this.checked) {
            $('#aper').prop('checked', false);
            $('#aper').prop( 'disabled', true );
            $('#bper').prop('checked', false);
            $('#bper').prop( 'disabled', true );
            $('#cper').prop('checked', false);
            $('#cper').prop( 'disabled', true );
            $('#dper').prop('checked', false);
            $('#dper').prop( 'disabled', true );
            $('#eperL1').prop('checked', false);
            $('#eperL1').prop( 'disabled', true );
            $('#eperL2').prop('checked', false);
            $('#eperL2').prop( 'disabled', true );
            $('#fper').prop('checked', false);
            $('#fper').prop( 'disabled', true );
            $('#gper').prop('checked', false);
            $('#gper').prop( 'disabled', true );
            $('#hper').prop('checked', false);
            $('#hper').prop( 'disabled', true );
          } else {
            $('#aper').prop( 'disabled', false );
            $('#bper').prop( 'disabled', false );
            $('#cper').prop( 'disabled', false );
            $('#dper').prop( 'disabled', false );
            $('#eperL1').prop( 'disabled', false );
            $('#eperL2').prop( 'disabled', false );
            $('#fper').prop( 'disabled', false );
            $('#gper').prop( 'disabled', false );
            $('#hper').prop( 'disabled', false );

          }
        });
        </script>




        <!-- Scripts -->
        <script>
        $('.datepicker').pickadate({
          selectMonths: true, // Creates a dropdown to control month
          selectYears: 2, // Creates a dropdown of 2 years to control year
          formatSubmit: 'yyyy-mm-dd',
          hiddenName: true
        });
        $(document).ready(function(){
          $('ul.tabs').tabs();

          $("#viewType li").click(function(){
              $("#BO-type").val($(this).attr("value"));
              });
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
        $BoType = $_POST['BO-type'];
        $recurrBlackoutDay = $_POST['recurrdate'];
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
        $aday = $_POST['AD'];
        if ($aday == "") {
        $per = "$aper,$bper,$cper,$dper,$eperL1,$eperL2,$fper,$gper,$hper";

        $perarray = explode(",", $per);

        $perarray_null = array_filter($perarray );

        $percount = count($perarray_null);
      } else {
        $per = $aday;
      }

      if ($BoType == "one-time") {
        $boDay = $blackoutday;
      } elseif ($BoType == "recurring") {
        $boDay = $recurrBlackoutDay;
      }


    $sql = "INSERT INTO blackout (day, department, period)
            VALUES ('$boDay', '$dep', '$per')";
            if ($conn->query($sql) === TRUE) {
              echo "Blacked out period(s):";
                echo "$per ";
                echo " on $boDay";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }




$conn->close();
    }
?>
