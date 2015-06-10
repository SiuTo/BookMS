<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# modify info of the book

	$isbn=$_POST["isbn"];
	$bname=$_POST["name"];
	$bauthor=$_POST["author"];
	$bpress=$_POST["press"];
	$byear=$_POST["year"];
	$bindex=$_POST["index"];

	echo '<script>alert("Succeed!");window.location.href="editBook.php"</script>';
	
