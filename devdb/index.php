<!DOCTYPE html>
<html>
    <head>
        <title>Inventar des IKG</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <div id="home">
            <form method="POST" action="index.php">
                <button type="submit">Home</button>
            </form>
        </div>
        <h1>Inventar des IKG</h1>
        <div id="mainpage">
            <?php
                include '../dbc/connection.php';
                if(isset($_GET["pass"])){
                    $pass = $_GET["pass"];
                    if($pass == "technik4ikg"){
                        setcookie("loggedin","true",time()+3600);
                        if(isset($_GET["search"])){
                            results();
                        }else{
                            search();
                        }
                        initaddbutton();
                    }else if(isset($_COOKIE["loggedin"])){
                        if(isset($_GET["search"])){
                            results();
                        }else{
                            search();
                        }
                    }else{
                        lofunc();
                        echo("Passwort inkorrekt");
                    }
                }else{
                    lofunc();
                }

                function search(){
                    echo('<form>
                    Suchbegriff: <input type="text" name="search">
                    <br>
                    <input id="button" type="submit" value="Suchen">
                </form>');

                }

                function initaddbutton(){
                    echo('
                    <div id="add">
                        <form method="POST" action="adddev.php">
                            <button type="submit">Gerät aufnehmen</button>
                        </form>
                    </div>');
                }


                function results(){
                    $con = OpenCon();
                    $sql = "SELECT DeviceName, Room, Id FROM devicetable WHERE DeviceName LIKE '%".$_GET["search"]."%' ORDER BY DeviceName ASC";
                    $result = $con->query($sql);
                    CloseCon($con);
                    if($result->num_rows > 0){
                        echo("Die Suchanfrage lieferte folgende Ergebnisse: <br>
                        <table>
                        <tr><th>Gerät Name</th><th>Raum</th></tr>");
                        while($row = $result->fetch_assoc()){
                            if($row["Room"] != "Lager"){
                                echo("<tr><td>".$row["DeviceName"]."</td>
                                <td><form action='move.php'>
                                    <input type='text' name='search' id='hide' value='".$_GET["search"]."'>
                                    <input type='text' name='id' id='hide' value=".$row["Id"].">
                                    <input type='text' name='Room' value='".$row["Room"]."'>
                                    <input type='submit' value='Bewegen'>
                                </form>
                                </td></tr>");
                            }else{
                                echo("<tr><td>".$row["DeviceName"]."</td>
                                <td><form action='request.php'>
                                    <input type='text' name='name' id='hide' value='".$row["DeviceName"]."'>
                                    <input type='text' name='search' id='hide' value='".$_GET["search"]."'>
                                    <input type='text' name='id' id='hide' value=".$row["Id"].">
                                    <input type='text' name='Room' value='".$row["Room"]."'>
                                    <input type='submit' value='Anfragen'>
                                </form>
                                </td></tr>");
                            }
                        }
                        echo("</table>");
                        
                    }else{
                        echo("Die Suchanfrage lieferte keine Ergebnisse.");
                    }
                }

                function lofunc(){
                    echo('
                    Bitte melden Sie sich zunächst mit dem Passwort an.
                    <form id="login">
                        <label for="pass">Passwort:</label>
                        <input type="password" name="pass">
                        <br>
                        <input id="button" type="submit" value="login">
                    </form>');
                }
            ?>
            
        </div>
    </body>
</html>