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
<form action="authenticate.php" method="post" target="">
<table width="200" border="1" align="center">
  <tr>
    <td><label  >Username :</label></td>
    <td><input name="username" type="text" size="10" /> </td>
  </tr>
  <tr>
    <td><label  >Password:</label></td>
    <td><input name="password" type="password" size="10" /> </td>
  </tr>
  <tr>
  <td colspan="2" align="center"> <input name="Login" type="submit" value="Login" /></td>
  </tr>

</table>


</form>
</div>
<?php
include'footer.html';
?>
</body>
</html>