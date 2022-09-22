<html>
    <title>
        Sprechstunden
    </title>
    <head>
        <h3>IT-Sprechstunden</h3>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="../stylesheet.css">
    </head>
    <body>
        <a href="./edit" class="headButton">Anpassen</a>
        <?php
            include "../dbc/connection.php";
            $conn = OpenCon();
            $sql = "SELECT * FROM timetable ORDER BY Day ASC";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                echo("<table>");
                while($row = $result->fetch_assoc()){
                    $von = explode(":",$row["Von"])[0].":".explode(":",$row["Von"])[1];
                    $bis = explode(":",$row["Bis"])[0].":".explode(":",$row["Bis"])[1];
                    $str = "<tr><td>".$row["Name"]."</td><td></td><td>".getDay($row["Day"])."</td><td></td><td>".$von."</td><td>-</td><td>".$bis."</td></tr>";
                    echo($str);
                }
                echo("</table>");
            }else{
                echo("Diese Seite wird im Moment nicht verwaltet, bitte versuchen sie es später erneut oder kontaktieren sie einen Administrator.");
            }
            CloseCon($conn);
            
            function getDay($id){
              switch ($id) {
                case '1':
                  return 'Mo';
                case '2':
                  return 'Di';
                case '3':
                  return 'Mi';
                case '4':
                  return 'Do';
                case '5':
                  return 'Fr';
              }
              return $id;
            }
        ?>
    </body>
</html>