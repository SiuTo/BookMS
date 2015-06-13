<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# modify info of the single book

	$bookid=$_POST["bookid"];
	$bplace=$_POST["place"];
	$bstate=$_POST["state"];
	$bcanborrow=$_POST["canborrow"];

    $result=mysql_query("SELECT BID FROM SINGLEBOOK WHERE BID ='$bid'");
    $row = mysql_fetch_array( $result );

    if (empty($row))
    {
        echo '<script>alert("The book id '.$isbn.' doesn\'t exist!");window.location.href="editBook.php?isbn="</script>';
        exit;
    }
    else
    {
        mysql_query("UPDATE SINGLEBOOK SET BPLACE = '$bplace', BSTATE = '$bstate', BCANBORROW = '$bcanborrow'
                                      WHERE BID = '$bookid'");

        echo "<script>alert('Succeed!');window.location.href='editSingleBook.php?bookid=$bookid'</script>";
    }

/* end of file modifySingleBook.php */