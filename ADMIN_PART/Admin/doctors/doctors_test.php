<?php
header('Content-Type: text/html; charset=utf8'); ?>

<?php 

include_once("../connection/connection.php");
include_once("doctor_class.php");
include ("../specialities/speciality_class.php");



$connection = new Connection();
$doctors = new Doctors;
$handler = $connection->get_connection_handler();
$specialObject = new specialty;


//if ($_GET['specialty_title'] <> null)
//{

	
	
$result = $doctors->RetriveDoctors($handler);
echo json_encode($result);
//}

?>
