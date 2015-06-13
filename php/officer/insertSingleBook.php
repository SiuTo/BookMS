<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# add a single book

	$isbn=$_POST["isbn"];
	$bookid=$_POST["bookid"];
	$bplace=$_POST["place"];
	$bstate=$_POST["state"];
	$bcanborrow=$_POST["canborrow"];

    $result=mysql_query("SELECT BOOKID FROM SINGLEBOOK WHERE BOOKID ='$bookid'");
    $row = mysql_fetch_array( $result );

    if ( !empty($row) )
    {
        echo '<script>alert("The book which book id is '.$bookid.' already exists!");window.location.href="addSingleBook.php?isbn='.$isbn.'"</script>';
        exit;
    }
    else
    {
        mysql_query("INSERT INTO SINGLEBOOK(ISBN, BOOKID, BPLACE, BSTATE, BCANBORROW )
                                VALUES('$isbn', '$bookid', '$bplace', '$bstate', '$bcanborrow' )");

        $result=mysql_query("SELECT ISBN FROM BOOKINFO WHERE ISBN ='$isbn'");
        $row = mysql_fetch_array( $result );

        if( empty($row) ) // This book doesn't exist in the bookinfo
        {
            echo '<script>alert("Succeed! But the book info which isbn is '.$isbn.' doesn\'t exists. Please Add the book info.")
                 window.location.href="addBook.php"</script>';
        }

        echo '<script>alert("Succeed!");window.location.href="addSingleBook.php?isbn='.$isbn.'"</script>';
    }

/* end of file insertSingleBook.php */


	
