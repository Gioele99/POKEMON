<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="mycss.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
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
<div class="container">
  <?php

      include('DBhelper.php');
      $db_handle = new DBhelper();
      $db_handle->Catalog();


     ?>

</div>
</body>
</html>
