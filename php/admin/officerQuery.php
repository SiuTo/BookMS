<?php
    require "../verifyUser.php";
    require "../ConnectDB.php";

    $oid=$_POST["oid"];
    
    $result=mysql_query("SELECT ONAME FROM OFFICER WHERE oid='$oid'");
    $row=mysql_fetch_array($result);
    if (empty($row))
    {
        echo '<script>alert("The officer '.$oid.' doesn\'t exist!");</script>';
        exit;
    }
    echo "<div class='row'><h4 class='col-sm-6'>Officer: $oid $row[ONAME]</h4>";
    echo "<div class='col-sm-offset-1 col-sm-2'><a class='btn btn-primary' href='../officer/profile.php?oid=$oid'>Edit</a></div>";
    echo "<div class='col-sm-2'><button class='btn btn-danger' onclick='deleteOfficer()'>Delete</button></div></div>";
    
