<?php
	if (empty($_POST["userId"]))
	{
		echo "<script>alert('User Id is required!'); history.go(-1);</script>";
		exit;
	}
	if (empty($_POST["password"]))
	{
		echo "<script>alert('Password is required!'); history.go(-1);</script>";
		exit;
	}
	$userId=$_POST["userId"];
	$password=$_POST["password"];
	$userType=$_POST["userType"];

	require "ConnectDB.php";

	if ($userType=="reader")
		$result=mysql_query("SELECT RID, PASSWORD FROM READER WHERE RID='$userId'");
	else if ($userType=="officer")
		$result=mysql_query("SELECT OID, PASSWORD FROM OFFICER WHERE OID='$userId'");
	else if ($userType=="admin")
		$result=mysql_query("SELECT AID, PASSWORD FROM ADMIN WHERE AID='$userId'");
	else {
		echo "<script>alert('Illegal user type!'); history.go(-1);</script>";
		exit;
	}
	$info=mysql_fetch_array($result);
	
	if ($_POST["submit"]=="signIn")
	{
		if (empty($info))
		{
			echo "<script>alert('User doesn\'t exist!'); history.go(-1);</script>";
			exit;
		}
		if ($info['PASSWORD']!=$password)
		{
			echo "<script>alert('Wrong user ID or password!'); history.go(-1);</script>";
			exit;
		}
		session_start();
		$_SESSION["userId"]=$userId;
		$_SESSION["userType"]=$userType;
		header("Location: $userType/$userType.php");
	}else
	{
		if (!empty($info))
		{
			echo "<script>alert('User exists!'); history.go(-1);</script>";
			exit;
		}
		if ($userType=="reader")
        {
            mysql_query("INSERT INTO READER(RID, PASSWORD, LEVELNAME) VALUES ('$userId', '$password', 'undergraduate')");
            echo "<script>alert('Succeed! Your level now is Undergraduate, please edit your level in the profile page.'); history.go(-1);</script>";
        }
		else if ($userType=="officer")
        {
            mysql_query("INSERT INTO OFFICER(OID, PASSWORD) VALUES ('$userId', '$password')");
            echo "<script>alert('Succeed!'); history.go(-1);</script>";
        }
		else if ($userType=="admin")
        {
            mysql_query("INSERT INTO ADMIN(AID, PASSWORD) VALUES ('$userId', '$password')");
            echo "<script>alert('Succeed!'); history.go(-1);</script>";
        }
	}
?>

