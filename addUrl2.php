<?php
  $titulo = $_POST["titulo"];
  $link  = $_POST["url"];
  $tags = $_POST["tags"];
  if($titulo == ""){
    $titulo = "blank";
  }
  if($tags == ""){
    $tags = "private";
  }
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

  $sql = "insert into urls (usuario,titulo,url,tags) values ('$usuario','$titulo','$link','$tags')";
  if ($conn->query($sql) === TRUE) {
    echo "success";
  }
  else {
    echo "fail";
  }

 ?>
