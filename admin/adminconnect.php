<?
include "../config.php";
    
$link = mysql_connect("$servername", "$dbusername", "$dbpassword")or die("Could not connect");
$db = mysql_select_db("$database", $link)or die("Could not select database");
?>