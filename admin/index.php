<?php

include("../config.php");
include("common.php");
checklogin();
$msg = "";

if(isset($_POST['Submit']))
{
	$total = $_POST['total'];
	$td = 0;
	$i = 0;
	
	for($i = 1; $i <= $total; $i++)
	{
		if(isset($_POST["d$i"]))
		{
			mysql_query("DELETE FROM url WHERE id=".mysql_real_escape_string($_POST["d$i"]),$link);
			$td++;
		}
	}

	$msg = "$td url(s) deleted!";
}



$result = mysql_query("select * from url", $link);
$num = mysql_num_rows($result);
$n = 0;
?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <html>

    <head>
        <title>Admin - lijo.pw</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>

    <body>
        <h1>lijo.pw<h1>
<br /><br />

  <table border="0" cellpadding="6" cellspacing="0" bordercolor="#000000">
    <tr> 
<td align="center"><img src="images/home.gif" alt="Home" /></td>
<td align="center"><img src="images/new.gif" alt="New" /></td>
<td align="center"><img src="images/delete.gif" alt="Delete" /></td>
<td align="center"><img src="images/logout.gif" alt="Logout" /></td>
    </tr>
    <tr> 

<td align="center"><a href="../">Home</a></td>
<td align="center"><a href="new.php">New</a></td>
<td align="center"><a href="empty.php">Delete All</a></td>
<td align="center"><a href="logout.php">Logout</a></td>
    </tr>
  </table>

<p><?php echo $msg?></p>
<form name="form1" method="post" action="">
  <br /><br />
  <table  border="0" cellpadding="1" cellspacing="1" bordercolor="#000000">
    <tr bgcolor="#dedede"> 
      <td>Delete</td>
<td>ID</td>
<td>Tag</td>
<td>Edit</td>
      <td>Url</td>
<td>User IP</td>
<td>Hits</td>
    </tr>
    <?php while($row = mysql_fetch_array($result, MYSQL_BOTH)){
$n++;
?>
    <tr> 
      <td><input type="checkbox" name="d<?php echo $n;?>" value="<?php echo htmlspecialchars($row['id']);?>"></td>
<td> <?php echo htmlspecialchars($row['id']);?></td>
<td> <?php echo htmlspecialchars($row['tag']);?></td>
<td align="center"><a href="new.php?id=<?php echo htmlspecialchars($row['id']); ?>"><img src="images/edit.gif" alt="Edit" /></a></td>
<td> <a href="<?php echo htmlspecialchars($row['url']);?>"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo htmlspecialchars($row['url']);?></font></a></td>
<td><?php echo htmlspecialchars($row['ip']); ?></td>
<td><?php echo htmlspecialchars($row['count']); ?></td>

    </tr>
    <?php

 }?>
    <tr> 
      <td><br /><br /></td>
      <td><input type="submit" name="Submit" value="Delete"> <input name="total" type="hidden" id="total" value="<?php echo $n?>"></td>
    </tr>
  </table>
<br /></form>
<br />
<br />
</body>
</html>