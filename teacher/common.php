<?php
function checklogin()
{
session_start();
if(!isset($_SESSION['teacherok']))
header("location: login.php");
}


?>
