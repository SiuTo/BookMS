<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# modify info of the single book

	$bookid=$_POST["bookid"];
	$bplace=$_POST["place"];
	$bstate=$_POST["state"];
	$bcanborrow=$_POST["canborrow"];

    $result=mysql_query("SELECT BOOKID FROM SINGLEBOOK WHERE BOOKID ='$bookid'");
    $row = mysql_fetch_array( $result );

    if (empty($row))
    {
        echo '<script>alert("The book id '.$isbn.' doesn\'t exist!");history.go(-1);"</script>';
        exit;
    }
    else
    {
        mysql_query("UPDATE SINGLEBOOK SET BPLACE = '$bplace', BSTATE = '$bstate', BCANBORROW = '$bcanborrow'
                                      WHERE BOOKID = '$bookid'");

        echo "<script>alert('Succeed!');window.location.href='editSingleBook.php?bookid=$bookid';</script>";
    }

/* end of file modifySingleBook.php */
