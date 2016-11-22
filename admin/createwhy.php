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

    <? include "nav.php"; ?>

        <body>
            <div class="container">

                <form method="post" action="">
                    <h4 class="center">Reason-to-come Manager</h4>
                    <p class="center">Choose Department</p>
                    <p class="left">
                        <input type="radio" id="lec" name="dep" required value="LEC" />
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


                    <div class="row">
                        <div class="input-field col s6">
                            <input id="why" required name="why" type="text" length="120">
                            <label for="why">Create Dropdown</label>
                        </div>
                    </div>

                    <p>
                        <button class="btn waves-effect waves-light" type="submit" name="add_new_entry">Add New Choice
                            <i class="material-icons right">send</i>
                        </button>
                    </p>
                </form>
                <a class="waves-effect waves-light btn-large" href="whylist.php">Choice List</a>
            </div>
        </body>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="/passport/js/materialize.js"></script>
        <script src="/passport/js/init.js"></script>

        </html>

        <?php
if(isset($_POST['add_new_entry'])){


        foreach ($_POST as $key => $value) {

  }
    {
        $dep = $_POST['dep'];
        $why = htmlspecialchars($_POST['why'],ENT_QUOTES);



        include "../sqlconnect.php";

            $sql = "INSERT INTO why (dep, why)
            VALUES ('$dep', '$why')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

    $conn->close();
    }
}

?>
