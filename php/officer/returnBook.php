<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# Return book. Don't need to redirect and only echo the message in format "***: ****!".

    $rid=$_POST["rid"];
	$bookid=$_POST["bookid"];

	echo "Succeed: Book $bookid returned!";

