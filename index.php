<?php
	session_start();
	if (isset($_SESSION["userId"]))
	{
		header("Location: php/$_SESSION[userType]/$_SESSION[userType].php");
		exit;
	}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Book Management System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<script type="text/javascript" src="plugins/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="page-head">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1>Book Management System</h1>
				</div>
				<div class="col-sm-4">
					<div class="page-head-right"><a href="Report/Report.pdf">About</a></div>
				</div>
			</div>
		</div>
	</div>

	<div class="page-body">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<p class="slogan">Powerful, flexible, stable</p>
				</div>
				<div class="col-sm-4">
					<form action="php/login.php" method="post" class="form-horizontal">
						<div class="form-group">
							<label for="userId" class="col-sm-3 control-label">User Id</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="userId" id="userId">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-3 control-label">Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="password" id="password">
							</div>
						</div>
						<div class="form-group">
							<label for="userType" class="col-sm-3 control-label">User type</label>
							<div class="col-sm-8">
								<select class="form-control" name="userType">
									<option value="reader">Reader</option>
									<option value="worker">Worker</option>
									<option value="admin">Administrator</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-3">
								<button type="submit" name="submit" value="signIn" class="btn btn-default">Sign in</button>
							</div>
							<div class="col-sm-offset-1 col-sm-3">
								<button type="submit" name="submit" value="signUp" class="btn btn-default">Sign up</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

