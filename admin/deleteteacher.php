<?
include "../sqlconnect.php";

if(isset($_POST['submitdel'])){ 

    
        foreach ($_POST as $key => $value) {

  }
    {


$deletethis = $_POST['delete'];
    }
}

$sql = "DELETE FROM teachers WHERE id='$deletethis'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    echo "<a href='teacherlist.php'>Go Back</a>";
    
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>