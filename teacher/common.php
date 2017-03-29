<?php
function checklogin()
{
session_start();
if(isset($_SESSION['adminok']) || isset($_SESSION['teacherok'])) {
 return true;
} else {

  header("location: login.php");

}
}

?>
