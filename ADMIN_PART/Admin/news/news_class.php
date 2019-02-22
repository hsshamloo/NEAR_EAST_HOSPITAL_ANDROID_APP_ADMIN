<?php 
class news{
public
	$news_id, 
	$news_date, 
	$news_title,
	$news_text;
	 
	
	
/*	public function __construct($news_id, 
	$news_title, 
	$news_text){
		
		$this->news_id = $news_id;
		$this->news_title = $news_title;
		$this->news_text = $news_text;
		
	}*/
	
	public function set_news_id ($news_id){
		$this->news_id = $news_id;
	}
	public function get_news_id()
	{
		return $this->news_id;
	}
	
	public function set_news_date ($news_date){
		$this->news_date = $news_date;
	}
	public function get_news_date()
	{
		return $this->news_date;
	}
	
	public function set_news_title ($news_title){
		$this->news_title = $news_title;
	}
	public function get_news_title()
	{
		return $this->news_title;
	}
	
	public function set_news_text($news_text){
		$this->news_text = $news_text;
	}
	public function get_news_text()
	{
		return $this->news_text;
	}
	
	
	public function RetriveNews(PDO $handler)
	{
		//$DoctorsClassObject = new Doctors;
		$query = $handler->prepare("Select * from news" );
		$Result["news"]=array();
		$query->execute();
		
		$Result["news"] = $query->fetchAll(PDO::FETCH_ASSOC);
		
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
	public function RetriveNewsClass(PDO $handler)
	{
		$NewsObject = new news;
		$query = $handler->prepare("Select * from news" );
		//$Result["news"]=array();
		$query->execute();
		$query->setFetchMode(PDO::FETCH_CLASS,'news');
		$NewsObject = $query->fetchAll();
		return($NewsObject);
	}
	
	
	public function RetriveNewsArray(PDO $handler)
	{
		//$SpecialityObject = new news;
		$query = $handler->prepare("Select * from news" );
		//$Result["news"]=array();
		$query->execute();
		$query->setFetchMode();
		$Reuslt = $query->fetchAll();
		return($Reuslt);
	}
	
	
	public function RetriveNewsByID($news_id,PDO $handler )
	{
		$query = $handler->prepare("Select * from news where news_id=:news_id");
		$Result =  new news();
		
		$query->execute(array(":news_id"=>$news_id));
		
		
		 $query->setFetchMode(PDO::FETCH_CLASS,'news');
		
		$Result = $query->fetch();
		
		return ($Result);
	}
	
	public function RetriveNewsIDByTitle($news_title,PDO $handler )
	{
		$newsObj = new news;
		
		$query = $handler->prepare("Select * from news where news_title = :news_title");
		$Result["news"]=array();
		$query->execute(array(":news_title"=>$news_title));
		$query->setFetchMode(PDO::FETCH_CLASS,'news');
		$newsObj = $query->fetch();
		return($newsObj->news_id);
	}
	
	public function SubmitNewNews(news $newNews , PDO $handler)
	{
		$newsId = $newNews->get_news_id();
		$newsDate = $newNews->get_news_date();
		$newsTitle = $newNews->get_news_title();
		$newsText = $newNews->get_news_text();
		
		$result ="";
		echo '<pre>',print_r($newNews),'</pre>';
		
		$sql = "INSERT INTO `news` (`news_id`,`news_date`,`news_title`, `news_text`) VALUES (:news_id,:news_date,:news_title,:news_text);";
	
		
		try{
	$query = $handler->prepare($sql);
	$query->bindParam(':news_id',$newsId,PDO::PARAM_INT);
	$query->bindParam(':news_date',$newsDate,PDO::PARAM_STR);
	$query->bindParam(':news_title',$newsTitle,PDO::PARAM_STR);
	$query->bindParam(':news_text',$newsText,PDO::PARAM_STR);
	
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
	
	
	public function deleteNews ($news_id, PDO $handler){
	$query = $handler->prepare("DELETE FROM `news` WHERE `news_id` = :news_id" );
	
	$result = $query->execute( array( ":news_id" => $news_id));
	return $result;
	
}

public function updateNews(news $newsObject , PDO $handler)
{
	$newsId= $newsObject->get_news_id();
	$newsTitle = $newsObject->get_news_title();
	$newsText = $newsObject->get_news_text();
	
	$query = $handler->prepare("UPDATE `news` SET `news_title` =:news_title , `news_text` = :news_text  WHERE `news_id`= :new_id");
	
	$query->bindParam(":news_title",$newsTitle);
	$query->bindParam(":news_text",$newsText);
	$query->bindParam(":new_id",$newsId);
	
	$result= $query->execute();
	
	/*$result = $query->execute( array( 
	":news_id" => $newsId,
	":news_title"=>$newsTitle, 
	":news_text"=>$newsText));*/
	
	return $result;
	
}
	
	
}
?>