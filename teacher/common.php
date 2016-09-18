<?php
function checklogin()
{
session_start();
if(isset($_SESSION['adminok']) || isset($_SESSION['teacherok'])) {
  $loggedin = 1;
} else {
  header("location: login.php");
}
}

?>
