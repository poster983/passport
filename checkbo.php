<? 
$mondisday = date( 'Y-m-d', strtotime(" monday this week "));
$tusdisday = date( 'Y-m-d', strtotime(" tuesday this week "));
$weddisday = date( 'Y-m-d', strtotime(" wednesday this week "));
$thurdisday = date( 'Y-m-d', strtotime(" thursday this week "));
$fridisday = date( 'Y-m-d', strtotime(" friday this week "));

$today = date( 'Y-m-d', strtotime(" today "));
//WHERE day = '$mondisday' OR day = '$tusdisday' OR day = '$weddisday' OR day = '$thurdisday' OR day = '$fridisday'
function LECout() 
{
    global $mondisday;
    global $tusdisday;
    global $weddisday;
    global $thurdisday;
    global $fridisday;
    global $conn;
    global $today;
    $sqllecout = "SELECT day, department, period FROM blackout WHERE day = '$today' AND department = 'LEC' ORDER BY department";
    $sqllecoutfut = "SELECT day, department, period FROM blackout WHERE department = 'LEC' AND (day = '$mondisday' OR day = '$tusdisday' OR day = '$weddisday' OR day = '$thurdisday' OR day = '$fridisday') ORDER BY day";
    $resultlecout = $conn->query($sqllecout);
    $resultlecoutfut = $conn->query($sqllecoutfut);
    echo "<div class='row'>";
    if ($resultlecout->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card orange'><div class='card-content white-text'><span class='card-title'>ATTENTION!</span><p> The LEC is closed today during the following periods: &nbsp</p>";
        // output data of each row
        
        while($rowlecout = $resultlecout->fetch_assoc()) {
            $perexp = explode(",", $rowlecout["period"]);
            $percount = count($perexp);
            echo "<p>";
            for($i = 0; $i < $percount; $i++) {
                echo $perexp[$i] . " ";
            }
            echo "</p><p> Please stay in your study hall </p>";
        }
        echo "</div></div></div>";
        } else {
            echo "<div class='center col s12'><div class='hoverable card green'><div class='card-content white-text'><span class='card-title'>The LEC is open today.</span></div></div></div>";
        }
     if ($resultlecoutfut->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card red'><div class='card-content white-text'><span class='card-title'>This Week</span><p> This week, the LEC will be closed on:</p>";
        
        while($rowlecoutfut = $resultlecoutfut->fetch_assoc()) {
            $perexpfut = explode(",", $rowlecoutfut["period"]);
            $percountfut = count($perexpfut);
            
            echo "<p>" . $rowlecoutfut["day"] . " during the period(s) of: ";
            for($i = 0; $i < $percountfut; $i++) {
                echo $perexpfut[$i] . " ";
            }
            
        }
         echo "</p><p>Thank you for your cooperation.</p>";
        echo "</div></div></div>";

} else {
            echo "<div class='center col s12'><div class='hoverable card green accent-3'><div class='card-content white-text'><span class='card-title'>LEC is open all week.</span></div></div></div>";
        }
    echo "</div>";
}


function MATHout() 
{
    global $mondisday;
    global $tusdisday;
    global $weddisday;
    global $thurdisday;
    global $fridisday;
    global $conn;
    global $today;
    $sqllecout = "SELECT day, department, period FROM blackout WHERE day = '$today' AND department = 'Math Department' ORDER BY department";
    $sqllecoutfut = "SELECT day, department, period FROM blackout WHERE department = 'Math Department' AND (day = '$mondisday' OR day = '$tusdisday' OR day = '$weddisday' OR day = '$thurdisday' OR day = '$fridisday') ORDER BY day";
    $resultlecout = $conn->query($sqllecout);
    $resultlecoutfut = $conn->query($sqllecoutfut);
    echo "<div class='row'>";
    if ($resultlecout->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card orange'><div class='card-content white-text'><span class='card-title'>ATTENTION!</span><p> The Math Department is closed today during the following periods: &nbsp</p>";
        // output data of each row
        
        while($rowlecout = $resultlecout->fetch_assoc()) {
            $perexp = explode(",", $rowlecout["period"]);
            $percount = count($perexp);
            echo "<p>";
            for($i = 0; $i < $percount; $i++) {
                echo $perexp[$i] . " ";
            }
            echo "</p><p> Please stay in your study hall </p>";
        }
        echo "</div></div></div>";
        } else {
            echo "<div class='center col s12'><div class='hoverable card green'><div class='card-content white-text'><span class='card-title'>The Math Department is open today.</span></div></div></div>";
        }
     if ($resultlecoutfut->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card red'><div class='card-content white-text'><span class='card-title'>This Week</span><p> This week, the Math Department will be closed on:</p>";
        
        while($rowlecoutfut = $resultlecoutfut->fetch_assoc()) {
            $perexpfut = explode(",", $rowlecoutfut["period"]);
            $percountfut = count($perexpfut);
            
            echo "<p>" . $rowlecoutfut["day"] . " during the period(s) of: ";
            for($i = 0; $i < $percountfut; $i++) {
                echo $perexpfut[$i] . " ";
            }
            
        } 
         echo "</p><p>Thank you for your cooperation.</p>";
        echo "</div></div></div>";

} else {
            echo "<div class='center col s12'><div class='hoverable card green accent-3'><div class='card-content white-text'><span class='card-title'>The Math Department is open all week.</span></div></div></div>";
        }
    echo "</div>";
}

