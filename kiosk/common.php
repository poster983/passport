<?php
function checklogin()
{
session_start();
if(!isset($_SESSION['kioskok']))
header("location: login.php");
}

?>