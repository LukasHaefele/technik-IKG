<html>
    <title>IKG-Reutlingen Wartungswebsite</title>
    <head><h1>Wartungsanfragen IKG-Reutlingen</h1>
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="../stylesheet.css">
    </head>
    <body>
        <form action="../meldung/">
            <p class="text">Bitte Passwort eingeben: 
            <input name="password" type="password" placeholder="Passwort..."></p>   
            <p class="button"><input type="submit"></p>
        </form>
        <?php
            if(isset($_COOKIE["fail"])){
                echo("<p class='text'>Passwort falsch eingegeben</p>");
            }
        ?>
     <p class='text'>Schüler/innen können <a href="../schueler/home">hier Fehler melden.</a></p>
        <iframe src='../ttable/'>Ihr Browser unterstützt keine iframes. Sie können die eingebettete Seite <a href="../ttable/">hier</a> finden.</iframe>
    </body>
    
</html>
