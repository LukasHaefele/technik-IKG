<!DOCTYPE html>
<html>

<head>
    <title>ADB-IKG</title>
    <link rel="stylesheet" href="../style/style.css">
    <h1>App Datenbank Isolde-Kurz Gymnasium Reutlingen</h1>
</head>
<body>    
    <!--<p id="tl"><a href="../Editor">Bearbeiten</a></p>-->

    <form id="search" action="../res">
        <p id="inputfield">Suche App nach
        <select name="search">
            <option value="ContentName">Name</option>
            <option value="Beschreibung">Beschreibung</option>
            <option value="Fächer">Fachbereich</option>
            <option value="Einsatzmöglichkeiten">Einsatzmöglichkeit</option>
            <option value="Verfügbarkeit">Verfügbarkeit</option>
        </select>
        : <input type="text" name="key"><p>
        <input type="submit" value="Suche starten">
    </form>
    <h3 id="text">Oder fügen Sie eine Neue App hinzu:</h3>
    <form id="addapp" action="../new">
        <p id="inputfield">
            App Name: <input type="text" name="name">
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
        <input type="submit" value="Anlegen">

    </form>
    <?php
        if(isset($_COOKIE["set"])){
            echo"<p id='text'>Die App wurde erfolgreich hinzugefügt.</p>";
        }
        if(isset($_COOKIE["upd"])){
            echo"<p id='text'>Die App wurde erfolgreich Bearbeitet.</p>";
        }
    ?>
</body>

</html>