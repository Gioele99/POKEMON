<?php
Class DBhelper
{
  private $servername = 'localhost';
  private $port = 3306;
  private $username = 'root';
  private $password = 'mysql';
  private $dbName= 'Pokemon';
  public function __construct()
  {
    try
    {
      $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbName", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
  }

  function Catalog()
  {
    $x_pag = 10;

    if (isset($_GET['pag']))
    {
        $pag = $_GET['pag'];
    }
    else
    {
       $pag  = 1;
    }

    if (!$pag || !is_numeric($pag)){
        $pag = 1;
    }

    $sql = "SELECT count(*) FROM pokemon";
    $result = $this->conn->prepare($sql);
    $result->execute();
    $all_rows = $result->fetchColumn();
    $all_pages = ceil($all_rows / $x_pag);
    $first = ($pag-1) * $x_pag;

    $printsql = "SELECT * FROM pokemon LIMIT $first, $x_pag";
    $sth = $this->conn->prepare($printsql);
    $sth->execute();


    echo "<table class='table table-striped table-dark' style='color:red'>
    <thead>
      <tr>
        <th scope='col'> Image </th>
        <th scope='col'>Name</th>
        <th scope='col'>Height</th>
        <th scope='col'>Weight</th>
      </tr>
      </thead>
      <tbody>";





      while($row = $sth->fetch(PDO::FETCH_ASSOC))
      {
          echo "<tr>";
          echo "<td>";
          echo "<img src='sprites/" . $row['id'] . ".png " . "'>";
          echo "</td>";
          echo"<td>".$row['identifier']."</td>";
          echo "<td>".$row['height']."</td>";
          echo "<td>".$row['weight']. "</td>";
          echo "</tr>";
      }

      echo "</tbody> </table>";
echo "<div class='pagine'>";
    if ($all_pages > 1){
        if ($pag > 1){

            echo "<a class='color_page' href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag - 1) . "\">";
            echo "<< </a>&nbsp;";
        }

        if ($all_pages > $pag){
            echo "<a class='color_page' href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag + 1) . "\">";
            echo ">> </a>";
        }
        echo "<br>";

        }

    echo "</div>";
  }


  function Register($username, $password, $email)
  {
        $queryclienti = "INSERT INTO clienti (username, password, email) VALUES (:username, :password, :email)";
        $sqlclienti = $this->conn->prepare($queryclienti);
        $sqlclienti->execute(array(':username'=>$username, ':password'=>$password, ':email'=>$email));
        echo "<p   >Connessione avvenuta</p>";
  }

  function login($username, $password)
  {
       $query="SELECT id FROM clienti WHERE username = :username AND password = :password";
       $result = $this->conn->prepare($query);
       $result->execute(array(':username'=>$username, ':password'=>$password));

       if($result->fetchColumn() == 1)
       {
          echo "Login eseguito";
          header("Location: index.html");
       }
       else{
         echo "Error";
       }
  }
  function Cerca($identi){
    $x_pag = 10;

    if (isset($_GET['pag']))
    {
        $pag = $_GET['pag'];
    }
    else
    {
       $pag  = 1;
    }

    if (!$pag || !is_numeric($pag)){
        $pag = 1;
    }

    $sql = "SELECT count(*) FROM pokemon";
    $result = $this->conn->prepare($sql);
    $result->execute();
    $all_rows = $result->fetchColumn();
    $all_pages = ceil($all_rows / $x_pag);
    $first = ($pag-1) * $x_pag;

    $sql="select * from pokemon where identifier like '%$identi%'";
    $sth=$this->conn->prepare($sql);
    $sth->execute(array(':identi'=> $identi));

    echo "<table class='table table-striped table-dark' style='color:red'>
    <thead>
      <tr>
        <th scope='col'> Image </th>
        <th scope='col'>Name</th>
        <th scope='col'>Height</th>
        <th scope='col'>Weight</th>
      </tr>
      </thead>
      <tbody>";

      while($row = $sth->fetch(PDO::FETCH_ASSOC))
      {
          echo "<tr>";
          echo "<td>";
          echo "<img src='sprites/" . $row['id'] . ".png " . "'>";
          echo "</td>";
          echo"<td>".$row['identifier']."</td>";
          echo "<td>".$row['height']."</td>";
          echo "<td>".$row['weight']. "</td>";
          echo "</tr>";
      }

      echo "</tbody> </table>";


  }
}

?>
