<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# delete the book, relative single book info and borrow info.
	
	$isbn=$_POST["isbn"];

	mysql_query("DELETE FROM BORROWINFO WHERE ISBN = '$isbn'");
	mysql_query("DELETE FROM BOOKINFO  WHERE ISBN ='$isbn'");
	mysql_query("DELETE FROM SINGLEBOOK WHERE ISBN ='$isbn'");


	echo "Succeed: Book $isbn has been dropped!";

/* end of file dropBook.php */