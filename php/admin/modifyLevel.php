<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";
	
	$levelName=$_POST["levelName"];
	$borrowNum=$_POST["borrowNum"];
	$period=$_POST["period"];

	mysql_query("UPDATE USERLEVEL SET BORROWNUM='$borrowNum', PERIOD='$period' WHERE LEVELNAME='$levelName'");

