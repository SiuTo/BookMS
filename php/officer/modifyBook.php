<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	# modify info of the book

	$isbn=$_POST["isbn"];
	$bname=$_POST["name"];
	$bauthor=$_POST["author"];
	$bpress=$_POST["press"];
	$byear=$_POST["year"];
	$bindex=$_POST["index"];

    $result=mysql_query("SELECT ISBN FROM BOOKINFO WHERE ISBN ='$isbn'");
    $row = mysql_fetch_array( $result );

    if (empty($row))
    {
        echo '<script>alert("The isbn '.$isbn.' doesn\'t exist!");window.location.href="editBook.php?isbn="</script>';
        exit;
    }
    else if ( $bindex == "" )
    {
        echo '<script>alert("The book index can not be null");window.location.href="editBook.php?isbn='.$isbn.'"</script>';
    }
    else
    {

        mysql_query("UPDATE BOOKINFO SET BNAME='$bname', BAUTHOR = '$bauthor', BPRESS = '$bpress',
                        BYEAR = '$byear', BINDEX = '$bindex' WHERE ISBN ='$isbn'");

        echo '<script>alert("Succeed!");window.location.href="editBook.php?isbn="</script>';
    }

/* end of file of modifyBool.php */
