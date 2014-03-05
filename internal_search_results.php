<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page</title>
<style type="text/css">
@import url("bc-stylesheet.css");
</style>

<script type="text/javascript" src="jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="jquery.tablesorter.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#sortedtable").tablesorter({ sortlist: [0,0] });
			});
</script>
</head>

<body>
<?php
include'header.html';
?>

<div id="content">
<?php

session_start();
if(isset($_SESSION['valid_user'])){
			echo'<br><b>Logged in as <FONT COLOR="red">'.$_SESSION['valid_user'].'</font> <a href="logout.php">(logout) </a> </b>';
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
			$checkbox_id=$_GET['id'];
			$checkbox_name=$_GET['name'];
			
			$checkbox_subject=$_GET['subject'];
			$search_id = mysql_real_escape_string($_GET['search_id']);
			$search_subject = mysql_real_escape_string($_GET['search_subject']);
			$search_name = mysql_real_escape_string($_GET['search_name']);//prevent SQL injection
			$sql=" ";
			if($checkbox_id==1){
				$sql="SELECT * FROM p_report WHERE ID ='$search_id'";
			}
			if($checkbox_subject==1){
				if($sql!=" ")
				$sql=$sql."AND subject LIKE '%$search_subject%'" ;
				else $sql= "SELECT * FROM p_report WHERE subject LIKE '%$search_subject%'";
			}
			if($checkbox_name==1){
				if($sql!=" ")
				$sql=$sql."AND first_name LIKE '%$search_name%'" ;
				else $sql= "SELECT * FROM p_report WHERE first_name LIKE '%$search_name%'";
			}
			//$sql.="AND escalation <='$priority'";
			include'database_class.php';
			$database_access= new mysql_access;
			//$sql="SELECT * FROM p_report WHERE subject LIKE '%$search_subject%' OR ID ='$search_id'";
			
			if( ($checkbox_id==1&& strlen($search_id)>0) ||
				($checkbox_subject==1&& strlen($search_subject)>0)||
				($checkbox_name==1&& strlen($search_name)>0) 
			
			){
				$raw_result = $database_access->query($sql);
				if(mysql_num_rows($raw_result)>0){
					
					  echo "<table id=\"sortedtable\" class=\"bordered\" cellspacing=\"0\"".'align="center"'.">\n";
					  echo "<thead>\n<tr>";
					  echo "<th>Subject</th>";
					  echo "<th>Problem Type</th>";
					  echo "<th>Room</th>";
					  echo "<th>Category</th>";
					  echo "<th>Status</th>";
					  echo "<th>Date Entered</th>";
					  echo "<th>Date Completed</th>";
					  echo "<th>Escalation Level</th>";
					  echo "</tr>\n</thead>\n";
					
					while($results = mysql_fetch_array($raw_result)){// display rows
						 echo'<tr>
						 
						 <td ><a href="internal_search_details.php?id='.$results['ID'].'"</a>'.$results['subject'].'</td>
						 <td>'.$results['problem_type'].'</td>
						 <td>'.$results['room_building'].$results['room_number'].'</td>
						 <td>'.$results['category'].'</td>
						 <td>'.$results['status'].'</td>
						 <td>'.$results['date_entered'].'</td>
						 <td>'.$results['date_complete'].'</td>
						 <td>'.$results['escalation'].'</td>
						 </tr>';
					}
					
					
					echo'</td>';
					echo"</table>";
					echo'<div align="center">';
					echo '<input type=button  value="Back" onclick="javascript:history.go(-1);"> ';
					echo'</div>';
				}else{
					echo '<b><FONT COLOR="red"> #Record not found. Please try to lower your criteria  </FONT><br>';
					echo '<input type=button  value="Back" onclick="javascript:history.go(-1);"> ';
				}
				}
			else{
				echo '<b><FONT COLOR="red"> #Please choose at least one search criteria and provide the search key  </FONT><br>';
				echo '<input type=button value="Back" onclick="javascript:history.go(-1);">';
			}
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