<?php
    function OpenCon(){
        include '../var.php';

        $con = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connection failed: %s\n". $con -> error);

        return $con;
    }
    function CloseCon($con){
        $con -> close();
    }

?>