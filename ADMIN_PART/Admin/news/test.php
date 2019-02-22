<!doctype html>
<html>

<head>

<meta charset="utf-8">
<title>Untitled Document</title>

<?php 

include_once("../connection/connection.php");
include ("news_class.php");


$ConnectionObject = new Connection();
$handler= $ConnectionObject->get_connection_handler();
$newsToEdit = new news;

$NewsTitle = "";
$NewsText = "";
$NewsId = "";

?>
</head>



<body>
<img src="../../Image/NEUhospital.jpg" width="301" height="83" alt=""/>
<form class="form-container" enctype="multipart/form-data" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="form-title">News Title</div>
<select class="form-field" name="NewsID" >
<?php

$newsRetriveData = new news();

$newsRetriveData = $newsRetriveData->RetriveNewsArray($handler);
foreach ($newsRetriveData as $row) 
{
	echo "<option value='";
	echo $row["news_id"];
	echo "'>";
	echo $row["news_title"];
	echo "</option>";
	
}
 ?>
</select>

<input class="submit-button" type="submit" value="Search" name="submit"/>
</form>



<?php

$resultClass = $newsToEdit->RetriveNewsByID(2,$handler);
echo '<br><br>', $resultClass->get_news_text();
 ?>
</body>
</html>