<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# add a single book

	$isbn=$_POST["isbn"];
	$bookid=$_POST["bookid"];
	$bplace=$_POST["place"];
	$bstate=$_POST["state"];
	$bcanborrow=$_POST["canborrow"];

	echo "<script>alert('Succeed!');window.location.href='addSingleBook.php?isbn=$isbn'</script>";
	
