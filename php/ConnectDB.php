<?php
	$connect=mysql_connect("localhost", "DB", "qwerty");
	if (!$connect) die("Could not connect: ". mysql_error());
	mysql_select_db("BookMS", $connect);
	mysql_query("set names 'utf8'");
?>

