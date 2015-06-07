<?php
	require "../verifyUser.php";
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Book Management System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../plugins/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../../css/index.css" />
	<script type="text/javascript" src="../../plugins/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="../../plugins/bootstrap/js/bootstrap.js"></script>
</head>

<body>
	<div class="page-head">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1><a href="admin.php">Book Management System</a></h1>
				</div>
				<div class="col-sm-4">
					<div class="page-head-right">
						<div class="dropdown">
							<a id="dLabel" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
								<?php echo $_SESSION["userId"]; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<li role="presentation"><a role="menuitem" href="profile.php">Profile</a></li>
								<li role="presentation"><a role="menuitem" href="../signout.php">Sign out</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container container-body">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Level List</h3>
					</div>

					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th><th>Level Name</th><th>Borrow Number</th><th>Period</th><th>Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php
									require "../ConnectDB.php";
									$result=mysql_query("SELECT LEVELNAME, BORROWNUM, PERIOD FROM USERLEVEL");
									$num=0;
									while ($row=mysql_fetch_array($result))
									{
										++$num;
										echo "<tr><td>$num</td><td>$row[LEVELNAME]</td><td><input id='borrownum$num' class='form-control' type='number' value='$row[BORROWNUM]'></input></td><td><input id='period$num' class='form-control' type='number' value='$row[PERIOD]'></input></td><td><button type='button' class='btn btn-default' onclick='modifyLevel(\"$row[LEVELNAME]\", $(\"#borrownum$num\").val(), $(\"#period$num\").val())'>Edit</button></td></tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../../js/admin.js"></script>
</body>

</html>

