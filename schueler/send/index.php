<?php
    $des = $_GET["des"];
    $name = $_GET["name"];
    $res = $_GET["res"];
    $mail = $_GET["mail"];
    $room = $_GET["room"];
    if(isset($_COOKIE["twentyfour"])){
        header("location:../home?twentyfour=true");
    }else if($des == ""||$name == ""||$res == ""||$mail == ""){
        header("location:../home?fail=true");
    }else{
        $timestamp=time();
        $datum = date("d.m.Y - H:i",$timestamp);
        $subj = $name." ".$datum;
        $bod = "Plattform: ".$room."\r\nDetails:\r\n".$des."\r\nAccount Email: ".$mail."\r\nRückmeldung über: ".$res;
        //echo($subj."<br>".$bod);
        if($room == "Moodle"){
            mail("ioq9sb2pny+d1rp0+qve0i@in.meistertask.com",$subj,$bod);
            //echo("sent to moodle");
        }else if($room == "Sdui"){
            mail("ioq9sb2pny+d1rp4+qve0i@in.meistertask.com",$subj,$bod);
            //echo("sent to Sdui");
        }else{
            mail("ioq9sb2pny+d1eqn+qve0i@in.meistertask.com",$subj,$bod);
            //echo("sent to schueler");
        }
        setcookie("twentyfour","1",time()+86400);
        header("location:../home?succ=true");
    }
    
?>