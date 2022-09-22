<html>
  <title>IT-Sprechstunden Auth</title>
  <head>
    <h3>IT-Sprechstunden Auth</h3>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="../../stylesheet.css">
  </head>
  <body>
    <form action="../edit" method="get">
      <label for="pw">Password: </label>
      <input type="password" id="pw" name="pw">
      <br>
      <input type="submit" text="login" id="inputButton" value="submit">
    </form>
    <?php
      if(isset($_COOKIE["auth_inc"]))echo("Passwort falsch");
      if(isset($_COOKIE["auth_non"]))echo("Bitte anmelden");
    ?>
  </body>
</html>