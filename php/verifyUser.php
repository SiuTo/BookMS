<?php
	session_start();
	if (!isset($_SESSION["userId"]))
	{
		echo '<script>alert("Login first please!");window.location.href="../../index.php";</script>';
		exit;
	}
?>

