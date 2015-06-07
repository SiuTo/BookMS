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
					<h1><a href="reader.php">Book Management System</a></h1>
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
		<div id="alertModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body"></div>
				</div>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Search List</h3>
			</div>

			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th><th>Book Name</th><th>Author</th><th>Press</th><th>Year</th><th>Index</th><th>ISBN</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require "../ConnectDB.php";
							$rid=$_SESSION["userId"];
							$bname=$_POST["bname"];
							$result=mysql_query("SELECT BNAME, BAUTHOR, BPRESS, BYEAR, BINDEX, ISBN FROM BOOKINFO WHERE BNAME LIKE '%$bname%'");
							$num=0;
							while ($row=mysql_fetch_array($result))
							{
								++$num;
								echo "<tr><td>$num</td><td><a href='#' onclick='loadList(\"$row[ISBN]\")'>$row[BNAME]</a></td><td>$row[BAUTHOR]</td><td>$row[BPRESS]</td><td>$row[BYEAR]</td><td>$row[BINDEX]</td><td>$row[ISBN]</td></tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../../js/reader.js"></script>
</body>

</html>

