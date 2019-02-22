<?php 
header('Content-Type: text/html; charset=utf8');
include_once("../connection/connection.php");
 include_once ("news_class.php");
 
$connection = new Connection();
$news = new news;
$handler = $connection->get_connection_handler();
//$result= new specialty;

$result = $news->RetriveNews($handler);
echo json_encode($result);


$resultClass = $news->RetriveNewsByID(2,$handler);
echo '<br><br>', $resultClass->get_news_text();

?>