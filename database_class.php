<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
class mysql_access{
	var $host ='localhost';
	var $username='test';
	var $password = 'test';
	var $db ='project';
	var $con;
	//constructor
	function mysql_access(){
		
		$this->con = mysql_connect($this->host,$this->username,$this->password);
		//check connection
		if(!$this->con){
			die("Could not connect to database:".mysql_error($this->con));
		}
		//select the database in mysql
		$db_select = mysql_select_db($this->db, $this->con);
		if(!$db_select){
			die("Could not select database:".mysql_error($this->con));	
		}
	}
	
	//database functions
	function query($query){
		//$query = mysql_real_escape_string($query);
		$result = mysql_query($query, $this->con);
		if(!$result){
			die("Could not query the database: $query" .mysql_error());
		}//else mysql_close($this->con);
		return $result;
	}
	function close(){
		 mysql_close($this->con);
	}
	function get_last_insert_id(){
		$results = $this->query("SELECT MAX(ID) from p_report");
		$row= mysql_fetch_array($results);
		return $row[0];
	}
	
}
?>
</body>
</html>