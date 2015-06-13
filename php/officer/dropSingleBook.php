<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# delete the single book and relative borrow info.
	
	$bookid=$_GET["bookid"];

    mysql_query("DELETE FROM BORROWINFO WHERE BID = '$bid'");
    mysql_query("DELETE FROM SINGLEBOOK WHERE BID ='$bid'");

	echo "<script>alert('Succeed: Book $bookid has been dropped!');window.location.href='officer.php';</script>";

/* end of file dropSingleBook.php */


