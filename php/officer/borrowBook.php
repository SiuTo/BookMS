<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

    function mysql_query_one($sql)
    {
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        return $row[0];
    }

	$rid=$_POST["rid"];
	$bookid=$_POST["bookid"];

    $result = mysql_query("SELECT BSTATE, BCANBORROW FROM SINGLEBOOK WHERE BOOKID = '$bookid'");
    $row = mysql_fetch_array($result);
    if (empty($row))
    {
        echo "Fail: Book $bookid doesn't exist!";
        exit;
    }

    $bstat = $row["BSTATE"];
    if ($bstat == -1)
    {
        echo "Fail: Book $bookid is on purchasing.";
        exit;
    }
    else if ($bstat == 1)
    {
        echo "Fail: Book $bookid is out on loan.";
        exit;
    }
    else if ($bstat == 2)
    {
        echo "Fail: Book $bookid is reserved by others.";
        exit;
    }

    $bcanborrow = $row["BCANBORROW"];
    if ($bcanborrow == 0)
    {
        echo "Fail: Book $bookid is closed reserved.";
        exit;
    }

    $BORROWED = mysql_query_one("SELECT COUNT(BORROWID) FROM BORROWINFO WHERE RID = '$rid' AND ISRETURN = 0 ");
    $LEVEL = mysql_query_one("SELECT LEVELNAME FROM READER WHERE RID = '$rid'");
    $CANBORROW = mysql_query_one("SELECT BORROWNUM FROM USERLEVEL WHERE LEVELNAME = '$LEVEL'");

    if ($BORROWED >= $CANBORROW)
    {
        echo "Fail: The reader can not borrow more books. $BORROWED: $CANBORROW";
        exit;
    }

    //$CURDATE = mysql_query("SELECT CURDATE()");


    $BORROWID = mysql_query_one("SELECT BORROWID FROM BORROWINFO WHERE RID = '$rid' ORDER BY BORROWID DESC");
    $BORROWID = $BORROWID + 1;

    $BTIME = mysql_query_one("SELECT PERIOD FROM USERLEVEL WHERE LEVELNAME = (SELECT LEVELNAME FROM READER WHERE RID = '$rid' )");
    mysql_query("INSERT INTO BORROWINFO VALUES ( '$BORROWID', '$rid', '$bookid', CURRENT_DATE, DATE_ADD(CURRENT_DATE,INTERVAL $BTIME DAY), 0 )");

    mysql_query("UPDATE SINGLEBOOK SET BSTATE = 1 WHERE BOOKID = '$bookid'");

	echo "Succeed: Book $bookid borrowed!";


/* End of file officer.php */

