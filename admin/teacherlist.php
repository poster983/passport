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
                <form action="deleteteacher.php" method="post">
                    <?

    include "../sqlconnect.php";

    $sql = "SELECT id, name_title, firstname, lastname, email, room, period FROM teachers ORDER BY lastname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='bordered responsive-table'><thead><tr><th>Delete</th><th>Name</th><th>Email</th><th>Room Number</th><th>Period</th></tr></thead>";
        // output data of each row
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td><input type='radio' name='delete' value=" . $row["id"] . " id=" . $row["id"] . "><label for=" . $row["id"] . ">'Delete'</label></td><td>" . $row["name_title"] . " " . $row["firstname"]. " " . $row["lastname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["room"]. "</td><td>" . $row["period"]. "</td></tr>";
        }

        echo "</tbody></table>";
        } else {
            echo "0 results";
        }

$conn->close();
?>
                        <button class="btn waves-effect waves-light" type="submit" name="submitdel">Delete Selected
                            <i class="material-icons right">report_problem</i>
                        </button>
                </form>
            </div>
        </body>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="/passport/js/materialize.js"></script>
        <script src="/passport/js/init.js"></script>

        </html>
