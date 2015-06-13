<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# Return book. Don't need to redirect and only echo the message in format "***: ****!".

    $rid=$_POST["rid"];
	$bookid=$_POST["bookid"];

    mysql_query("UPDATE SINGLEBOOK SET BSTATE = 0 WHERE BOOKID = '$bookid'");
    mysql_query("UPDATE BORROWINFO SET ISRETURN = 1, RETURNTIME = CURRENT_DATE
                                   WHERE BOOKID = '$bookid' AND RID = '$rid' AND ISRETURN = 0 ");


	echo "Succeed: Book $bookid returned!";

