<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# delete the single book and relative borrow info.
	
	$bookid=$_GET["bookid"];

    mysql_query("DELETE FROM SINGLEBOOK WHERE BOOKID ='$bookid'");

	echo "<script>alert('Succeed: Book $bookid has been dropped!');history.go(-1)</script>";

    //window.location.href='officer.php';;

/* end of file dropSingleBook.php */


