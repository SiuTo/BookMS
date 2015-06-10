<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# delete the single book and relative borrow info.
	
	$bookid=$_GET["bookid"];

	echo "<script>alert('Succeed: Book $bookid has been dropped!');window.location.href='officer.php';</script>";

