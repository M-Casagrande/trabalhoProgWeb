<?php
  $server = "localhost";
  $username = "root";
  $password = "senhadodb";
  $conn = new mysqli($server,$username,$password);
  if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
  }
  $conn->select_db("loginProgweb");
  session_start();
  $usuario = $_SESSION["user"];
  $sql = "select * from urls where tags = " . "'" . "publica" ."'";

  $result = $conn->query($sql);
  if($result->num_rows>0){
    echo "<table><tr><th>Usuario</th><th>Titulo</th><th>url</th><th>tags</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["usuario"]. "</td>"."<td>" . $row["titulo"]. "</td> "."<td>". "<a href=". $row["url"].">". $row["url"]."</a>" ."</td> "."<td>" . $row["tags"]. "</td> ". "</tr>";
    }
    echo "</table>";
  }else{
    echo "Ainda não existem URLS salvas!";
  }
?>
