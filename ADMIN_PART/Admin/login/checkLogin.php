<?php 

include_once ("../connection/connection.php");
include_once("loginclass.php");
 
 session_start();
 
 
 if (isset($_POST['submit']))
 {
	  
	 $usr_name = test_input($_POST['email']);
	$usr_passwd = test_input($_POST['password']);
	 $newLogin = New login_Table;
	 $connection = new Connection;
	 $handler = $connection->get_connection_handler();
	
	print_r($handler);
		
		if ($newLogin= $newLogin->Login($usr_name,$usr_passwd,$handler))
		{
			$type= $newLogin->user_level;
			$_SESSION['UserType'] = $type;
			
			$_POST['UserType'] = $type;
		header("Location:../index.php");
				
		}
		
		else {
		echo 'No Connection'; 
		}
	 }
	 else 'Not Valid Request';
	 
	 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>