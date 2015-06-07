<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$rid=$_SESSION["userId"];
	$bookid=$_GET["bookid"];

	echo '<script>alert("Succeed!");window.location.href="reader.php";</script>';
?>

