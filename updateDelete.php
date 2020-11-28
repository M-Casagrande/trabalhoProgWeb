
<?php

$mode = $_POST["mode"];
$titulo = $_POST["titulo"];
$url = $_POST["url"];
$tags = $_POST["tags"];

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
if($mode==1){
  $sql = "set SQL_SAFE_UPDATES=0;delete from urls where usuario=". "'" . $usuario . "'" ." and titulo=" ."'" .$titulo."'";
  $conn->multi_query($sql);
}
?>
