<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../../CSS/style.css">
<title>Submit News</title>
</head>
<img src="../../Image/NEUhospital.jpg" width="301" height="83" alt=""/>
<form class="form-container" enctype="multipart/form-data" method="post" action="submit_news_process.php">
 <div class="form-title"><h2>Submit News</h2></div>
<div class="form-title">News Title</div>
<input class="form-field" type="text" name="News_Title" required /><br />
<div class="form-title">News Description</div>
<textarea class="form-field" type="text" name="News_Description" required></textarea>

<div class="submit-container">
<input class="submit-button" type="submit" value="Submit" name="Submit"/>
</div>
</form>
<body>
</body>
</html>