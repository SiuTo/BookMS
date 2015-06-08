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
                    <h3 class="panel-title">Add Officer</h3>
                </div>

                <div class="panel-body">
                    <form method="post" action="insertOfficer.php" class="form-horizontal">
                        <div class="form-group">
                            <label for="oid" class="col-sm-3 control-label">Officer ID</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="oid" id="oid" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" id="name" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="email" name="email" required="required">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default col-sm-offset-3 col-sm-2">Submit</button>
                        <button type="button" onclick="window.location.href='officer.php'" class="btn btn-default col-sm-offset-2 col-sm-2">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>