<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

    function mysql_query_one($sql)
    {
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        return $row[0];
    }

	$rid=$_SESSION["userId"];
	$bookid=$_GET["bookid"];

    $result = mysql_query("SELECT BSTATE, BCANBORROW FROM SINGLEBOOK WHERE BOOKID = '$bookid'");
    $row = mysql_fetch_array($result);
    if (empty($row))
    {
        echo "<script>alert('Fail: Book $bookid doesn\'t exist!');window.location.href='reader.php';</script>";
        exit;
    }

    $bstat = $row["BSTATE"];
    if ($bstat == -1)
    {
        echo "<script>alert('Fail: Book $bookid is on purchasing.');window.location.href='reader.php';</script>";
        exit;
    }
    else if ($bstat == 1)
    {
        echo "<script>alert('Fail: Book $bookid is out on loan.');window.location.href='reader.php';</script>";
        exit;
    }
    else if ($bstat == 2)
    {
        echo "<script>alert('Fail: Book $bookid is reserved by others.');window.location.href='reader.php';</script>";
        exit;
    }

    $bcanborrow = $row["BCANBORROW"];
    if ($bcanborrow == 0)
    {
        echo "<script>alert('Fail: Book $bookid is closed reserved.');window.location.href='reader.php';</script>";
        exit;
    }

    $BORROWED = mysql_query_one("SELECT SUM(BORROWID) FROM BORROWINFO WHERE RID = '$rid'");
    $LEVEL = mysql_query_one("SELECT LEVELNAME FROM READER WHERE RID = '$rid'");
    $CANBORROW = mysql_query_one("SELECT BORROWNUM FROM USERLEVEL WHERE LEVELNAME = '$LEVEL'");

    if ($BORROWED == $CANBORROW)
    {
        echo "<script>alert('Fail: You have already borrowed $BORROED books. You can not borrow more books.');window.location.href='reader.php';</script>";
        exit;
    }

    //$CURDATE = mysql_query("SELECT CURDATE()");


    $BORROWID = mysql_query_one("SELECT BORROWID FROM BORROWINFO WHERE RID = '$rid' ORDER BY BORROWID DESC");
    $BORROWID = $BORROWID + 1;

    mysql_query("INSERT INTO BORROWINFO VALUES ( '$BORROWID', '$rid', '$bookid', '', '', '' )");

    mysql_query("UPDATE SINGLEBOOK SET BSTATE =2 WHERE BOOKID = '$bookid'");

	echo '<script>alert("Succeed!");window.location.href="reader.php";</script>';

?>

