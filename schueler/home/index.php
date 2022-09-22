<!-- Das ist ein Kommentar -->
<html>
    <title>Anfrage Online Unterricht</title>
    <head>
        <h1>Meldung</h1>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="../../stylesheet.css">
    </head>
    <body>
        <?php
            if(isset($_GET["twentyfour"])){
                echo("<p class='text'>Es darf nur eine Anfrage pro Tag abgesendet werden</p>");
            }
            if(isset($_GET["succ"])){
                echo("<p class ='text'>Die Anfrage wurde erfolgreich abgeschickt</p>");
            } else
            if(isset($_GET["fail"])){
                echo("<p class ='text'>Bitte alle Felder ausfüllen</p>");
            }
        ?>
        <form action="../send" method="get">
            <p class="text">Plattform: 
                <select name="room">
                    <option value="Moodle">Moodle</option>
                    <option value="Sdui">Sdui</option>
                    <option value="other">Andere</option>
                </select>
            </p>
            <p class="text">Kurzbeschreibung des Problems: </p>
            <p class="area"><textarea name="des" rows="5" cols="50"></textarea></p>
            <p class="text">Name des Betroffenen Accounts: <input name="name" type="text" placeholder="Name..."></p>
            <p class="text">e-Mail auf die der Account registriert ist: <input name="mail" type="text" placeholder="Mail..."></p>
            <p class="text">Kontaktmöglichkeit für Rückfragen: <input name="res" type="text" placeholder="Email/Telefon o.ä..."></p> 
            <p class="button"><input type="submit" value="Meldung senden"></p>
        </form>
        <iframe src='../../ttable/'>Ihr Browser unterstützt keine iframes. Sie können die eingebettete Seite <a href="../ttable/">hier</a> finden.</iframe>
    </body>
</html>