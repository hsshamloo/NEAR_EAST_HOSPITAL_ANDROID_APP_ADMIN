<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit / Delete Speciality</title>
<link rel="stylesheet" type="text/css" href="../../CSS/style.css">
<?php 
include_once("../connection/connection.php");
include_once("speciality_class.php");


$newSpeciality = new specialty();
$connection = new Connection();

$handler = $connection->get_connection_handler();

?>

</head>

<body>
<img src="../../Image/NEUhospital.jpg" width="301" height="83" alt=""/>
<form class="form-container" enctype="multipart/form-data" method="post" action="submit_speciality_process.php">
  <div class="form-title"><h2>Delete Speciality</h2></div>
<div class="form-title">Speciality Title</div>
<select class="form-field" name="specialty_id" >

<?php

$result = new specialty();

$result = $newSpeciality->RetriveSpecialitiesArray($handler);

foreach ($result as $row)
{
	echo "<option value='";
	echo $row['specialty_id'];
	echo "'>";
	echo $row['specialty_title'];
	echo "</option>";
}

 ?>
</select>
<div class="submit-container">
<input class="submit-button" type="submit" value="Submit" name="Delete"/>
</div>
</form>

<?php 



?>

</body>
</html>
