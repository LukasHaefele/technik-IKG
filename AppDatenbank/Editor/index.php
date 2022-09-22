<!DOCTYPE html>
<html>
    <head>
        <title>App Editor</title>
        <link rel="stylesheet" href="../style/style.css">
        <h1>App Editor</h1>
    </head>
    <body>
        <form id="addap" action="./send.php">
            <link rel="stylesheet" href="../style/style.css">
            <p id="inputfield">
                App Name: <input type="text" name="name" value=<?php echo("'".$_GET["name"]."'") ?>>
            </p>
            <p id="inputfield">
                Beschreibung: 
                <input type="textfield" name="Beschreibung">
            </p>
            <p id="inputfield">
                Fächer: <br><select name="Fächer[]" multiple>
                    <option value="Biologie">Biologie</option>
                    <option value="Chemie">Chemie</option>
                    <option value="Deutsch">Deutsch</option>
                    <option value="Englisch">Englisch</option>
                    <option value="Französisch">Französisch</option>
                    <option value="Informatik">Informatik</option>
                    <option value="Italienisch">Italienisch</option>
                    <option value="Latein">Latein</option>
                    <option value="Mathematik">Mathematik</option>
                    <option value="Musik">Musik</option>
                    <option value="NwT">NwT</option>
                    <option value="Physik">Physik</option>
                    <option value="Sport">Sport</option>
                    <option value="Wirtschaft">Wirtschaft</option>
                </select><br>
                (strg oder command halten um mehrere Fächer auszuwählen)
            </p>
            <p id="inputfield">
                Einsatzmöglichkeiten: <input type="text" name="Einsatzmöglichkeiten">
            </p>
            <p id="inputfield">
                Verfügbarkeit: <select name="Verfügbarkeit">
                    <option value="Self-service">Self-service</option>
                    <option value="vorinstalliert">Vorinstalliert</option>
                    <option value="nicht löschbar">Nicht löschbar</option>
                </select>
            </p>
            <input type="submit" value="Überschreiben">
            <?php
                if(isset($_COOKIE["error"])){
                    echo("Die App wurde nicht bearbeitet, da: ".$_COOKIE["error"]);
                }
            ?>

        </form>
    </body>
</html>