<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Detailed View</title>
<style type="text/css">
@import url("bc-stylesheet.css");
</style>
</head>

<body>
<?php
include'header.html';
?>
<?php
session_start();
if(isset($_SESSION['valid_user'])){
	//echo"Logged in as ".$_SESSION['valid_user'];
	
}
	else{
	include'footer.html';
	header('Refresh: 2; URL=login.php');
	exit();
}
?>
<div id="content">

<?php

			include'database_class.php';
			$database_access= new mysql_access;
			$id= $_GET['id'];
			$sql= "SELECT * FROM p_report WHERE ID = '$id' ";
			$result = $database_access->query($sql);
			$num_of_row = mysql_numrows($result);
			$i=$num_of_row-1 ;
			$priority=$_SESSION['priority'];
			
			$problem_subject= mysql_result($result,$i,'subject');
			$prob_desc= mysql_result($result,$i,'prob_desc');
			$category = mysql_result($result,$i,'category');
			$date_due = mysql_result($result,$i,'date_due');
			$system_type = mysql_result($result,$i,'system_type');
			$room = mysql_result($result,$i,'room_building');
			$room_number = mysql_result($result,$i,'room_number');
			$position_room = mysql_result($result,$i,'position_room');
			$problem_type = mysql_result($result,$i,'problem_type');
			$computer_name = mysql_result($result,$i,'computer_name');
			$first_name = mysql_result($result,$i,'first_name');
			$last_name = mysql_result($result,$i,'last_name');
			$reporter_email = mysql_result($result,$i,'reporter_email');
			$reporter_phone = mysql_result($result,$i,'reporter_phone');
			$problem_solution= mysql_result($result,$i,'problem_solution');
			$escalation= mysql_result($result,$i,'escalation');

			if($priority<$escalation){
				echo'You do not have clearance to see this record';
				echo '<input type=button value="Back" onclick="javascript:history.go(-1);">';
				echo"</div>";
				include'footer.html';
				echo'</body></html>';
				exit();	
			}
?>


<body>

   <form action="problem_update.php" method="post" name="problem update">
        <table width="703" border="1">
  <tr>
    <th width="135" align="left" scope="row">Problem Subject</th>
    <td id="cell" width="552" align="left" onMouseOver="changeColor('808080', this.id);" onMouseOut="changeColor('FFFFFF', this.id);">
    <input name="id" type="hidden" id="id" value="<?php echo "$id";?>" />
    <label for="problem subject"></label>
      <input name="problem_subject" type="text" id="problem_subject" value="<?php echo "$problem_subject";?>" /></td>
  </tr>
  <tr>
    <th height="111" align="left" scope="row">Problem Description</th>
    <td id="cell1" align="left" onMouseOver="changeColor('808080', this.id);" onMouseOut="changeColor('FFFFFF', this.id);"><label for="problem_desc"></label>
      <textarea name="problem_desc" id="problem_desc" cols="60" rows="6"  ><?php echo "$prob_desc";?></textarea></td>
  </tr>
  <tr>
    <th align="left" scope="row">Category:</th>
    <td align="left"><label for="category">
      <select name="category" value=""id="category">
        <option><?php echo "$category";?>--current value</option>
        <option >Mouse</option>
        <option>Keyboard</option>
        <option >Printer</option>
        <option >Hardware</option>
        <option>Software</option>
        <option>Locked System</option>
        <option>Other</option>
      </select>

      
    </label></td>
  </tr>
  <tr>
    <th scope="row" align="left">Date Due:</th>
    <td align="left"><input name="date_due" type="text" class="tcal" id="date_due" value="<?php echo "$date_due ";?>" readonly /></td>
  </tr>
  <tr>
    <th scope="row" align="left">System Type:</th>
    <td align="left">
      <select name="system_type" size="1" id="system_type">
        <option><?php echo "$system_type";?>--current value</option>
        <option>pc</option>
        <option>mac</option>
        <option>laptop</option>
        <option>others</option>
      </select></td>
  </tr>
  <tr>
    <th scope="row" align="left">Room:</th>
    <td align="left"><select name="room" size="1" id="room">
      <option><?php echo "$room";?>--current value</option>
      <option>RVR</option>
      <option>SCL</option>
      <option>ARC</option>
    </select><label><strong>Number</strong></label>
    <label for="room_number"></label>
    <input name="room_number" type="text" id="room_number" value="<?php echo "$room_number";?>" size="6" /> ####</td>
  </tr>
  <tr>
    <th scope="row"align="left">Position Room:</th>
    <td align="left"><input name="position_room" type="text" id="position_room" value="<?php echo "$position_room";?>" /></td>
  </tr>
  <tr>
    <th scope="row" align="left">Where:</th>
    <td align="left"><select name="where" size="1" id="where">
    <option><?php echo "$problem_type";?>--current value</option>
    <option>Lab</option>
	<option>faculty</option>
    <option>staff</option>
    <option>student</option>
    <option>cpe-eee_labs</option>
    </select></td>
  </tr>
  <tr>
    <th scope="row" align="left">Computer Name:</th>
    <td align="left"><input name="computer_name" type="text" id="computer_name" value="<?php echo "$computer_name";?>" /></td>
  </tr>
  <tr>
    <th scope="row"align="left">First Name:</th>
    <td align="left"><input name="first_name" type="text" id="first_name" value="<?php echo "$first_name";?>" /></td>
  </tr>
  <tr>
    <th scope="row"align="left">Last Name:</th>
    <td align="left"><input name="last_name" type="text" id="last_name" value="<?php echo "$last_name";?>" /></td>
  </tr>
  <tr>
    <th scope="row"align="left">Your Email Address:</th>
    <td align="left"><input name="reporter_email" type="text" id="reporter_email" value="<?php echo "$reporter_email";?>" /></td>
  </tr>
  <tr>
    <th scope="row"align="left">Your Phone Number:</th>
    <td align="left"><input name="reporter_phone" type="text" id="reporter_phone" value="<?php echo "$reporter_phone";?>" /> ###-###-#### (i.e 916-327-1432)</td>
  </tr>
  <tr>
    <th scope="row"align="left">Question</th>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2" scope="row"align="center"><input type="submit" name="report" id="report" value="Update Problem" />
    <input type=button value="Back" onclick="javascript:history.go(-1);">
    <form> <input type=button value="Delete Problem" onclick="window.location.href='problem_delete.php?id=<?php echo"$id";?>'">
    
    </form>

    </th>
    </tr>
</table>

        </form>
  

</div>
<?php
include'footer.html';
?>
</body>
</html>