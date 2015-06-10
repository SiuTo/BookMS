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
					<h1><a href="officer.php">Book Management System</a></h1>
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
		<div role="tabpanel">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#reader" aria-controls="reader" role="tab" data-toggle="tab">Reader Management</a></li>
				<li role="presentation"><a href="#book" aria-controls="book" role="tab" data-toggle="tab">Book Management</a></li>
			</ul>

			<div class="tab-content container-body">
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

				<div role="tabpanel" class="tab-pane active" id="reader">
					<div class="row">
						<div class="col-sm-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Operation panel</h3>
								</div>
								<div class="panel-body">
									<form class="operation-list">
										<div class="form-group">
											<label for="rid" class="control-label">Reader Id</label>
											<input type="text" id="rid" class="form-control">
										</div>
										<button type="button" class="btn btn-default" id="queryReader">Query Reader</button>
										<div class="form-group">
											<label for="bookid" class="control-label">Book Id</label>
											<input type="text" id="bookid" class="form-control">
										</div>
										<button type="button" class="btn btn-default" id="borrowBook">Borrow Book</button>
										<button type="button" class="btn btn-default" id="returnBook">Return Book</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">List of Books</h3>
								</div>
								<div id="showResultPanel-reader" class="panel-body">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div role="tabpanel" class="tab-pane" id="book">
					<div class="row">
						<div class="col-sm-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Operation panel</h3>
								</div>
								<div class="panel-body">
									<form class="operation-list">
										<div class="form-group">
											<label for="isbn" class="control-label">ISBN</label>
											<input type="text" id="isbn" class="form-control">
										</div>
										<button type="button" class="btn btn-default" id="queryBook">Query Book</button>
										<button type="button" class="btn btn-default" id="editBook">Edit Book</button>
										<a type="button" class="btn btn-default" href="addBook.php">Add Book</a>
										<button type="button" class="btn btn-default" id="dropBook">Drop Book</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">List of single books</h3>
								</div>
								<div id="showResultPanel-book" class="panel-body">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../../js/officer.js"></script>
</body>

</html>

