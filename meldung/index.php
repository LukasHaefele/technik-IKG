<html>
    <title>Technik Meldung IKG-RT</title>
    <head>
        <h1>Meldung</h1>
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="../stylesheet.css">
    </head>
    <body>
        <?php
            include '../var.php';
            if(!isset($_COOKIE["trial"])){
                if($_GET["password"]!=$thPass){
                    setcookie("fail","1",time()+1,"/");
                    header("location:../home");
                }
            }    
        ?>
        <form action="../send" method="get">
            <p class="text">Raum: <input name="raum" type="text"<?php if (isset($_GET['raum'])) {echo("value='".$_GET['raum']."'");}?>></p>
            <p class="text">Gerät/Software: 
                <select name="dev">
                    <option value="default">bitte wählen</option>
                    <option value="Dokukam">Dokukam</option>
                    <option value="Digitale Tafel">Digitale Tafel</option>
                    <option value="PC oder Pult">PC oder Pult</option>
                    <option value="Moodle">Moodle</option>
                    <option value="Sdui">Sdui</option>
                    <option value="Andere Software">Andere Software</option>
                    <option value="iPad">iPad</option>
                    <option value="Unabhängig">Nicht gelistet</option>
                </select></p>
            <p class="text">Kurzbeschreibung des Problems:</p> 
            <p class="area"><textarea name="des" rows="5" cols="40"><?php if (isset($_GET['des'])) {echo($_GET['des']);}?></textarea></p>
            <p class="text">Mein Name für Rückfragen: <input name="lkf" type="text" placeholder="Name..." <?php if (isset($_GET['lkf'])) {echo("value='".$_GET['lkf']."'");}?>></p>
            <!--<p class="text">(optional) Bild hinzufügen: <input type="file" name="bild" ></input></p>-->
            <p class="button"><input type="submit" value="Problem melden"></p>
        </form>
        <iframe src='../ttable/'>Ihr Browser unterstützt keine iframes. Sie können die eingebettete Seite <a href="../ttable/">hier</a> finden.</iframe>
        <?php
            if(isset($_COOKIE["trial"])){
                echo("<p class='text'>Bitte alle relevanten Felder ausfüllen</p>");
            }
        ?>
    </body>
</html>