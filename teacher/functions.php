<!--

The MIT License (MIT)

Copyright (c) Mon Aug 15 2016 Joseph Hassell joseph@thehassellfamily.net

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

<?

$mondisday = date( 'Y-m-d', strtotime(" monday this week "));
$tusdisday = date( 'Y-m-d', strtotime(" tuesday this week "));
$weddisday = date( 'Y-m-d', strtotime(" wednesday this week "));
$thurdisday = date( 'Y-m-d', strtotime(" thursday this week "));
$fridisday = date( 'Y-m-d', strtotime(" friday this week "));

$today = date( 'Y-m-d', strtotime(" today "));
//WHERE day = '$mondisday' OR day = '$tusdisday' OR day = '$weddisday' OR day = '$thurdisday' OR day = '$fridisday'
function blackout() 
{
    global $mondisday;
    global $tusdisday;
    global $weddisday;
    global $thurdisday;
    global $fridisday;
    global $conn;
    global $today;
    $sqllecout = "SELECT day, department, period FROM blackout WHERE day = '$today' ORDER BY department";
    $sqllecoutfut = "SELECT day, department, period FROM blackout WHERE day = '$mondisday' OR day = '$tusdisday' OR day = '$weddisday' OR day = '$thurdisday' OR day = '$fridisday' ORDER BY day";
    $resultlecout = $conn->query($sqllecout);
    $resultlecoutfut = $conn->query($sqllecoutfut);
    
    if ($resultlecout->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card orange'><div class='card-content white-text'><span class='card-title'>ATTENTION!</span> <p>The following departments WILL NOT BE ACCEPTING STUDENTS";
        // output data of each row
        
        while($rowlecout = $resultlecout->fetch_assoc()) {
            $perexp = explode(",", $rowlecout["period"]);
            $percount = count($perexp);
            echo "<p> The <strong>" . $rowlecout["department"] . "</strong> is closed during: &nbsp</p>";
            echo "<p>";
            for($i = 0; $i < $percount; $i++) {
                echo $perexp[$i] . " ";
            }
            echo " period(s). </p>";
        }
        echo "<p> Please keep the students in your study hall </p>";
        echo "</div></div></div>";
        } else {
            echo "<div class='center col s12'><div class='hoverable card green'><div class='card-content white-text'><span class='card-title'>ALL Departments are open today.</span></div></div></div>";
    }
    
}

?>