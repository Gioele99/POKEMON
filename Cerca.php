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
                <li><a href="catalogo.php">Catalogo</a></li>
                <li><a href="cerca.html">Cerca</a></li>
                </ul>
                
  <div class="container">
    <div class="main">
    <?php
      require_once('DBhelper.php');
      $nome = $_POST['identifier'];
      $db_handle = new DBhelper();
      $db_handle->Cerca($nome);
    ?>
    </div>
  </div>
</body>
</html>
