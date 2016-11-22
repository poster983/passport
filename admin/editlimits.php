<?
include("common.php");
checklogin();
$msg = "";
?>
<!--

The MIT License (MIT)

Copyright (c) Thu Aug 04 2016 Joseph Hassell joseph@thehassellfamily.net

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
<?

    include "../sqlconnect.php";
                                                            //change sql limit to match the current nuumber of departments.
            $sqlslimit = "SELECT studentlimit, dep FROM studentlimit";
        $resultslimit = $conn->query($sqlslimit);

        if ($resultslimit->num_rows > 0) {

            while($rowslimit = $resultslimit->fetch_assoc()) {


            $placenospace = str_replace(' ', '', $rowslimit["dep"]);
                $deplimit = $placenospace . 'limit';
            $$deplimit = $rowslimit["studentlimit"];
            

            }
        }

?>
        <div class="container">
            <form method="post" action="">
                <h4 class="center">Limit Manager</h4>
                <p class="center">Limit slider</p>
                <p class="range-field">
                <input type="range" id="limitslide" name="limitslide" min="1" max="100" value="10" />
                </p>

                <p class="center">Choose Department</p>
                <p class="center">Hover for current limit</p>
                <p class="center">
                    <input type="radio" id="lec" required name="dep" value="LEC" />
                    <label for="lec" title="<? echo $LEClimit; ?>">LEC</label>
                    &nbsp &nbsp
                    <input type="radio" id="math" name="dep" value="Math" />
                    <label for="math" title="<? echo $Mathlimit; ?>">Math</label>
                    &nbsp &nbsp
                    <input type="radio" id="lib" name="dep" value="Library" />
                    <label for="lib" title="<? echo $Librarylimit; ?>">Library</label>
                    &nbsp &nbsp
                    <input type="radio" id="hd" name="dep" value="Help Desk" />
                    <label for="hd" title="<? echo $HelpDesklimit; ?>">Help Desk</label>
                    &nbsp &nbsp
                    <input type="radio" id="wl" name="dep" value="Writing Lab" />
                    <label for="wl" title="<? echo $WritingLablimit; ?>">Writing Lab</label>
                    &nbsp &nbsp
                    <input type="radio" id="fl" name="dep" value="Foreign Language" />
                    <label for="fl" title="<? echo $ForeignLanguagelimit; ?>">Foreign Language</label>
                    &nbsp &nbsp
                    <input type="radio" id="am" name="dep" value="Athletic Mentor" />
                    <label for="am" title="<? echo $AthleticMentorlimit; ?>">Athletic Mentor</label>
                </p>
                <p>
                    <button class="btn waves-effect waves-light" type="submit" name="submit">Update limits<i class="material-icons right">call_merge</i></button>
                </p>

                </form>

        </div>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="/passport/js/materialize.js"></script>
        <script src="/passport/js/init.js"></script>


        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>





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

if(isset($_POST['submit'])){


        foreach ($_POST as $key => $value) {

  }
    {
$limitslide = $_POST['limitslide'];
$updep = $_POST['dep'];
    }
        $sqlupdate = "UPDATE studentlimit SET studentlimit='$limitslide' WHERE dep = '$updep'";

        if ($conn->query($sqlupdate) === TRUE) {
            echo "Record updated successfully";

            ?>

            <script>
            setTimeout(function () {
                window.location.href = '/passport/admin/editlimits.php'; // the redirect goes here

            }, 1000); // 1 second
        </script>

        <?

        } else {
            echo "Error updating record: " . $conn->error;
        }

}


?>
