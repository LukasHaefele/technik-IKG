<?php
    include '../../dbc/connection.php';
    $conn = OpenCon();

    $appname = $_GET["name"];
    $des = $_GET["Beschreibung"];
    $fächer = parse($_GET["Fächer"]);
    $em = $_GET["Einsatzmöglichkeiten"];
    $ver = $_GET["Verfügbarkeit"];


    $sql = "INSERT INTO apptable (ContentName, Location, Beschreibung, Fächer, Einsatzmöglichkeiten, Verfügbarkeit) VALUES 
    ('".$appname."', 'withheld', '".$des."', '".$fächer."', '".$em."', '".$ver."')";
    if(mysqli_query($conn, $sql)){
        echo"succsess";
    }else{
        echo"WHY? WHY ARE YOU NOT WORKING?!?!";
    }
    echo $fächer;
    setcookie("set"," ",time()+1,'/');
    header("Location: ../home");

    function parse($arr){
        $ret;
        for($i = 0; $i<sizeof($arr); $i++){
            if($i == 0){
                $ret = $arr[$i];
            }else{
                $ret = $ret.", ".$arr[$i];
            }
        }
        return $ret;
    }
?>