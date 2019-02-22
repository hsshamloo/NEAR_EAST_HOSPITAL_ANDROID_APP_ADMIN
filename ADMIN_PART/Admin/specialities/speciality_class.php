<?php 
class specialty{
public
	$specialty_id, 
	$specialty_title, 
	$specialty_description; 
	
	
/*	public function __construct($specialty_id, 
	$specialty_title, 
	$specialty_description){
		
		$this->specialty_id = $specialty_id;
		$this->specialty_title = $specialty_title;
		$this->specialty_description = $specialty_description;
		
	}*/
	
	public function set_specialty_id ($specialty_id){
		$this->specialty_id = $specialty_id;
	}
	public function get_specialty_id()
	{
		return $this->specialty_id;
	}
	
	public function set_specialty_title ($specialty_title){
		$this->specialty_title = $specialty_title;
	}
	public function get_specialty_title()
	{
		return $this->specialty_title;
	}
	
	public function set_specialty_description($specialty_description){
		$this->specialty_description = $specialty_description;
	}
	public function get_specialty_description()
	{
		return $this->specialty_description;
	}
	
	
	public function RetriveSpecialities(PDO $handler)
	{
		//$DoctorsClassObject = new Doctors;
		$query = $handler->prepare("Select * from specialty" );
		$Result["specialty"]=array();
		$query->execute();
		
		$Result["specialty"] = $query->fetchAll(PDO::FETCH_ASSOC);
		
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
	public function RetriveSpecialitiesClass(PDO $handler)
	{
		$SpecialityObject = new specialty;
		$query = $handler->prepare("Select * from specialty" );
		//$Result["specialty"]=array();
		$query->execute();
		$query->setFetchMode(PDO::FETCH_CLASS,'specialty');
		$SpecialityObject = $query->fetchAll();
		return($SpecialityObject);
	}
	
	
	public function RetriveSpecialitiesArray(PDO $handler)
	{
		//$SpecialityObject = new specialty;
		$query = $handler->prepare("Select * from specialty" );
		//$Result["specialty"]=array();
		$query->execute();
		$query->setFetchMode();
		$Reuslt = $query->fetchAll();
		return($Reuslt);
	}
	
	
	public function RetriveSpecialityByID($specialty_id,PDO $handler )
	{
		$query = $handler->prepare("Select specialty_title from specialty where specialty_id=:specialty_id");
		$Result = array();
		
		$query->execute(array(":specialty_id"=>$specialty_id));
		
		$Result = $query->fetchColumn();
		
		return ($Result);
	}
	
	public function RetriveSpecialityIDByName($specialty_title,PDO $handler )
	{
		$specialtyObj = new specialty;
		
		$query = $handler->prepare("Select * from specialty where specialty_title = :specialty_title");
		$Result["specialty"]=array();
		$query->execute(array(":specialty_title"=>$specialty_title));
		$query->setFetchMode(PDO::FETCH_CLASS,'specialty');
		$specialtyObj = $query->fetch();
		return($specialtyObj->specialty_id);
	}
	
	public function SubmitNewSpeciality(specialty $newSpeciality , PDO $handler)
	{
		$specialtyId = $newSpeciality->get_specialty_id();
		$specialityTitle = $newSpeciality->get_specialty_title();
		$specialityDescription = $newSpeciality->get_specialty_description();
		
		$result ="";
		echo '<pre>',print_r($newSpeciality),'</pre>';
		
		$sql = "INSERT INTO .`specialty` (`specialty_id`, `specialty_title`, `specialty_description`) VALUES (:specialty_id,:specialty_title,:specialty_description);";
	
		
		try{
	$query = $handler->prepare($sql);
	$query->bindParam(':specialty_id',$specialtyId,PDO::PARAM_INT);
	$query->bindParam(':specialty_title',$specialityTitle,PDO::PARAM_STR);
	$query->bindParam(':specialty_description',$specialityDescription,PDO::PARAM_STR);
	
	//echo '<pre>',print_r($query),'</pre>';
	
	$result = $query->execute();
	
	}
	
		catch(PDOException $e){
			$result = $e->getMessage();
			
			 $e->getMessage();
			die();
			}
			return($result);
			
			//print_r($result);
	}
	
	
	public function deleteSpeciality ($specialty_id, PDO $handler){
	$query = $handler->prepare("DELETE FROM `specialty` WHERE `specialty_id` = :specialty_id" );
	
	$result = $query->execute( array( ":specialty_id" => $specialty_id));
	return $result;
	
}
	
	
}
?>