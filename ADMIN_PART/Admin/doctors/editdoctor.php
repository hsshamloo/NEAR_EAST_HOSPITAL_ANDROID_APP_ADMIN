<!doctype html>
<html>
<head>
<?php 

include_once("../connection/connection.php");
include_once("../specialities/speciality_class.php");
include_once("doctor_class.php");


$ConnectionObject = new Connection;
$SpecialityObject = new specialty();

$DoctorToEdit = new Doctors;

$DoctorToEdit->set_doctor_first("");
$DoctorToEdit->set_doctor_last("");
$DoctorToEdit->set_doctor_Id("");
$DoctorToEdit->set_doctor_image_id("");
$DoctorToEdit->set_doctor_speciality_id("");
$DoctorToEdit->set_doctor_sub_speciality_id("");
$DoctorToEdit->set_doctor_title("");
$DoctorToEdit->set_doctor_description("");


$SpecialityObject =  $SpecialityObject->RetriveSpecialitiesClass($ConnectionObject->get_connection_handler());

?>


<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$DoctorToEdit = $DoctorToEdit->RetriveDoctorByID($_POST['doctorId'],$ConnectionObject->get_connection_handler());

if(is_null($DoctorToEdit)){

$DoctorToEdit->set_doctor_first("");
$DoctorToEdit->set_doctor_last("");
$DoctorToEdit->set_doctor_Id("");
$DoctorToEdit->set_doctor_image_id("");
$DoctorToEdit->set_doctor_speciality_id("");
$DoctorToEdit->set_doctor_sub_speciality_id("");
$DoctorToEdit->set_doctor_title("");
$DoctorToEdit->set_doctor_description("");
}
}
?>


<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../../CSS/style.css">
<title>Submit New Doctor</title>
</head>

<body>
<img src="../../Image/NEUhospital.jpg" width="301" height="83" alt=""/>
<form class="form-container" enctype="multipart/form-data" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="form-title">Doctor Name</div>
<select class="form-field" name="doctorId" >

<?php
$doctorObject = $DoctorToEdit->RetriveDoctorID($ConnectionObject->get_connection_handler());
foreach ($doctorObject as $row) 
{
	echo "<option value='";
	echo $row["doctor_Id"];
	echo "'>";
	echo $row["doctor_first"];
	echo " "; 
	echo $row["doctor_last"];
	echo "</option>";
	
}
 ?>
</select>

<input class="submit-button" type="submit" value="Search" name="submit"/>
</form>



<form class="form-container" enctype="multipart/form-data" method="post" action="editdeletedoctorprocess.php">
<div class="form-title"><h2>Information Of Doctor</h2></div>
<div class="form-title">First Name</div>
<input class="form-field" type="text" name="doctor_first" value="<?php echo $DoctorToEdit->get_doctor_first() ?>" /><br />
  <div class="form-title">Last Name</div>
<input class="form-field" type="text" name="doctor_last" value="<?php echo $DoctorToEdit->get_doctor_last() ?>" /><br />
 <div class="form-title">Title</div>
<input class="form-field" type="text" name="doctor_title" value="<?php echo $DoctorToEdit->get_doctor_title() ?>" /><br />

<div class="form-title">Specialty</div>
<select class="form-field" name="doctor_speciality_id" >



<?php
$id = $DoctorToEdit->get_doctor_speciality_id();
$handler = $ConnectionObject->get_connection_handler();
$specialityobj= new specialty();
$specialityId= $specialityobj->RetriveSpecialityByID($id,$handler);
echo "<option selected='selected' value='";
echo $DoctorToEdit->get_doctor_speciality_id();
echo "'>";
echo $specialityId;
echo "</option>";
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
<img src="doctorimages/<?php echo $DoctorToEdit->get_doctor_image_id() ?>" width="144" height="144" alt=""/>
<input type="file" name="doctor_image"  >

</br>
<div class="form-title">Description</div>
<textarea class="form-field"  name="doctor_description" ><?php echo $DoctorToEdit->get_doctor_description() ?> </textarea>
<input class="submit-button" type="submit" value="submit" name="submit"/>
</div>
<input type="hidden" name="doctor_Id" value="<?php echo $DoctorToEdit->get_doctor_Id()?>" >
<input type="hidden" name= "doctor_Image" value="<?php echo $DoctorToEdit->get_doctor_image_id() ?>">
</form>

</body>
</html>