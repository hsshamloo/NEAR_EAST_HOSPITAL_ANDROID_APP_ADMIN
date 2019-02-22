<?php 
class Doctors{
Private
	$doctor_Id, 
	$doctor_first, 
	$doctor_last, 
	$doctor_title, 
	$doctor_specialty_id, 
	$doctor_sub_speciality_id,
	$doctor_image_id, 
	$doctor_description;
	
/*	public function __construct($doctor_Id, 
	$doctor_first, 
	$doctor_last, 
	$doctor_title, 
	$doctor_specialty_id, 
	$doctor_sub_speciality_id,
	$docotr_image_id, 
	$doctor_description){
		
		$this->doctor_Id = $doctor_Id;
		$this->doctor_first = $doctor_first;
		$this->doctor_last = $doctor_last;
		$this->doctor_title = $doctor_title;
		$this->doctor_specialty_id = $doctor_specialty_id;
		$this->doctor_sub_speciality_id = $doctor_sub_speciality_id;
		$this->docotr_image_id = $docotr_image_id;
		$this->doctor_description = $doctor_description;
		
	}*/
	
	public function set_doctor_Id ($doctor_Id){
		$this->doctor_Id = $doctor_Id;
	}
	public function get_doctor_Id()
	{
		return $this->doctor_Id;
	}
	
	public function set_doctor_first ($doctor_first){
		$this->doctor_first = $doctor_first;
	}
	public function get_doctor_first()
	{
		return $this->doctor_first;
	}
	
	public function set_doctor_last($doctor_last){
		$this->doctor_last = $doctor_last;
	}
	public function get_doctor_last()
	{
		return $this->doctor_last;
	}
	
	public function set_doctor_title($doctor_title){
		$this->doctor_title = $doctor_title;
	}
	public function get_doctor_title()
	{
		return $this->doctor_title;
	}
	
	public function set_doctor_speciality_id($doctor_speciality_id){
		$this->doctor_specialty_id = $doctor_speciality_id;
	}
	public function get_doctor_speciality_id()
	{
		return $this->doctor_specialty_id;
	}
	
	public function set_doctor_sub_speciality_id($doctor_sub_speciality_id){
		$this->doctor_sub_speciality_id = $doctor_sub_speciality_id;
	}
	public function get_doctor_sub_speciality_id()
	{
		return $this->doctor_sub_speciality_id;
	}
	
	public function set_doctor_image_id($doctor_image_id){
		$this->doctor_image_id = $doctor_image_id;
	}
	public function get_doctor_image_id()
	{
		return $this->doctor_image_id;
	}
	
	public function set_doctor_description($doctor_description){
		$this->doctor_description = $doctor_description;
	}
	public function get_doctor_description()
	{
		return $this->doctor_description;
	}
	
	
	public function RetriveDoctors(PDO $handler)
	{
		$DoctorsClassObject = new Doctors;
		$query = $handler->prepare("Select * from doctor" );
		$Result["doctor"]=array();
		$query->execute();
		
		$Result["doctor"] = $query->fetchAll(PDO::FETCH_ASSOC);
		
		if($Result)
		{
			$Result["success"] = 1 ;
			$Result["message"] = "Data Found";
		}
		else {
			$Result["success"] = 0 ;
			$Result["message"] = "No Data Found" ;
		}
		return($Result);
	}
	
	
	public function RetriveDoctorByID($doctor_Id,PDO $handler )
	{
		$query = $handler->prepare("Select * from doctor where doctor_Id=:doctor_Id");
		$query->execute(array(":doctor_Id"=>$doctor_Id));
		$Result = new Doctors();
		$query->setFetchMode(PDO::FETCH_CLASS,'Doctors');
		$Result = $query->fetch();
		
		return ($Result);
	}
	
	public function RetriveDoctorBySpecialtyId($doctor_speciality_id, PDO $handler)
	{
		$DoctorsClassObject = new Doctors;
		$query = $handler->prepare("SELECT * FROM 'doctor' WHERE 'doctor_specialty_id' = :doctor_speciality_id");
		$Result["doctor"]=array();
		$query->execute(array(":doctor_speciality_id"=>$doctor_speciality_id));
		$Result["doctor"] = $query->fetchAll(PDO::FETCH_ASSOC);
		
		if($Result)
		{
			$Result["success"] = 1 ;
			$Result["message"] = "Data Found";
		}
		else {
			$Result["success"] = 0 ;
			$Result["message"] = "No Data Found" ;
		}
		return($Result);
	}
	
