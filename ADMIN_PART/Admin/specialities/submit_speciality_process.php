<!doctype html>
<html>
<head>
<meta charset="utf-8" http-equiv="refresh" content="2;url=../index.php">

<title>Untitled Document</title>
<?php 
include_once("../connection/connection.php");
include_once("speciality_class.php");


$newSpeciality = new specialty();
$connection = new Connection();

$handler = $connection->get_connection_handler();

?>

</head>


<body>

<?php 
if(isset($_POST['Submit']))
{
	$newSpeciality->set_specialty_title($_POST['Speciality_Title']);
	$newSpeciality->set_specialty_description($_POST['Speciality_Description']);
	echo '<pre>',print_r($newSpeciality),'</pre>';
	
	$result = $newSpeciality->SubmitNewSpeciality($newSpeciality,$handler);
	if($result){
	echo("<script>alert('Speciality has been submited')</script>");
	}
}


if(isset($_POST['Delete']))
{
	$specialityId = $_POST['specialty_id'];
	
	echo '<pre>',print_r($newSpeciality),'</pre>';
	
	$result = $newSpeciality->deleteSpeciality($specialityId,$handler);
	if($result){
	echo("<script>alert('Speciality has been Deleted')</script>");
	}
}



?>





</body>
</html>