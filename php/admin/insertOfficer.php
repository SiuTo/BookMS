<?php
    require "../verifyUser.php";
    require "../ConnectDB.php";

    $result=mysql_query("SELECT OID FROM OFFICER WHERE OID= '$_POST[oid]'");
    $row = mysql_fetch_array($result);
    if (!empty($row))
    {
        echo "<script>alert('The officer $_POST[oid] exists!');history.go(-1);</script>";
        exit;
    }

    mysql_query("INSERT INTO  OFFICER(OID, PASSWORD, ONAME, OEMAIL) VALUES('$_POST[oid]', '$_POST[oid]', '$_POST[name]', '$_POST[email]')");
    echo '<script>alert("Succeed!");window.location.href="officerAdd.php"</script>';


/* End of file insertOfficer.php */