	public function SubmitNewDoctor(Doctors $newDoctor , PDO $handler)
	{
		$doctor_first = $newDoctor->doctor_first;
	$doctor_first = $newDoctor->doctor_first;
	$doctor_last= $newDoctor->doctor_last;
	$doctor_title= $newDoctor->doctor_title;
	$doctor_speciality_id= $newDoctor->doctor_specialty_id;
	$doctor_sub_speciality_id= $newDoctor->doctor_sub_speciality_id;
	$doctor_image_id= $newDoctor->doctor_image_id;
	$doctor_description= $newDoctor->doctor_description;
		
		$result ="";
		//echo '<pre>',print_r($newDoctor),'</pre>';
		
		$sql = "INSERT INTO `neu_hostpital`.`doctor` (`doctor_Id`, `doctor_first`, `doctor_last`, `doctor_title`, `doctor_specialty_id`, `doctor_sub_speciality_id`, `doctor_image_id`, `doctor_description`) VALUES(:doctor_Id,:doctor_first,:doctor_last,:doctor_title,:doctor_specialty_id,:doctor_sub_speciality_id,:doctor_image_id,:doctor_description)";
	
		
		try{
	$query = $handler->prepare($sql);
	$query->bindParam(':doctor_Id',$newDoctor->doctor_Id,PDO::PARAM_INT);
	$query->bindParam(':doctor_first',$doctor_first,PDO::PARAM_STR);
	$query->bindParam(':doctor_last',$doctor_last,PDO::PARAM_STR);
	$query->bindParam(':doctor_title',$doctor_title,PDO::PARAM_STR);
	$query->bindParam(':doctor_specialty_id',$doctor_speciality_id,PDO::PARAM_INT);
	$query->bindParam(':doctor_sub_speciality_id',$doctor_sub_speciality_id,PDO::PARAM_INT);
	$query->bindParam(':doctor_image_id',$doctor_image_id,PDO::PARAM_STR);
	$query->bindParam(':doctor_description',$doctor_description,PDO::PARAM_STR);
	
	//echo '<pre>',print_r($query),'</pre>';
	
	$result = $query->execute();
	
	}
	
		catch(PDOException $e){
			$result = $e->getMessage();
			
			//echo $e->getMessage();
			die();
			}
			return($result);
			
			//print_r($result);
	}
	
	public function UpdateDoctor(Doctors $newDoctor , PDO $handler)
	{
	$doctor_Id = $newDoctor->doctor_Id;
	$doctor_first = $newDoctor->doctor_first;
	$doctor_last= $newDoctor->doctor_last;
	$doctor_title= $newDoctor->doctor_title;
	$doctor_speciality_id= $newDoctor->doctor_specialty_id;
	$doctor_sub_speciality_id= $newDoctor->doctor_sub_speciality_id;
	$doctor_image_id= $newDoctor->doctor_image_id;
	$doctor_description= $newDoctor->doctor_description;
	
	echo($doctor_first);

	
	echo '<pre>',print_r($newDoctor),'</pre>';
		
		$UpdateStatment = "UPDATE `doctor` SET `doctor_first` = :doctor_first,`doctor_last` = :doctor_last,`doctor_title` = :doctor_title,`doctor_specialty_id` = :doctor_speciality_id, `doctor_sub_speciality_id` = :doctor_sub_speciality_id,`doctor_image_id` = :doctor_image_id,`doctor_description` = :doctor_description WHERE `doctor_Id` = :doctor_Id";
		
		
		//$query = $handler->prepare($sql);
	
		$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
	$query = $handler->prepare($UpdateStatment);
	
	
/*	$query->bindParam(':doctor_first',$doctor_first,PDO::PARAM_STR);
	$query->bindParam(':doctor_last',$doctor_last,PDO::PARAM_STR);
	$query->bindParam(':doctor_title',$doctor_title,PDO::PARAM_STR);
	$query->bindParam(':doctor_specialty_id',$doctor_speciality_id,PDO::PARAM_INT);
	$query->bindParam(':doctor_sub_speciality_id',$doctor_sub_speciality_id,PDO::PARAM_INT);
	$query->bindParam(':doctor_image_id',$doctor_image_id,PDO::PARAM_STR);
	$query->bindParam(':doctor_description',$doctor_description,PDO::PARAM_STR);
	$query->bindParam(':doctor_Id',$newDoctor->doctor_Id,PDO::PARAM_INT);
	*/
	
	
	$query->execute(array( ":doctor_Id" => $doctor_Id, 
	 ":doctor_first" => $doctor_first ,
	  ":doctor_last" => $doctor_last ,
	   ":doctor_title" => $doctor_title ,
	    ":doctor_speciality_id" => $doctor_speciality_id,
		 ":doctor_sub_speciality_id" => $doctor_sub_speciality_id,
		  ":doctor_image_id" => $doctor_image_id,
		  ":doctor_description" => $doctor_description
		 ));
		 $result = $query->rowCount();
	echo '<br><br>', $result;
	}
	
		catch(PDOException $e){
			echo $e->getMessage();
			die();
			}
	
	return($result);
			
	
	}
	
	public function RetriveDoctorID(PDO $handler)
	{
		//$DoctorsClassObject = new Doctors;
		$query = $handler->prepare("SELECT `doctor_Id`, `doctor_first`, `doctor_last` FROM `doctor` order by doctor_first ,doctor_last  DESC " );
		$Result=array();
		$query->execute();
		
		$Result = $query->fetchAll(PDO::FETCH_ASSOC);
		
		
		return($Result);
	}
	
	
	
}
?>