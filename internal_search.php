<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Internal Search</title>
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
	//echo"logged in as ".$_SESSION['valid_user'];
	echo'<div id="content">

<form action="internal_search_results.php" method="get" name="query">
<table width="300" border="1" align="center">
  <tr>
    <td><label  >By ID number :</label><input type="hidden" name="id" value="0">
<input type="checkbox" name="id" value="1">
    </td>
    <td><input name="search_id" type="text" size="10" /> </td>
  </tr>
    <tr>
    <td><label  >By Subject :</label><input type="hidden" name="subject" value="0">
<input type="checkbox" name="subject" value="1">
    </td>
    <td><input name="search_subject" type="text" size="10" /> </td>
  </tr>
  <td><label  >By Name :</label><input type="hidden" name="name" value="0">
<input type="checkbox" name="name" value="1">
    </td>
    <td><input name="search_name" type="text" size="10" /> </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="Search" /></td>
    </tr>

</table>

</form>

</div>';
	
	//echo '<a href="logout.php">Log out </a>';
	
}
else{
	echo"not logged in";
		header('Refresh: 2; URL=login.php');
}
?>


</div>
<?php
include'footer.html';
?>
</body>
</html>