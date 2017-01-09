<?php
	$link=mysql_connect('localhost','admin','123456');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	if(!mysql_select_db('ecare')){
		die('Could not select database: ' . mysql_error());
	}
	mysql_query('SET NAMES UTF8');
//-------------------------------------------------------------------------------------------
	if(isset($_POST['id'])){$check = 0;}
	elseif (isset($_POST['email'])) {$check = 1;}
	switch($check){
		case 0:
			$id = $_POST['id'];
			$result = mysql_query('select * from member where cID = "'.$id.'"');
			$rows = mysql_num_rows($result);
			if($rows == 0){
				echo 'true';
			}
			else{
				echo 'false';
			}
			break;
		
		case 1: 
		default:
			$email = $_POST['email'];
			$result = mysql_query('select * from member where cEmail = "'.$email.'"');
			$rows = mysql_num_rows($result);
			if($rows == 0){
				echo 'true';
			}
			else{
				echo 'false';
			}
		break;
	}
	mysql_free_result($result);
	mysql_close($link);
?>