function LIBout() 
{
    global $mondisday;
    global $tusdisday;
    global $weddisday;
    global $thurdisday;
    global $fridisday;
    global $conn;
    global $today;
    $sqllecout = "SELECT day, department, period FROM blackout WHERE day = '$today' AND department = 'Library' ORDER BY department";
    $sqllecoutfut = "SELECT day, department, period FROM blackout WHERE department = 'Library' AND (day = '$mondisday' OR day = '$tusdisday' OR day = '$weddisday' OR day = '$thurdisday' OR day = '$fridisday') ORDER BY day";
    $resultlecout = $conn->query($sqllecout);
    $resultlecoutfut = $conn->query($sqllecoutfut);
    echo "<div class='row'>";
    if ($resultlecout->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card orange'><div class='card-content white-text'><span class='card-title'>ATTENTION!</span><p> The Library is closed today during the following periods: &nbsp</p>";
        // output data of each row
        while($rowlecout = $resultlecout->fetch_assoc()) {
            $perexp = explode(",", $rowlecout["period"]);
            $percount = count($perexp);
            echo "<p>";
            for($i = 0; $i < $percount; $i++) {
                echo $perexp[$i] . " ";
            }
            echo "</p><p> Please stay in your study hall </p>";
        }
        echo "</div></div></div>";
        } else {
            echo "<div class='center col s12'><div class='hoverable card green'><div class='card-content white-text'><span class='card-title'>The Library is open today.</span></div></div></div>";
        }
     if ($resultlecoutfut->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card red'><div class='card-content white-text'><span class='card-title'>This Week</span><p> This week, the Library will be closed on:</p>";
        
        while($rowlecoutfut = $resultlecoutfut->fetch_assoc()) {
            $perexpfut = explode(",", $rowlecoutfut["period"]);
            $percountfut = count($perexpfut);
            
            echo "<p>" . $rowlecoutfut["day"] . " during the period(s) of: ";
            for($i = 0; $i < $percountfut; $i++) {
                echo $perexpfut[$i] . " ";
            }
            
        } 
         echo "</p><p>Thank you for your cooperation.</p>";
        echo "</div></div></div>";

} else {
            echo "<div class='center col s12'><div class='hoverable card green accent-3'><div class='card-content white-text'><span class='card-title'>The Library is open all week.</span></div></div></div>";
        }
    echo "</div>";
}

function HDout() 
{
    global $mondisday;
    global $tusdisday;
    global $weddisday;
    global $thurdisday;
    global $fridisday;
    global $conn;
    global $today;
    $sqllecout = "SELECT day, department, period FROM blackout WHERE day = '$today' AND department = 'Help Desk' ORDER BY department";
    $sqllecoutfut = "SELECT day, department, period FROM blackout WHERE department = 'Help Desk' AND (day = '$mondisday' OR day = '$tusdisday' OR day = '$weddisday' OR day = '$thurdisday' OR day = '$fridisday') ORDER BY day";
    $resultlecout = $conn->query($sqllecout);
    $resultlecoutfut = $conn->query($sqllecoutfut);
    echo "<div class='row'>";
    if ($resultlecout->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card orange'><div class='card-content white-text'><span class='card-title'>ATTENTION!</span><p> The Help Desk is closed today during the following periods: &nbsp</p>";
        // output data of each row
        while($rowlecout = $resultlecout->fetch_assoc()) {
            $perexp = explode(",", $rowlecout["period"]);
            $percount = count($perexp);
            echo "<p>";
            for($i = 0; $i < $percount; $i++) {
                echo $perexp[$i] . " ";
            }
            echo "</p><p> Please stay in your study hall </p>";
        }
        echo "</div></div></div>";
        } else {
            echo "<div class='center col s12'><div class='hoverable card green'><div class='card-content white-text'><span class='card-title'>The Help Desk is open today.</span></div></div></div>";
        }
     if ($resultlecoutfut->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card red'><div class='card-content white-text'><span class='card-title'>This Week</span><p> This week, the Help Desk will be closed on:</p>";
        
        while($rowlecoutfut = $resultlecoutfut->fetch_assoc()) {
            $perexpfut = explode(",", $rowlecoutfut["period"]);
            $percountfut = count($perexpfut);
            
            echo "<p>" . $rowlecoutfut["day"] . " during the period(s) of: ";
            for($i = 0; $i < $percountfut; $i++) {
                echo $perexpfut[$i] . " ";
            }
            
        } 
         echo "</p><p>Thank you for your cooperation.</p>";
        echo "</div></div></div>";

} else {
            echo "<div class='center col s12'><div class='hoverable card green accent-3'><div class='card-content white-text'><span class='card-title'>The Help Desk is open all week.</span></div></div></div>";
        }
    echo "</div>";
}

?>