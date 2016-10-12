<?

//yes i realize that im not using functions correctly..... but SHhhhhhhhhhh
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
        echo "<div class='col s12 m6'><div class='hoverable card orange'><div class='card-content white-text'><span class='card-title'>ATTENTION!</span><p> The Executive Functioning Department is not accepting passes today during the following periods: &nbsp</p>";
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
            echo "<div class='center col s12'><div class='hoverable card green'><div class='card-content white-text'><span class='card-title'>The Executive Functioning Department is open today.</span></div></div></div>";
        }
     if ($resultlecoutfut->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card red'><div class='card-content white-text'><span class='card-title'>This Week</span><p> This week, The Executive Functioning Department is not accepting passes during the following periods:</p>";

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
            echo "<div class='center col s12'><div class='hoverable card green accent-3'><div class='card-content white-text'><span class='card-title'>The Executive Functioning Department is open all week.</span></div></div></div>";
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
        echo "<div class='col s12 m6'><div class='hoverable card orange'><div class='card-content white-text'><span class='card-title'>ATTENTION!</span><p> The Math Department is not accepting passes today during the following periods: &nbsp</p>";
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
        echo "<div class='col s12 m6'><div class='hoverable card red'><div class='card-content white-text'><span class='card-title'>This Week</span><p> This week, the Math Department is not accepting passes during the following periods:</p>";

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
        echo "<div class='col s12 m6'><div class='hoverable card orange'><div class='card-content white-text'><span class='card-title'>ATTENTION!</span><p> The Library is not accepting passes today during the following periods: &nbsp</p>";
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
        echo "<div class='col s12 m6'><div class='hoverable card red'><div class='card-content white-text'><span class='card-title'>This Week</span><p> This week, the Library is not accepting passes during the following periods:</p>";

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
        echo "<div class='col s12 m6'><div class='hoverable card orange'><div class='card-content white-text'><span class='card-title'>ATTENTION!</span><p> The Help Desk is not accepting passes today during the following periods: &nbsp</p>";
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
        echo "<div class='col s12 m6'><div class='hoverable card red'><div class='card-content white-text'><span class='card-title'>This Week</span><p> This week, the Help Desk is not accepting passes during the following periods:</p>";

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

function WLout()
{
    global $mondisday;
    global $tusdisday;
    global $weddisday;
    global $thurdisday;
    global $fridisday;
    global $conn;
    global $today;
    $sqllecout = "SELECT day, department, period FROM blackout WHERE day = '$today' AND department = 'Writing Lab' ORDER BY department";
    $sqllecoutfut = "SELECT day, department, period FROM blackout WHERE department = 'Writing Lab' AND (day = '$mondisday' OR day = '$tusdisday' OR day = '$weddisday' OR day = '$thurdisday' OR day = '$fridisday') ORDER BY day";
    $resultlecout = $conn->query($sqllecout);
    $resultlecoutfut = $conn->query($sqllecoutfut);
    echo "<div class='row'>";
    if ($resultlecout->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card orange'><div class='card-content white-text'><span class='card-title'>ATTENTION!</span><p> The Writing Lab is not accepting passes today during the following periods: &nbsp</p>";
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
            echo "<div class='center col s12'><div class='hoverable card green'><div class='card-content white-text'><span class='card-title'>The Writing Lab is open today.</span></div></div></div>";
        }
     if ($resultlecoutfut->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card red'><div class='card-content white-text'><span class='card-title'>This Week</span><p> This week, the Writing Lab is not accepting passes during the following periods:</p>";

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
            echo "<div class='center col s12'><div class='hoverable card green accent-3'><div class='card-content white-text'><span class='card-title'>The Writing Lab is open all week.</span></div></div></div>";
        }
    echo "</div>";
}


function FLout()
{
    global $mondisday;
    global $tusdisday;
    global $weddisday;
    global $thurdisday;
    global $fridisday;
    global $conn;
    global $today;
    $sqllecout = "SELECT day, department, period FROM blackout WHERE day = '$today' AND department = 'Foreign Language' ORDER BY department";
    $sqllecoutfut = "SELECT day, department, period FROM blackout WHERE department = 'Foreign Language' AND (day = '$mondisday' OR day = '$tusdisday' OR day = '$weddisday' OR day = '$thurdisday' OR day = '$fridisday') ORDER BY day";
    $resultlecout = $conn->query($sqllecout);
    $resultlecoutfut = $conn->query($sqllecoutfut);
    echo "<div class='row'>";
    if ($resultlecout->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card orange'><div class='card-content white-text'><span class='card-title'>ATTENTION!</span><p> Foreign Language tutoring is not accepting passes today during the following periods: &nbsp</p>";
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
            echo "<div class='center col s12'><div class='hoverable card green'><div class='card-content white-text'><span class='card-title'>Foreign Language tutoring is open today.</span></div></div></div>";
        }
     if ($resultlecoutfut->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card red'><div class='card-content white-text'><span class='card-title'>This Week</span><p> This week, Foreign Language tutoring is not accepting passes during the following periods:</p>";

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
            echo "<div class='center col s12'><div class='hoverable card green accent-3'><div class='card-content white-text'><span class='card-title'>Foreign Language tutoring is open all week.</span></div></div></div>";
        }
    echo "</div>";
}


function AMout()
{
    global $mondisday;
    global $tusdisday;
    global $weddisday;
    global $thurdisday;
    global $fridisday;
    global $conn;
    global $today;
    $sqllecout = "SELECT day, department, period FROM blackout WHERE day = '$today' AND department = 'Athletic Mentor' ORDER BY department";
    $sqllecoutfut = "SELECT day, department, period FROM blackout WHERE department = 'Athletic Mentor' AND (day = '$mondisday' OR day = '$tusdisday' OR day = '$weddisday' OR day = '$thurdisday' OR day = '$fridisday') ORDER BY day";
    $resultlecout = $conn->query($sqllecout);
    $resultlecoutfut = $conn->query($sqllecoutfut);
    echo "<div class='row'>";
    if ($resultlecout->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card orange'><div class='card-content white-text'><span class='card-title'>ATTENTION!</span><p> The Athletic Mentor is not accepting passes today during the following periods: &nbsp</p>";
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
            echo "<div class='center col s12'><div class='hoverable card green'><div class='card-content white-text'><span class='card-title'> The Athletic Mentor is available today.</span></div></div></div>";
        }
     if ($resultlecoutfut->num_rows > 0) {
        echo "<div class='col s12 m6'><div class='hoverable card red'><div class='card-content white-text'><span class='card-title'>This Week</span><p> This week, The Athletic Mentor is not accepting passes during the following periods:</p>";

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
            echo "<div class='center col s12'><div class='hoverable card green accent-3'><div class='card-content white-text'><span class='card-title'>The Athletic Mentor is available all week.</span></div></div></div>";
        }
    echo "</div>";
}



function LECmess()
{
        global $conn;
        global $today;
    {
    $sqlmessage = "SELECT day, dep, reason FROM message WHERE day = '$today' AND dep = 'LEC'";
    $resultmessage = $conn->query($sqlmessage);

        echo "<div class='row'>";
    if ($resultmessage->num_rows > 0) {
        echo "<div class='col s12'><div class='hoverable card teal darken-4'><div class='card-content white-text'><span class='card-title'>IMPORTANT MESSAGE FROM THE EXECUTIVE FUNCTIONING DEPARTMENT</span>";
        // output data of each row
        while($rowmessage = $resultmessage->fetch_assoc()) {
            echo "<p>";
            echo $rowmessage["reason"];
            echo "</p>";
        }
        echo "</div></div></div>";
        } else {
        echo "No Messages";
    }
        echo "</div>";
    }
}

function MATHmess()
{
        global $conn;
        global $today;
    {
    $sqlmessage = "SELECT day, dep, reason FROM message WHERE day = '$today' AND dep = 'Math Department'";
    $resultmessage = $conn->query($sqlmessage);

        echo "<div class='row'>";
    if ($resultmessage->num_rows > 0) {
        echo "<div class='col s12'><div class='hoverable card teal darken-4'><div class='card-content white-text'><span class='card-title'>IMPORTANT MESSAGE FROM THE MATH DEPARTMENT</span>";
        // output data of each row
        while($rowmessage = $resultmessage->fetch_assoc()) {
            echo "<p>";
            echo $rowmessage["reason"];
            echo "</p>";
        }
        echo "</div></div></div>";
        } else {
        echo "No Messages";
    }
        echo "</div>";
    }
}

function LIBmess()
{
        global $conn;
        global $today;
    {
    $sqlmessage = "SELECT day, dep, reason FROM message WHERE day = '$today' AND dep = 'Library'";
    $resultmessage = $conn->query($sqlmessage);

        echo "<div class='row'>";
    if ($resultmessage->num_rows > 0) {
        echo "<div class='col s12'><div class='hoverable card teal darken-4'><div class='card-content white-text'><span class='card-title'>IMPORTANT MESSAGE FROM THE LIBRARY</span>";
        // output data of each row
        while($rowmessage = $resultmessage->fetch_assoc()) {
            echo "<p>";
            echo $rowmessage["reason"];
            echo "</p>";
        }
        echo "</div></div></div>";
        } else {
        echo "No Messages";
    }
        echo "</div>";
    }
}

function HDmess()
{
        global $conn;
        global $today;
    {
    $sqlmessage = "SELECT day, dep, reason FROM message WHERE day = '$today' AND dep = 'Help Desk'";
    $resultmessage = $conn->query($sqlmessage);

        echo "<div class='row'>";
    if ($resultmessage->num_rows > 0) {
        echo "<div class='col s12'><div class='hoverable card teal darken-4'><div class='card-content white-text'><span class='card-title'>IMPORTANT MESSAGE FROM THE HELP DESK</span>";
        // output data of each row
        while($rowmessage = $resultmessage->fetch_assoc()) {
            echo "<p>";
            echo $rowmessage["reason"];
            echo "</p>";
        }
        echo "</div></div></div>";
        } else {
        echo "No Messages";
    }
        echo "</div>";
}
}

function WLmess()
{
        global $conn;
        global $today;
    {
    $sqlmessage = "SELECT day, dep, reason FROM message WHERE day = '$today' AND dep = 'Writing Lab'";
    $resultmessage = $conn->query($sqlmessage);

        echo "<div class='row'>";
    if ($resultmessage->num_rows > 0) {
        echo "<div class='col s12'><div class='hoverable card teal darken-4'><div class='card-content white-text'><span class='card-title'>IMPORTANT MESSAGE FROM THE WRITING LAB</span>";
        // output data of each row
        while($rowmessage = $resultmessage->fetch_assoc()) {
            echo "<p>";
            echo $rowmessage["reason"];
            echo "</p>";
        }
        echo "</div></div></div>";
        } else {
        echo "No Messages";
    }
        echo "</div>";
    }
}

function FLmess()
{
        global $conn;
        global $today;
    {
    $sqlmessage = "SELECT day, dep, reason FROM message WHERE day = '$today' AND dep = 'Foreign Language'";
    $resultmessage = $conn->query($sqlmessage);

        echo "<div class='row'>";
    if ($resultmessage->num_rows > 0) {
        echo "<div class='col s12'><div class='hoverable card teal darken-4'><div class='card-content white-text'><span class='card-title'>IMPORTANT MESSAGE FROM THE FOREIGN LANGUAGE DEPARTMENT</span>";
        // output data of each row
        while($rowmessage = $resultmessage->fetch_assoc()) {
            echo "<p>";
            echo $rowmessage["reason"];
            echo "</p>";
        }
        echo "</div></div></div>";
        } else {
        echo "No Messages";
    }
        echo "</div>";
    }
}

function AMmess()
{
        global $conn;
        global $today;
    {
    $sqlmessage = "SELECT day, dep, reason FROM message WHERE day = '$today' AND dep = 'Athletic Mentor'";
    $resultmessage = $conn->query($sqlmessage);

        echo "<div class='row'>";
    if ($resultmessage->num_rows > 0) {
        echo "<div class='col s12'><div class='hoverable card teal darken-4'><div class='card-content white-text'><span class='card-title'>IMPORTANT MESSAGE FROM THE ATHLETIC MENTOR</span>";
        // output data of each row
        while($rowmessage = $resultmessage->fetch_assoc()) {
            echo "<p>";
            echo $rowmessage["reason"];
            echo "</p>";
        }
        echo "</div></div></div>";
        } else {
        echo "No Messages";
    }
        echo "</div>";
    }
}



function allStudentMess() {
  global $conn;
  global $today;

  $sqlmessage = "SELECT day, dep, reason FROM message WHERE day = '$today' AND dep = 'All Students'";
  $resultmessage = $conn->query($sqlmessage);
  echo "<div class='row'>";
if ($resultmessage->num_rows > 0) {
  echo "<div class='col s12'><div class='hoverable card cyan accent-4'><div class='card-content white-text'><span class='card-title'>IMPORTANT PASSPORT SYSTEM MESSAGE</span>";
  // output data of each row
  while($rowmessage = $resultmessage->fetch_assoc()) {
      echo "<p>";
      echo $rowmessage["reason"];
      echo "</p>";
  }
  echo "</div></div></div>";
  } else {

}
  echo "</div>";
}



//Reasons
function reasonSel($reaDep) {
    global $conn;
    $reaDepNoSpace = preg_replace('/\s+/', '', $reaDep);
    echo "<select id='" . $reaDepNoSpace . "ID' name='why" . $reaDepNoSpace . "' class='browser-default' onchange=\"incBlur('why')\">";



        $sql="SELECT dep, why FROM why WHERE dep='$reaDep' ORDER BY why";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
          echo "<option selected value='No Choices'>--Not Required--</option>";
        } else {
          echo "<option selected disabled value=''>--Choose A Topic--</option>";
        // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['why'].'">' . $row['why']. "</option>";
            }
        }
    echo "</select>";
}







?>
