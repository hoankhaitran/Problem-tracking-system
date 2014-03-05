<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page</title>
<style type="text/css">
@import url("bc-stylesheet.css");
</style>
</head>

<body>
<?php
include'header.html';
?>
<div id="content">
<?php
session_start();
if(isset($_SESSION['valid_user'])){
	echo'<br><b>Logged in as <FONT COLOR="red">'.$_SESSION['valid_user'].'</font><a href="logout.php">(logout) </a> </b>';
	$priority = $_SESSION['priority'];
	switch($priority){
				case 1:
					echo'<b> .You have <FONT COLOR="blue">labbie</font>  rights</b><br><br>';break;
				case 2:
					echo'<b> .You have <FONT COLOR="blue">floater</font>  rights</b><br><br>';break;
				case 3:
					echo'<b> .You have <FONT COLOR="blue">ECS </font>  rights</b><br><br>';	break;
				case 4:
					echo'<b> .You have <FONT COLOR="blue">Service Center</font>  rights</b><br><br>';	break;
				default:	
	}
	echo"<br>priority is ".$_SESSION['priority'];
	//echo '<a href="logout.php"> Log out </a>';
}
else{
	echo"not logged in";
	header("Location: login.php");
}
?>


</div>
<?php
include'footer.html';
?>
</body>
</html>