<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage problems</title>
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
$username = $_POST['username'];
$password = $_POST['password'];
include'database_class.php';
$database_access= new mysql_access;
$query = "SELECT * FROM p_report_users WHERE user_name = '$username' AND password = SHA1('$password')";
$result = $database_access->query($query);
$results=mysql_fetch_array($result);
if(mysql_numrows($result)>0){
	$_SESSION['valid_user'] = $username;
	$_SESSION['priority']= $results['priority'];
	header("Location: admin.php");
}else{
	echo("Wrong username or password");
}

?>


</div>
<?php
include'footer.html';
?>
</body>
</html>