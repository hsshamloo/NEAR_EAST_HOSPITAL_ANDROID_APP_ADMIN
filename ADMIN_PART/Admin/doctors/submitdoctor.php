<!doctype html>
<html>
<head>
<?php include_once("../connection/connection.php");
include_once("../specialities/speciality_class.php");
$ConnectionObject = new Connection;
$SpecialityObject = new specialty(); 
$SpecialityObject =  $SpecialityObject->RetriveSpecialitiesClass($ConnectionObject->get_connection_handler());

?>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../../CSS/style.css">
<title>Submit New Doctor</title>'
</head>

<body>


<img src="../../Image/NEUhospital.jpg" width="301" height="83" alt=""/>
<form class="form-container" enctype="multipart/form-data" method="post" action="submit_doctor_process.php">
  <div class="form-title"><h2>Sumit New Doctor</h2></div>
  <div class="form-title">First Name</div>
<input class="form-field" type="text" name="doctor_first" /><br />
  <div class="form-title">Last Name</div>
<input class="form-field" type="text" name="doctor_last" /><br />
 <div class="form-title">Title</div>
<input class="form-field" type="text" name="doctor_title" /><br />

<div class="form-title">Specialty</div>
<select class="form-field" name="doctor_speciality_id" >
<?php
foreach ($SpecialityObject as $row) 
{
	echo "<option value='";
	echo $row->get_specialty_id();
	echo "'>";
	echo $row->get_specialty_title();
	echo "</option>";
	
}
 ?>
</select>

<div class="form-title">Image</div>
<input type="file" name="doctor_image">
</br>
<div class="form-title">Description</div>
<textarea class="form-field"  name="doctor_description"> </textarea>
<input class="submit-button" type="submit" value="submit" name="submit"/>
</div>
</form>
</body>
</html>