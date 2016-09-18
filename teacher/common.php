<?php
function checklogin()
{
session_start();
if(isset($_SESSION['adminok']) || isset($_SESSION['teacherok'])) {
  
} else {
  header("location: login.php");
}
}

?>
