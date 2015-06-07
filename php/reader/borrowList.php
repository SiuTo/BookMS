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
					<h1>Book Management System</h1>
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
								<li role="presentation"><a role="menuitem" href="borrowList.php">Borrow List</a></li>
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
			<div class="col-sm-10 col-sm-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Borrow List</h3>
					</div>

					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th><th>Book Name</th><th>Author</th><th>Press</th><th>Year</th><th>Place</th><th>Index</th><th>Borrow Time</th><th>Return Time</th><th>Is Return</th>
								</tr>
							</thead>
							<tbody>
								<?php
									require "../ConnectDB.php";
									$rid=$_SESSION["userId"];
									$result=mysql_query("SELECT BANME, BAUTHOR, BPRESS, BYEAR, BPLACE, BINDEX, BORROWTIME, RETURNTIEM, ISRETURN FROM BORROWINFO, SINGLEBOOK, BOOKINFO WHERE RID='$rid' AND BORROWINFO.BOOKID=SINGLEBOOK.BOOKID AND SINGLEBOOK.ISBN=BOOKINFO.ISBN");
									$num=0;
									while ($row=mysql_fetch_array($result))
									{
										++$num;
										echo "<tr><td>$num</td><td>$row[BNAME]</td><td>$row[BAUTHOR]</td><td>$row[BPRESS]</td><td>$row[BYEAR]</td><td>$row[BPLACE]</td><td>$row[BINDEX]</td><td>$row[BORROWTIME]</td><td>$row[RETURNTIME]</td><td>$row[ISRETURN]</td></tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

