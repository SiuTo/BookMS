<?php
	require "../verifyUser.php";
	require "../ConnectDB.php";

	$result=mysql_query("SELECT RID FROM READER WHERE RID='$_POST[rid]'");
    $row = mysql_fetch_array($result);
    if (!empty($row))
	{
		echo "<script>alert('The reader $_POST[rid] exists!');history.go(-1);</script>";
		exit;
	}
	
	mysql_query("INSERT INTO READER(RID, PASSWORD, RNAME, LEVELNAME, REMAIL) VALUES('$_POST[rid]', '$_POST[rid]', '$_POST[name]', '$_POST[level]', '$_POST[email]')");
	echo '<script>alert("Succeed!");window.location.href="readerAdd.php"</script>';

