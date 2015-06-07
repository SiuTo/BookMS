<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$rid=$_SESSION["userId"];
	$bookid=$_GET["bookid"];


    $result = mysql_query("SELECT BSTATE, BCANBORROW FROM SINGLEBOOK WHERE BID = $bookid");
    $row = mqsql_fetch_array($result);
    if (empty($row))
    {
        echo "Fail: Book $bookid doesn't exist!";
        exit;
    }

    $bstat = $row["BSTATE"];
    if (bstat == -1)
    {
        echo "Fail: Book $bookid is on purchasing";
        exit;
    }
    else if (bstat == 1)
    {
        echo "Fail: Book $bookid is out on loan";
        exit;
    }
    else if (bstat == 2)
    {
        echo "Fail: Book $bookid is reserved by others.";
        exit;
    }

    $bcanborrow = $row["BCANBORROW"];
    if (bcanborrow == 0)
    {
        echo "Fail: Book $bookid is closed reserved";
        exit;
    }

    $BORROWED = mysql_query("SELECT SUM(BORROWID) FROM BORROWINFO WHERE RID = $rid");
    $LEVEL = mysql_query("SELECT LEVELNAME FROM READER WHERE RID = $rid");
    $CANBORROW = mysql_query("SELECT BORROWNUM FROM USERLEVEL WHERE LEVELNAME = $LEVEL");

    if ($BORROWED == $CANBORROW)
    {
        echo "Fail: You have already borrowed $BORROED books. You can not borrow more books.";
        exit;
    }

    $BORROWID = mysql_query("SELECT BORROWID FROM BORROWINFO ORDER BY BOOKID DESC LIMIT 1) FROM BORROWINFO WHERE RID = $rid");
    $BORROWID = $BORROWID + 1;
    mysql_query("INSERT INTO BORROWINFO VALUES('$BORROWID', '$rid', '$courseId', '', '', ''");

    mysql_query("UPDATE SINGLEBOOK SET BSTATE =2 WHERE BOOKID = $bookid");

	echo '<script>alert("Succeed!");window.location.href="reader.php";</script>';

?>

