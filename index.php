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
<body>
<div id="content">
<?php
$is_good=true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		//form variables
		 	
		 if(!empty($_POST['problem_subject'])){
			$problem_subject = $_POST['problem_subject'];
			
		 }else{
			$is_good=false;
			echo '<b># </><FONT COLOR="black"> Subject </FONT> <FONT COLOR="red"> is empty </FONT><br>';
		 }
		 
		 if(!empty($_POST['problem_desc'])){
			$problem_desc = $_POST['problem_desc'];
			
		 }else{
			 $is_good=false;
			echo '<b># </><FONT COLOR="black"> Description </FONT> <FONT COLOR="red"> is empty </FONT><br>';
		 }
		
		$category = $_POST['category'];
		//convert date to mysql date format which is YYYY-MM-DD 
		if(isset($_POST['date_due']) && $_POST['date_due'] != "") { 
			$_POST['date_due'] = date("Y-m-d", strtotime($_POST['date_due'])); 
		}
		
		$date_due = $_POST['date_due'];
		$system_type = $_POST['system_type'];
		$room = $_POST['room'];
		
		if(!empty($_POST['room_number'])){
			if(preg_match("/^[0-9]{0,4}$/", $_POST['room_number'])){
				$room_number = $_POST['room_number'];
			}else{
				$is_good=false;
				echo '<b># </><FONT COLOR="black"> Room number </FONT> <FONT COLOR="red"> is invalid </FONT><br>';
			}
		 }else{
			$is_good=false;
			echo '<b># </><FONT COLOR="black"> Room number </FONT> <FONT COLOR="red"> is empty </FONT><br>';
		 }
		
		if(!empty($_POST['position_room'])){
			$position_room = $_POST['position_room'];
			
		 }else{
			$is_good=false;
			echo '<b># </><FONT COLOR="black"> Position Room </FONT> <FONT COLOR="red"> is empty </FONT><br>';
		 }
		
		$problem_type = $_POST['where'];
		/*
		if(!empty($_POST['computer_name'])){
			$computer_name = $_POST['computer_name'];
			
		 }else{
			$is_good=false;
			echo '<b># </><FONT COLOR="black"> Computer name </FONT> <FONT COLOR="red"> is empty </FONT><br>';
		 }
		if(!empty($_POST['first_name'])){
			$first_name = $_POST['first_name'];
			
		 }else{
			$is_good=false; 
			echo '<b># </><FONT COLOR="black"> First name </FONT> <FONT COLOR="red"> is empty </FONT><br>';
		 }
		if(!empty($_POST['last_name'])){
			$last_name = $_POST['last_name'];
			
		 }else{
			$is_good=false;
			echo '<b># </><FONT COLOR="black"> Last name </FONT> <FONT COLOR="red"> is empty </FONT><br>';
		 }
		*/
		if(!empty($_POST['reporter_email'])){
			$reporter_email = $_POST['reporter_email'];
			// Set up regular expression strings to evaluate the value of email variable against
			$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
			// Run the preg_match() function on regex against the email address
			if (preg_match($regex, $reporter_email)) {
				//do nothing
			} else { 
				 $is_good=false;
				 echo '<b># </><FONT COLOR="black">'.$reporter_email.'</FONT> <FONT COLOR="red"> email address is invalid </FONT><br>';
			}
			
		 }else{
			$is_good=false; 
			echo '<b># </><FONT COLOR="black"> Reporter email </FONT> <FONT COLOR="red"> is empty </FONT><br>';
		 }
		
		if(!empty($_POST['reporter_phone'])){
			if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST['reporter_phone'])) {
				$reporter_phone = $_POST['reporter_phone'];
			}else {
				$is_good=false;
				echo '<b># </><FONT COLOR="black">Phone number </FONT> <FONT COLOR="red"> is invalid </FONT><br>';
			}
			
		 }else{
			$is_good=false;
			echo '<b># </><FONT COLOR="black">Phone number </FONT> <FONT COLOR="red"> is empty </FONT><br>';
		 } 
		
				
		//set up the connection if pass validation
		if($is_good==true){		
			include'database_class.php';
			$database_access= new mysql_access;
			$sql= "INSERT INTO p_report 				(subject,prob_desc,category,date_due,system_type,room_building,room_number,position_room,problem_type,computer_name,first_name,last_name,reporter_email,reporter_phone) VALUES ('$problem_subject','$problem_desc','$category','$date_due','$system_type','$room','$room_number','$position_room','$problem_type','$computer_name','$first_name','$last_name','$reporter_email','$reporter_phone')";
			$result = $database_access->query($sql);
			header('Location:prob_confirm.php');
			
		}else //display back button
		echo '<input type=button value="Back" onclick="javascript:history.go(-1);">';


}else include'show_form.php';
?>
</div>
</body>
<?php
require'footer.html';
?>
</body>
</html>


