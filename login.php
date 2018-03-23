<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="mycss.css">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>
<?php

  $username = $_POST['username'];
  $password = $_POST['password'];


    require_once('DBhelper.php');
    $db_registrati = new DBhelper();
    $db_registrati->login($username, $password);

?>
</body>
</html>
