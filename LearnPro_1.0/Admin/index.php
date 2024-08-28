<?php
session_start();
$user=$_SESSION["user"];
$password=$_SESSION["password"];
if($user==null && $password==null){
	header('Location:../close/close.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Learn Pro</title>
	<link rel="stylesheet" href="../styles/styles.css">
	<link rel="icon" href="../images/iconWhite.png">
</head>

<body>

	<a href="../close/close.php" class="button">Close</a>
	<center>
		<h1>Learn Pro</h1>
		<img src="../images/iconBlack.png" alt="" width="200px">

		
		<br>

		<a href="./NewAdmin.php" class="button">Create admins</a>
		<a href="./AcademicTraining.php" class="button">Academic training</a>
		<br>
		<br>
		<br>
		<!--a href="" class="Donate">Donate</a-->
	</center>
</body>

</html>