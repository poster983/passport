<html>

<head>
    <title>Passr-Teacher list</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

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

</html>