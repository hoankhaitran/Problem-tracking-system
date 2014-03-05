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
<div id="content">

<?php

			include'database_class.php';
			$database_access= new mysql_access;
			$id= $_GET['id'];
			$sql= "SELECT * FROM p_report WHERE ID = '$id' ";
			$result = $database_access->query($sql);
			$num_of_row = mysql_numrows($result);
			$i=$num_of_row-1 ;
			
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
			
			
			
						
			
?>


<body>
<table width="703" border="1">
  <tr>
    <th width="135" align="left" scope="row">Problem ID</th>
    <td id="cell" width="552" align="left"><FONT COLOR="18649B"><?php echo " $id";?> </FONT></td>
  </tr>
  <tr>
    <th width="135" align="left" scope="row">Problem Subject</th>
    <td id="cell" width="552" align="left"><FONT COLOR="18649B"><?php echo " $problem_subject";?> </FONT></td>
  </tr>
  <tr>
    <th height="111" align="left" scope="row">Problem Description</th>
    <td id="cell1" align="left" ><FONT COLOR="18649B"><?php echo " $prob_desc";?> </FONT></td>
  </tr>
  <tr>
    <th align="left" scope="row">Category:</th>
    <td align="left"><FONT COLOR="18649B"><?php echo " $category";?> </FONT></td>
  </tr>
  <tr>
    <th scope="row" align="left">Date Due:</th>
    <td align="left"><FONT COLOR="18649B"><?php echo " $date_due ";?> </FONT></td>
  </tr>
  <tr>
    <th scope="row" align="left">System Type:</th>
    <td align="left"><FONT COLOR="18649B"> <?php echo " $system_type";?> </FONT></td>
  </tr>
  <tr>
    <th scope="row" align="left">Room:</th>
    <td align="left"><FONT COLOR="18649B"><?php echo " $room $room_number";?> </FONT></td>
  </tr>
  <tr>
    <th scope="row"align="left">Position Room:</th>
    <td align="left"><FONT COLOR="18649B"><?php echo " $position_room";?></FONT></td>
  </tr>
  <tr>
    <th scope="row" align="left">Where:</th>
    <td align="left"><FONT COLOR="18649B"><?php echo " $problem_type";?></FONT></td>
  </tr>
  <tr>
    <th scope="row" align="left">Computer Name:</th>
    <td align="left"><FONT COLOR="18649B"><?php echo " $computer_name";?></FONT></td>
  </tr>
  <tr>
    <th scope="row"align="left">First Name:</th>
    <td align="left"><FONT COLOR="18649B"><?php echo " $first_name";?></FONT></td>
  </tr>
  <tr>
    <th scope="row"align="left">Last Name:</th>
    <td align="left"><FONT COLOR="18649B"><?php echo " $last_name";?></FONT></td>
  </tr>
  <tr>
    <th scope="row"align="left">Your Email Address:</th>
    <td align="left"><FONT COLOR="18649B"><?php echo " $reporter_email";?></FONT></td>
  </tr>
  <tr>
    <th scope="row"align="left">Your Phone Number:</th>
    <td align="left"><FONT COLOR="18649B"><?php echo " $reporter_phone";?></FONT></td>
  </tr>
    <tr>
    <th width="135" height="111" align="left" scope="row">Problem Solution</th>
    <td id="cell" width="552" align="left"><FONT COLOR="18649B"><?php echo " $problem_solution";?> </FONT></td>
  </tr>
  <tr>
  </tr>
  <tr>
    <th colspan="2" scope="row" align="center" >
    <?php 
	echo '<input type=button value="Back" onclick="javascript:history.go(-1);">';
	?>
    </th>
    
    </tr>
</table>


</div>
<?php
include'footer.html';
?>
</body>
</html>