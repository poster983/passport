<html>

<head>
    <title>Passr-Printout</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

    <?
        
    include "../sqlconnect.php";
    
    

    
    
    if(!isset($_POST['search'])) { //exit();
    
        $where_day = "";
    } else {
    foreach ($_POST as $key => $value) {

  }
    
        $datesearch = $_POST['datesearch'];
        $where_day = "WHERE day_to_come ='$datesearch'";
    
    }
    $sql = "SELECT firstname, lastname, email, student_id, period, sh_teacher, place, day_to_come FROM passes $where_day ORDER BY period";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='bordered responsive-table'><thead><tr><th>Check In</th><th>Student ID</th><th>Name</th><th>Email</th><th>Period</th><th>Study Hall Teacher</th><th>Department</th><th>Day</th></tr></thead>";
        // output data of each row
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . 'Signature:  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp' . "</td><td>" . $row["student_id"]. "</td><td>" . $row["firstname"]. " " . $row["lastname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["period"]. "</td><td>" . $row["sh_teacher"]. "</td><td>" . $row["place"]. "</td><td>" . $row["day_to_come"]. "</td></tr></tbody>";
        }
        
        echo "</tbody></table>";
        } else {
            echo "0 results";
        }

$conn->close();
?>
</body>

</html>