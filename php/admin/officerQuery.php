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
    echo "<div class='col-sm-offset-1 col-sm-2'><a class='btn btn-primary' href='..//profile.php?oid=$oid'>Edit</a></div>";
    echo "<div class='col-sm-2'><button class='btn btn-danger' onclick='deleteOfficer()'>Delete</button></div></div>";
    
    /*echo '<table class="table table-striped"><thead><tr><td>#</td><td>Book Name</td><td>Author</td><td>Index</td><td>Book Id</td></tr></thead><tbody>';
    $result=mysql_query("SELECT BNAME, BAUTHOR, BINDEX, BORROWINFO.BOOKID FROM BORROWINFO, SINGLEBOOK, BOOKINFO WHERE oid='$oid' AND BORROWINFO.BOOKID=SINGLEBOOK.BOOKID AND SINGLEBOOK.ISBN=BOOKINFO.ISBN");
    $num=0;
    while ($row=mysql_fetch_array($result))
    {
        ++$num;
        echo "<tr><td>$num</td><td>$row[BNAME]</td><td>$row[BAUTHOR]</td><td>$row[BINDEX]</td><td>$row[BOOKID]</td></tr>";
    }
    echo '</tbody></table>';
    */
    
    /*echo '<form class="form-inline">
            <div class="form-group">
                <label for="bookid">Book Id</label>
                <input type="text" class="form-control" id="bookid">
            </div>
            <button type="button" onclick="addOfficerBook()" class="btn btn-default">Add</button>
            <button type="button" onclick="dropOfficerBook()" class="btn btn-default">Drop</button>
          </form>';
    */

/* End of file officerQuery.php */