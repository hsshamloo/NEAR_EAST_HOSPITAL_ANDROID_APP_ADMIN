<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<img src="../Image/NEUhospital.jpg" width="301" height="83" alt=""/>
<form class="form-container" enctype="multipart/form-data" method="post" action="Admin/login/checkLogin.php">
  <div class="form-title"><h2>Admin Area</h2></div>

<input class="link-button" name="submit" type="url" value="Submit Speciality" onclick="location.href='specialities/submit_speciality.php'">
<br>

<input class="link-button" name="submit" type="url" value="Edit / Delete Speciality" onclick="location.href='specialities/editdeleteSpecialityprocess.php'"><br>

<input class="link-button" name="submit" type="url" value="Sumit Doctor" onclick="location.href='doctors/submitdoctor.php'"><br>

<input class="link-button" name="submit" type="url" value="Edit / Delete Doctor" onclick="location.href='doctors/editdoctor.php'"><br>



<input class="link-button" name="submit" type="url" value="Submit News" onclick="location.href='news/submit_news.php'"><br>

<input class="link-button" name="submit" type="url" value="Edit / Delete News" onclick="location.href='news/editdeletenews.php'"><br>

<input class="link-button" name="submit" type="url" value="Exit" onclick="location.href='../index.php'">
</form>
<body>
</body>
</html>