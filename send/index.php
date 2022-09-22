<html>
    <title>Technik Meldung IKG-RT</title>
    <head>
        <h1>
            Gesendetes Problem:
        </h1>
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="../stylesheet.css">
    </head>
    <body>
        <?php 
            include '../var.php';
            $raum = $_GET["raum"];
            $des = $_GET["des"];
            $lkf = $_GET["lkf"];
            $dev = $_GET["dev"];
            if($dev !="Moodle" && $dev != "Sdui" && $dev != "Andere Software" && $dev != "iPad"){
                if($raum==""||$des==""||$lkf==""||$dev=="default"){
                    setcookie("trial","1",time()+1,"/");
                    header("location:../meldung/?raum=".urlencode($raum)."&des=".urlencode($des)."&lkf=".urlencode($lkf)."&dev=".urlencode($dev));
                }else{  
                    echo("<p class='text'>Raum: ".$raum."<br> Gerät: ".$dev."<br>Kurzbeschreibung des Problems: <br>".$_GET["des"]."<br>Lehrkraft die meldet: ".$_GET["lkf"]."</p>");
                    $subj=$raum." ".$lkf;
                    $timestamp=time();
                        $datum = date("d.m.Y - H:i",$timestamp);
                    $bod="Raum: ".$raum."\r\nGerät: ".$dev."\r\nKurzbeschreibung des Problems:\r\n".$des."\r\nMeldende Lehrkraft: ".$lkf."\r\n".$datum;
                    //echo($bod);
                    mail($sendmail,$subj,$bod);
                }
            }else{
                if($des ==""||$lkf ==""){
                    setcookie("trial","1",time()+1,"/");
                    header("location:../meldung/?raum=".urlencode($raum)."&des=".urlencode($des)."&lkf=".urlencode($lkf)."&dev=".urlencode($dev));
                }else{
                    echo("<p class='text'>Software: ".$dev."<br>Kurzbeschreibung des Problems: <br>".$_GET["des"]."<br>Lehrkraft die meldet: ".$_GET["lkf"]."</p>");
                    $subj=$dev." ".$lkf;
                    $timestamp=time();
                    $datum = date("d.m.Y - H:i",$timestamp);
                    $bod="Kurzbeschreibung des Problems: \r\n".$des."\r\n".$datum;
                    mail($sendmail,$subj,$bod);
                }
            }
        ?>
    </body>
</html>