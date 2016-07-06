<!--

The MIT License (MIT)

Copyright (c) Sat Jul 02 2016 Joseph Hassell joseph@thehassellfamily.net

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
    <title>Teacher Dashboard</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />



    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


</head>

<body>

    <nav>
        <div class="nav-wrapper red darken-4">
            <a href="/admin/index.php" class="brand-logo Center">Search Passes</a>
        </div>
    </nav>
    <br>
    <br>
    <form method="post" action="">
        <div class="row">
            <div class="input-field col s5">
                <label class="active">Enter Email</label>
                <input type="text" id="autocompleteName" name="teacherName" required class="autocomplete inputFields">
            </div>
            <div class="col s7">
                <button class="btn waves-effect waves-light" type="submit" name="search">Search
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>


    <?
include "../sqlconnect.php";
?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
    <script src="/js/materialize.js"></script>
    <script src="/js/init.js"></script>
    <script>
        var lNameData = [
    <?
       
    $sql = "SELECT DISTINCT email FROM teachers ORDER BY email";
    $result = $conn -> query($sql);
    if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    echo "{ value: '" . $row["email"] . "'}, ";
                }
    } else {
        echo "{ value: 'No Teachers'}, ";
    }

        ?>
];




        $('#autocompleteName').data('array', lNameData);
    </script>
    


<?
        
        if(isset($_POST['search'])){ 
        $teacherName = $_POST['teacherName'];
            $sql = "SELECT DISTINCT name_title, lastname, email FROM teachers WHERE email = '$teacherName' ORDER BY lastname";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                     $teacherNameComb = $row["name_title"] . " " . $row["lastname"];
                 }
            }
        echo $teacherNameComb;
            
           $today = date( 'Y-m-d', strtotime(" friday this week "));
            
             $sql = "SELECT firstname, lastname, period, sh_teacher, place, day_to_come FROM passes WHERE sh_teacher = '$teacherNameComb' AND day_to_come = '$today' ORDER BY period";
            $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='bordered responsive-table'><thead><tr><th>Name</th><th>Period</th><th>Study Hall Teacher</th><th>Department</th><th>Day</th></tr></thead>";
        // output data of each row
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["firstname"]. " " . $row["lastname"]. "</td><td>" . $row["period"]. "</td><td>" . $row["sh_teacher"]. "</td><td>" . $row["place"]. "</td><td>" . $row["day_to_come"]. "</td></tr></tbody>";
        }
        
        echo "</tbody></table>";
        } else {
            echo "0 results";
        }
            
        }
    ?>
    
            <footer class="page-footer white">
        <div class="footer-copyright">
            <div class="container">
                <a class="black-text left" href="https://www.josephhassell.com/">Copyright © 2016 Joseph Hassell</a> &nbsp &nbsp
                <a class="black-text right" href="http://lijo.pw/1668">License </a> &nbsp &nbsp
                <a class="black-text right" href="http://lijo.pw/1669">Project Page &nbsp &nbsp</a>&nbsp &nbsp
            </div>
        </div>
    </footer>
    
    
</body>

</html>