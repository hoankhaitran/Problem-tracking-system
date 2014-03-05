<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
$is_good=false;
if(isset($_SESSION['valid_user'])){
	echo"Priority is ".$_SESSION['priority'];
	if($_SESSION['priority']>2) //Only ECS and Service can delete
	$is_good=true;
	
}
	else{
	include'footer.html';
	header('Refresh: 0; URL=login.php');
	exit();
}

$id= $_GET['id'];
//echo"$id";

		if($is_good==true){		
			include'database_class.php';
			$database_access= new mysql_access;
			
			$sql= "DELETE FROM p_report WHERE ID ='$id'";
			$result = $database_access->query($sql);
			echo'done';
			echo '<input type=button value="Back to search results" onclick="javascript:history.go(-2);">';
			
		}else //display back button
		echo'NOT done';
		echo '<input type=button value="Back" onclick="javascript:history.go(-1);">';



?>
</div>

<?php
require'footer.html';
?>
</body>
</html>


