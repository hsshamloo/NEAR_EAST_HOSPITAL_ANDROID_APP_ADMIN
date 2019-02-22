<?php 
header('Content-Type: text/html; charset=utf8');
include_once("../connection/connection.php");
include_once ("speciality_class.php");
$connection = new Connection();
$speciality = new specialty;
$handler = $connection->get_connection_handler();
//$result= new specialty;

$result = $speciality->RetriveSpecialities($handler);
echo json_encode($result);

?>