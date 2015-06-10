<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$isbn=$_POST["isbn"];

	$result=mysql_query("SELECT BOOKID, BPLACE, BSTATE, BCANBORROW FROM SINGLEBOOK WHERE SINGLEBOOK.ISBN='$isbn' ");
	echo "<table class='table table-striped'>";
	echo "<thead><tr><th>#</th><th>Book ID</th><th>State</th><th>Place</th><th>Can Borrow</th><th></th></tr></thead><tbody>";
	$num=0;
	while ($row=mysql_fetch_array($result))
	{
		++$num;
		echo "<tr><td>$num</td><td><a href='editSingleBook.php?bookid=$row[BOOKID]'>$row[BOOKID]</a></td><td>$row[BSTATE]</td><td>$row[BPLACE]</td><td>$row[BCANBORROW]</td><td><a href='dropSingleBook.php?bookid=$row[BOOKID]'>Drop</a></td></tr>";
	}
	echo '</tbody></table>';
	echo "<a type='button' class='btn btn-primary' href='addSingleBook.php?isbn=$isbn'>Add Single</a>";
?>

