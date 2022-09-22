<?php
  include '../../var.php';
  if($_GET["pw"] == $thPass){
    setcookie("auth_cor","1",time()+1000,"/");
  }else{
    $_home = false;
    if(isset($_GET["pw"])){
      setcookie("auth_inc","1",time()+1,"/");
      $_home = true;
    }else if(!isset($_COOKIE["auth_cor"])){
      setcookie("auth_non","1",time()+1,"/");
      $_home = true;
    }
    if($_home){
      header("location:../auth");
    }
  }
?>

<html>
  <title>Sprechstunden Edit</title>
  <head>
    <h3>IT-Sprechstunden Edit</h3>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="../../stylesheet.css">
  </head>
  <body>
    <?php
      include "../../dbc/connection.php";
      $conn = OpenCon($srv);
      $sql = "SELECT * FROM timetable ORDER BY Day ASC";
      
      $maxID = 0;
      setcookie("ID","$maxID",time()+1000,"/");

      $result = $conn->query($sql) or die("Errored on Query: %s\n". $conn->error);
      if($result->num_rows > 0){
          echo("<table>");
          while($row = $result->fetch_assoc()){
            $von = explode(":",$row["Von"])[0].":".explode(":",$row["Von"])[1];
            $bis = explode(":",$row["Bis"])[0].":".explode(":",$row["Bis"])[1];

            $str = "<tr><td>".$row["Name"]."</td><td></td><td>".getDay($row["Day"])."</td><td></td><td>".$von."</td><td>-</td><td>".$bis."</td><td><a href='send.php?del=true&ID=".$row["ID"]."'>Löschen</a></td></tr>";
            echo($str);
            if($row["ID"]>=$maxID) $maxID = $row["ID"]+1;
          }
          echo("</table>");
      }else{
          echo("Diese Seite wird im Moment nicht verwaltet, bitte versuchen sie es später erneut oder kontaktieren sie einen Administrator.");
      }
      setcookie("ID","$maxID",time()+1000,"/");

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
    
    <form action="send.php" id="sendForm">
      <label for="name">Name:</label>
      <input id="name" name="name" type="text">
      <br>
      <label for="day">Tag:</label>
      <select id="day" name="day">
        <option value="0">Bitte Wählen</option>
        <option value="1">Montag</option>
        <option value="2">Dienstag</option>
        <option value="3">Mittwoch</option>
        <option value="4">Donnerstag</option>
        <option value="5">Freitag</option>
      </select>
      <br>
      <label for="von">Von:</label>
      <input id="von" name="von" type="time" value="13:00">
      <br>
      <label for="bis">Bis:</label>
      <input id="bis" name="bis" type="time" value="13:00">
      <br>
      <input type="submit" text="Hochladen" id="inputButton" value="submit">
      <input id="del" name="del" value="false" class="hide">
    </form>
    <a href="../" class="headButton">Home</a>
    <?php
      if(isset($_COOKIE["missing_info"]))echo('<br>Bitte alle Felder ausfüllen<br>');
      if(isset($_COOKIE["del_success"]))echo('<br>Erfolgreich gelöscht.');
      if(isset($_COOKIE["add_success"]))echo("<br>Erfolgreich hochgeladen");
    ?>
  </body>
</html>