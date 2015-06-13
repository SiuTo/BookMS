<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# Return book. Don't need to redirect and only echo the message in format "***: ****!".

    $rid=$_POST["rid"];
	$bookid=$_POST["bookid"];

    $result=mysql_query("SELECT BOOKID, ISRETURN FROM BORROWINFO WHERE BOOKID ='$bookid' AND RID = '$rid' AND ISRETURN = 0");
    $row = mysql_fetch_array( $result );

    if (empty($row))
    {
        echo "Failed: The book which book id is  $bookid  doesn't exist in this reader's borrow list or has already been returned !";
        exit;
    }
    else
    {
        mysql_query("UPDATE SINGLEBOOK SET BSTATE = 0 WHERE BOOKID = '$bookid'");
        mysql_query("UPDATE BORROWINFO SET ISRETURN = 1, RETURNTIME = CURRENT_DATE
                                   WHERE BOOKID = '$bookid' AND RID = '$rid' AND ISRETURN = 0 ");

        echo "Succeed: Book $bookid returned!";
    }


