<?php
    include '../dbc/connection.php';
    $con = OpenCon();
    $sql = "UPDATE devicetable SET Room = '".$_GET["Room"]."' WHERE Id = ".$_GET["id"];
    $con->query($sql);
    header("Location: index.php?search=".$_GET["search"]);
?>