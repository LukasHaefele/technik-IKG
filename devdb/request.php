<html>
    <head>
        <title>Gerätanfrage</title>
        <link rel="stylesheet" href="./style/style.css">
    </head>
    <body>
        <h1>Gerätanfrage</h1>
        <div id="home">
            <form method="POST" action="index.php">
                <button type="submit">Home</button>
            </form>
        </div>
        <?php
            if(isset($_GET["krz"])){
                request();
            }

            function request(){
                mail("ioq9sb2pny+8qf5g+qve0i@in.meistertask.com", "Gerätanfrage", "Lehrkraft ".$_GET["krz"]." möchte '".$_GET["name"]."' anfragen.");
                header("Location: index.php?search=".$_GET["search"]);
            }
        ?>
        <form id="req">
            Lehrer: <input type="text" name="krz" hint="Ihr Kürzel"><br><br>
            Möchte folgendes Gerät anfragen: <input type="text" name="name" value=<?php echo("'".$_GET["name"]."'"); ?>><br><br>
            <input type="submit" value="Anfragen">
        </form>
    </body>
</html>