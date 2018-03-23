<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="mycss.css">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>
  <ul class="nav">
    <li><a href="index.html">Home</a></li>
    <li><a href="registrati.html">Registrati</a></li>
    <li><a href="login.html">Login</a></li>
    <li><a href="catalogo.php">Catalogo</a></li>
    <li><a href="Cerca.html">Cerca</a></li>
  </ul>
<?php

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];


    require_once('DBhelper.php');
    $db_registrati = new DBhelper();
    $db_registrati->Register($username, $password, $email);

?>
</body>
</html>
