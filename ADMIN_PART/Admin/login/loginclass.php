<?php
class login_Table{
public $ID, $usr_name, $usr_passwd,$user_level;


public function CreateLogin(login_Table $loginnew, PDO $handler){
	
	$loginnew->usr_passwd = md5($loginnew->usr_passwd);
	$sqlInsert = 
	"INSERT INTO login 
	(ID,usr_name, usr_passwd ,usr_level ) 
	VALUES
	(:ID,:usr_name, :usr_passwd , :usr_level)";
	$ConvertetClassToArray = (array)$loginnew;
	$query = $handler->prepare($sqlInsert);
	$query->execute($ConvertetClassToArray);
	
}

public function Login($usr_name , $usr_passwd , PDO $handler)
{
	
	$LoginTableObject = new login_Table;
	$usr_passwd = md5($usr_passwd);
	$query = $handler->query("Select * from users 
	WHERE usr_name ='$usr_name' and usr_passwd ='$usr_passwd'" );
	
	$query->setFetchMode(PDO::FETCH_CLASS,'login_Table');
	$LoginTableObject = $query->fetch();
	print_r($LoginTableObject);
	return $LoginTableObject;
	
}
}

?>