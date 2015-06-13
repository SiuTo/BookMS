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
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Personal Profile</h3>
                </div>

                <?php
                require "../ConnectDB.php";
                if ($_SESSION["userType"]=="admin") $rid=$_GET["rid"]; else $rid=$_SESSION["userId"];
                $result=mysql_query("SELECT OID, PASSWORD, ONAME, OEMAIL FROM OFFICER WHERE OID='$rid'");
                $row=mysql_fetch_array($result);
                ?>

                <div class="panel-body">
                    <form method="post" action="modify.php" class="form-horizontal">
                        <div class="form-group">
                            <label for="rid" class="col-sm-3 control-label">OFFICER ID</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="rid" id="rid" value="<?php echo $row["OID"];?>" readonly>
                            </div>
                        </div>
                        <?php if ($_SESSION["userType"]=="officer") echo '
							<div class="form-group">
								<label for="oldPwd" class="col-sm-3 control-label">Old Password</label>
								<div class="col-sm-7">
									<input type="password" class="form-control" name="oldPwd" id="oldPwd" required="required">
								</div>
							</div>
							<div class="form-group">
								<label for="newPwd" class="col-sm-3 control-label">New Password</label>
								<div class="col-sm-7">
									<input type="password" class="form-control" name="newPwd" id="newPwd">
								</div>
							</div>
							<div class="form-group">
								<label for="newPwdRep" class="col-sm-3 control-label">Repeat New Password</label>
								<div class="col-sm-7">
									<input type="password" class="form-control" name="newPwdRep" id="newPwdRep">
								</div>
							</div>
							';?>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["ONAME"];?>" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row["OEMAIL"];?>" required="required">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default col-sm-offset-3 col-sm-2">Submit</button>
                        <button type="button" onclick="window.location.href='<?php if ($_SESSION["userType"]=="admin") echo '../admin/officer.php'; else echo 'officer.php';?>'" class="btn btn-default col-sm-offset-2 col-sm-2">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>

