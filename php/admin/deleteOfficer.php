<?php
    require "../verifyUser.php";
    require "../ConnectDB.php";

    $oid=$_POST["oid"];
    mysql_query("DELETE FROM OFFICER WHERE OID='$oid'");

/* end of file deleteOfficer.php */


