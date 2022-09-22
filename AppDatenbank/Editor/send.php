<?php
    include '../../dbc/connection.php';
    $conn = OpenCon();
    $appname = "";
    $des = "";
    $fächer = "";
    $em = "";
    $ver = "";
    if(isset($_GET["name"])){$appname = $_GET["name"];}
    if(isset($_GET["Beschreibung"])){$des = $_GET["Beschreibung"];}
    if(isset($_GET["Fächer"])){$fächer = parse($_GET["Fächer"]);}
    if(isset($_GET["Einsatzmöglichkeiten"])){$em = $_GET["Einsatzmöglichkeiten"];}
    if(isset($_GET["Verfügbarkeit"])){$ver = $_GET["Verfügbarkeit"];}


    $sql = "UPDATE apptable SET ".parseInfo($appname, $des, $fächer, $em, $ver)."WHERE ContentName='".$appname."'";
    if(mysqli_query($conn, $sql)){
        echo"succsess";
    }else{
        echo"WHY? WHY ARE YOU NOT WORKING?!?!";
    }
    echo $fächer;
    setcookie("upd"," ",time()+1,'/');
    header("Location: ../home");

    function parseInfo($appname, $des, $fächer, $em, $ver){
        $out = "ContentName='".$appname."'";
        if($appname==""){
            setcookie("error","Keine App angegeben",time()+1);
            //header("location: ./index.php?name=");
        }
        if($des!=""){
            $out = $out.", Beschreibung='".$des."'";
        }
        if($fächer!=""){
            $out = $out.", Fächer='".$fächer."'";
        }
        if($em!=""){
            $out = $out.", Einsatzmöglichkeiten='".$em."'";
        }
        if($ver!=""){
            $out = $out.", Verfügbarkeit='".$ver."'";
        }
        return $out;
    }

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