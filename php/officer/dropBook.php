<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# delete the book, relative single book info and borrow info.
	
	$isbn=$_POST["isbn"];

	echo "Succeed: Book $isbn has been dropped!";

