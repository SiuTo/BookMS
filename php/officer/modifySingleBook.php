<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# modify info of the single book

	$bookid=$_POST["bookid"];
	$bplace=$_POST["place"];
	$bstate=$_POST["state"];
	$bcanborrow=$_POST["canborrow"];

	echo "<script>alert('Succeed!');window.location.href='editSingleBook.php?bookid=$bookid'</script>";
	
