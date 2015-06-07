<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$isbn=$_POST["isbn"];

	$result=mysql_query("SELECT BNAME, BSTATE, BPLACE, BINDEX FROM SINGLEBOOK, BOOKINFO WHERE SINGLEBOOK.ISBN='$isbn' AND BOOKINFO.ISBN='$isbn'");
	echo "<table class='table table-striped'>";
	echo "<thead><tr><th>#</th><th>Book Name</th><th>State</th><th>Place</th><th>Index</th></tr></thead><tbody>";
	$num=0;
	while ($row=mysql_fetch_array($result))
	{
		++$num;
		echo "<tr><td>$num</td><td>$row[BNAME]</td><td>$row[BSTATE]</td><td>$row[BPLACE]</td><td>$row[BINDEX]</td></tr>";
	}
	echo '</tbody></table>';
?>

