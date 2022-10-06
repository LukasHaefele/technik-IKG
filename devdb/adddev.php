<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style/style.css">
        <title>Add Device</title>
    </head>
    <body>
        <h1>Gerät Aufnehmen</h1>
        <form>
            Gerätname: <input name="name" type="text"><br><br>
            Raumname:  <input name="room" type="text"><br><br>
            <input type="submit" value="Hinzufügen">
        </form>
        <?php
            include "../dbc/connection.php";
            if(isset($_GET["name"]) && isset($_GET["room"])){
                $name = $_GET["name"];
                $room = $_GET["room"];
                $con = OpenCon();
                $sql = "SELECT * FROM devicetable";

                if($con->query($sql)->num_rows == 0){
                    $id = 0;
                }else{
                    $sql = "SELECT MAX(Id) as id FROM devicetable";
                    $result = $con->query($sql);
                    if($result->num_rows == 0){
                        $id = 0;
                    }else{
                        $id = $result->fetch_assoc()["id"]+1;
                    }
                }
                $sql = "INSERT INTO devicetable (Id, Room, DeviceName) VALUES ('".$id."', '".$room."', '".$name."')";
                if(!mysqli_query($con, $sql)){
                    echo("<p id='failure'>Das Gerät konnte nicht hinzugefügt werden.</p>");
                }else{
                    echo("Gerät Wurde Erfolgreich hinzugefügt");
                }
                CloseCon($con);
            }
        ?>
        <div id="home">
            <form method="POST" action="index.php">
                <button type="submit">Home</button>
            </form>
        </div>
    </body>
</html>