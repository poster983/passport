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
                <h4 class="center">Message Manager</h4>
                <div class="row">
                    <div class="input-field col s3">
                        <input type="text" id="datepicker" required name="messageday" />
                        <label for="blackoutday">Date</label>
                    </div>


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
                        &nbsp &nbsp
                        <input type="radio" id="am" name="dep" value="Athletic Mentor" />
                        <label for="am">Athletic Mentor</label>
                    </p>
                     <div class="input-field col s12">
                        <textarea id="message" name="message" class="materialize-textarea" length="255"></textarea>
                        <label for="message">Your Message</label>
                    </div>
                    <p>
                        <button class="btn waves-effect waves-light" type="submit" name="blackout">Set Message
                            <i class="material-icons right">announcement</i>
                        </button>
                    </p>
                </div>
            </form>
            <a class="waves-effect waves-light btn red" href="messagelist.php"><i class="material-icons left">reorder</i>View Messages</a>
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



    foreach ($_POST as $key => $value) {

  }
        $messageday = $_POST['messageday'];
        $dep = $_POST['dep'];
        $message = htmlspecialchars($_POST['message'],ENT_QUOTES);






    $sqlmessage = "INSERT INTO message (day, dep, reason)
            VALUES ('$messageday', '$dep', '$message')";
            if ($conn->query($sqlmessage) === TRUE) {
                echo "Sucsess: " . $sqlmessage . "<br>" . $conn->error;
            } else {
                echo "Error: "  . $sqlmessage . "<br>" . $conn->error;
            }



$conn->close();
    }
?>
