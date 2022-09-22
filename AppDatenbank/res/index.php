<!DOCTYPE html>
<html>
    <head>
        <title>ADB-IKG</title>
        <link rel="stylesheet" href="../style/style.css">
        <h1>Ergebnisse ihrer Suchanfrage</h1>
    </head>
    <body>
        <?php
            include '../../dbc/connection.php';
            $conn = OpenCon();
            $sql = "SELECT ContentName, Beschreibung, Fächer, Einsatzmöglichkeiten, Verfügbarkeit FROM apptable WHERE ".$_GET["search"]." LIKE '%".$_GET["key"]."%'";
            $result = $conn->query($sql);
            echo"<p id='text'>Suche nach '".$_GET["key"]."' lieferte folgende Ergebnisse: </p>";
            if($result->num_rows > 0){
                echo"<p id='text'>Gesuchte App nicht gefunden? Lege sie <a href='../home'>hier</a> an.</p>";
                echo"<table><tr><th>Name</th><th>Beschreibung</th><th>Fächer</th><th>Einsatzmöglichkeiten</th><th>Verfügbarkeit</th><th></th></tr>";
                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row["ContentName"]."</td><td>".$row["Beschreibung"]."</td><td>".$row["Fächer"]."</td><td>".$row["Einsatzmöglichkeiten"]."</td><td>".$row["Verfügbarkeit"]."</td><td><a href='../Editor/?name=".$row["ContentName"]."'>Bearbeiten</a></td></tr>";
                }
                echo"<table>";
            } else {
                echo"<p id='nores'>Die Suchanfrage hat keine Ergebnisse geliefert. Clicke <a href='../home'>hier</a> um auf die Homepage zurückzukehren.</p>";
            }
        ?>
    </body>
</html>