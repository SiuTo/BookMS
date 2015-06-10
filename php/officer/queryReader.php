<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$rid=$_POST["rid"];

	$result=mysql_query("SELECT BNAME, BAUTHOR, SINGLEBOOK.BOOKID, ISRETURN FROM BORROWINFO, SINGLEBOOK, BOOKINFO WHERE RID='$rid' AND BORROWINFO.BOOKID=SINGLEBOOK.BOOKID AND SINGLEBOOK.ISBN=BOOKINFO.ISBN");
	echo '<table class="table table-striped">';
	echo '<thead><tr><th>#</th><th>Book Name</th><th>Author</th><th>Book ID</th><th>Is return</th></tr></thead><tbody>';
	$num=0;
	while ($row=mysql_fetch_array($result))
	{
		++$num;
		echo "<tr><td>$num</td><td>$row[BNAME]</td><td>$row[BAUTHOR]</td><td>$row[BOOKID]</td><td>$row[ISRETURN]</td></tr>";
	}
	echo '</tbody></table>';
?>

