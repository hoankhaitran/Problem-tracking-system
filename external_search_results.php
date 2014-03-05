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



$checkbox_id=$_POST['id'];
$checkbox_name=$_POST['name'];

$checkbox_subject=$_POST['subject'];
$search_id = mysql_real_escape_string($_POST['search_id']);
$search_subject = mysql_real_escape_string($_POST['search_subject']);
$search_name = mysql_real_escape_string($_POST['search_name']);//prevent SQL injection
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
          echo "</tr>\n</thead>\n";
		
		while($results = mysql_fetch_array($raw_result)){// display rows
			 echo'<tr>
			 
			 <td ><a href="external_search_details.php?id='.$results['ID'].'"</a>'.$results['subject'].'</td>
			 <td>'.$results['problem_type'].'</td>
			 <td>'.$results['room_building'].$results['room_number'].'</td>
			 <td>'.$results['category'].'</td>
			 <td>'.$results['status'].'</td>
			 <td>'.$results['date_entered'].'</td>
			 <td>'.$results['date_complete'].'</td>
			 </tr>';
		}
		echo' <td colspan="7" align="center">'; 
		echo '<input type=button  value="Back" onclick="javascript:history.go(-1);"> ';
		echo'</td>';
		echo"</table>";
		
	}else{
		echo '<b><FONT COLOR="red"> #Record not found. Please try to lower your criteria  </FONT><br>';
	    echo '<input type=button  value="Back" onclick="javascript:history.go(-1);"> ';
	}
    }
else{
	echo '<b><FONT COLOR="red"> #Please choose at least one search criteria and provide the search key  </FONT><br>';
	echo '<input type=button value="Back" onclick="javascript:history.go(-1);">';
}
?>


</div>
<?php
include'footer.html';
?>
</body>
</html>