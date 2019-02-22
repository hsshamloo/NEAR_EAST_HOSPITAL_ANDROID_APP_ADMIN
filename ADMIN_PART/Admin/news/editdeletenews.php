<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../../CSS/style.css">
<title>Edit News</title>

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

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	
$newsIdFormPost = $_POST['NewsID'];
$Result = $newsToEdit->RetriveNewsByID($newsIdFormPost,$handler);

if(is_null($Result)){

$NewsTitle = "";
$NewsText = "";
$NewsId = "";
}

else {
$NewsTitle = $Result->get_news_title();
$NewsText = $Result->get_news_text();
$NewsId = $Result->get_news_id();
	
}

}
?>

<form class="form-container" enctype="multipart/form-data" method="post" action="submit_news_process.php">
<div class="form-title"><h2>Information Of News</h2></div>
<div class="form-title">News Title</div>
<input class="form-field" type="text" name="News_Title" value="<?php echo $NewsTitle ?>" />
  
</br>
<div class="form-title">Description</div>
<textarea class="form-field"  name="News_Description"><?php echo $NewsText?> </textarea>
<input class="submit-button" type="submit" value="Edit" name="Edit"/>
<input class="submit-button" type="submit" value="Delete" name="Delete"/>
</div>
<input type="hidden" name="News_Id" value="<?php echo $NewsId?>" >

</form>

</body>
</html>