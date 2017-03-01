<?php
function checklogin()
{
session_start();
if(isset($_SESSION['adminok']) || isset($_SESSION['teacherok'])) {
  return true;
} else {
  return false;
  header("location: login.php");
}
}

?>
