<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# add a book

	$isbn=$_POST["isbn"];
	$bname=$_POST["name"];
	$bauthor=$_POST["author"];
	$bpress=$_POST["press"];
	$byear=$_POST["year"];
	$bindex=$_POST["index"];

    $result=mysql_query("SELECT ISBN FROM BOOKINFO WHERE ISBN ='$isbn'");
    $row = mysql_fetch_array( $result );

    if ( !empty($row) )
    {
        echo '<script>alert("The book which isbn is '.$isbn.' already exists!");window.location.href="addBook.php"</script>';
        exit;
    }
    else if ( $bindex == "" )
    {
        echo '<script>alert("The book index can not be null");window.location.href="addBook.php"</script>';
    }
    else
    {
        mysql_query("INSERT INTO  BOOKINFO(ISBN, BNAME, BAUTHOR, BPRESS, BYEAR, BINDEX)
                            VALUES('$isbn', '$bname', '$bauthor', '$bpress', '$byear', '$bindex')");

        echo '<script>alert("Succeed!");window.location.href="addBook.php"</script>';
    }

/* end of file insertBook.php */
	
