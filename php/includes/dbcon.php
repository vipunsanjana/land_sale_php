<?php
    $server = "localhost";
    $dbUname = "root";
    $dbPassword = "";
    $dbName = "landsale";

    $con = new mysqli($server, $dbUname, $dbPassword, $dbName);

    if($con->connect_error)
    {
        die("connection to database failed:". $con->connect_error);
    }
?>
