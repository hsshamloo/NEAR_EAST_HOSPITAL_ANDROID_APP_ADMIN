<!doctype html>
<html>
<head>
<meta charset="utf-8" http-equiv="refresh" content="150;url=../index.php">

<title>Untitled Document</title>
<?php 
include_once("../connection/connection.php");
 include_once("news_class.php");


$newNews = new news();
$connection = new Connection();

$handler = $connection->get_connection_handler();

?>

</head>


<body>

<?php 
if(isset($_POST['Submit']))
{
	$newNews->set_news_title($_POST['News_Title']);
	$newNews->set_news_text($_POST['News_Description']);
	$newNews->set_news_date(date("Y-m-d H:i:s"));
	
	echo '<pre>',print_r($newNews),'</pre>';
	
	$result = $newNews->SubmitNewNews($newNews,$handler);
	if($result){
	echo("<script>alert('News has been submited')</script>");
	}
}


if(isset($_POST['Delete']))
{
	$newsId = $_POST['News_Id'];
	
	echo '<pre>',print_r($newsId),'</pre>';
	
	$result = $newNews->deleteNews($newsId,$handler);
	if($result){
	echo("<script>alert('News has been Deleted')</script>");
	}
}


if(isset($_POST['Edit']))
{
	$newNews->set_news_title($_POST['News_Title']);
	$newNews->set_news_text($_POST['News_Description']);
	$newNews->set_news_id($_POST['News_Id']);
	
	echo '<pre>',print_r($newNews),'</pre>';
	
	$result = $newNews->updateNews($newNews,$handler);
	if($result){
	echo("<script>alert('News has been Updated')</script>");
	}
}
?>









</body>
</html>