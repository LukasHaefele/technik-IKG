<?php
  include "../../dbc/connection.php";
  $conn = OpenCon();

  if($_GET["del"]=="true"){
    $sql = "DELETE FROM timetable WHERE ID=".$_GET["ID"];
    $res = $conn->query($sql);

    setcookie("del_success","1",time()+1,"/");
    header("location:.");
  }else if($_GET["name"] != "" && $_GET["day"] != "0"/* && $_GET["von"] != "" && $_GET["bis"] != ""*/){
    $von = date("h:i",strtotime($_GET["von"]));
    print($von."<br>");

    $bis = date("h:i",strtotime($_GET["bis"]));
    print($bis."<br>");

    $sql = "INSERT INTO timetable (ID, Name, Day, Von, Bis) VALUES ('".$_COOKIE["ID"]."', '".$_GET["name"]."', '".$_GET["day"]."', '".$_GET["von"]."', '".$_GET["bis"]."')";
    print($sql."<br>");

    $conn->query($sql);
    setcookie("add_success","1",time()+1,"/");

    header("location:.");
  }else{
    setcookie("missing_info","1",time()+1,"/");
    header("location:.");
  }
?>