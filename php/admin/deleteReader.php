<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";
	
	$rid=$_POST["rid"];
	mysql_query("DELETE FROM BORROWINFO WHERE RID='$rid'");
	mysql_query("DELETE FROM READER WHERE RID='$rid'");

