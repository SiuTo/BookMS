<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$rid=$_POST["rid"];

	$result=mysql_query("SELECT RNAME FROM READER WHERE RID='$rid'");
	$row=mysql_fetch_array($result);
	if (empty($row))
	{
		echo '<script>alert("The reader '.$rid.' doesn\'t exist!");</script>';
		exit;
	}
	echo "<div class='row'><h4 class='col-sm-6'>Reader: $rid $row[RNAME]</h4></div>";

	$result=mysql_query("SELECT BNAME, BAUTHOR, SINGLEBOOK.BOOKID, BORROWTIME, RETURNTIME FROM BORROWINFO, SINGLEBOOK, BOOKINFO WHERE RID='$rid' AND BORROWINFO.BOOKID=SINGLEBOOK.BOOKID AND SINGLEBOOK.ISBN=BOOKINFO.ISBN AND ISRETURN=0");
	echo '<table class="table table-striped">';
	echo '<thead><tr><th>#</th><th>Book Name</th><th>Author</th><th>Book ID</th><th>Borrow Time</th><th>Time to Return</th></tr></thead><tbody>';
	$num=0;
	while ($row=mysql_fetch_array($result))
	{
		++$num;
		echo "<tr><td>$num</td><td>$row[BNAME]</td><td>$row[BAUTHOR]</td><td>$row[BOOKID]</td><td>$row[BORROWTIME]</td><td>$row[RETURNTIME]</td></tr>";
	}
	echo '</tbody></table>';
?>

