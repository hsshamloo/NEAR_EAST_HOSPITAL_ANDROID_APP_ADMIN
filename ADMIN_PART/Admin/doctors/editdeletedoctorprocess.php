<!doctype html>
<html>
<head>
<title>Untitled Document</title>

<meta charset="utf-8" http-equiv="refresh" content="30;url=../index.php">

<title>Untitled Document</title>

<?php include_once ("../connection/connection.php");
include_once ("doctor_class.php");
$ConnectionObject = new Connection;
$NewDoctor = new Doctors; 
$handler = $ConnectionObject->get_connection_handler();

?>
</head>



<body>
<?php

if(isset($_POST['submit']))
{
$NewDoctor->set_doctor_Id($_POST['doctor_Id']);
$NewDoctor->set_doctor_first($_POST['doctor_first']);
$NewDoctor->set_doctor_last($_POST['doctor_last']);
$NewDoctor->set_doctor_title($_POST['doctor_title']);
$NewDoctor->set_doctor_speciality_id($_POST['doctor_speciality_id']);
//$NewDoctor->set_doctor_sub_speciality_id($_POST['doctor_sub_speciality_id']);
$NewDoctor->set_doctor_description($_POST['doctor_description']);
if (is_null($_FILES['doctor_image']['name']))
{
	$NewDoctor->set_doctor_image_id($_POST['doctor_Image']);
}
else 
{
	$NewDoctor->set_doctor_image_id($_FILES['doctor_image']['name']);
	$doctor_image= ($_FILES['doctor_image']['name']);
	$product_image_tmp = $_FILES['doctor_image']['tmp_name'];
	move_uploaded_file($product_image_tmp,"doctorimages/$doctor_image");
}
	
$result = $NewDoctor->UpdateDoctor($NewDoctor,$handler);
	
if($result){
	echo("<script>alert('Doctor has been Updated')</script>");
	//header("Location:../index.php");	
}

}

?>

</body>
</html>