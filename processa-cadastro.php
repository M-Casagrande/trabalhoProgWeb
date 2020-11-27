<?php
$senha = $_POST["senha"];
$confirmaSenha = $_POST["confirma-senha"];
$email = $_POST["email"];
$usuario = $_POST["user"];

if($senha != $confirmaSenha){
  echo "As senhas digitadas não são iguais";
}
else{
  if($usuario != "" and $email != "" and $senha!=""){
    $server = "localhost";
    $username = "root";
    $password = "senhadodb";
    $conn = new mysqli($server,$username,$password);
    if($conn->connect_error){
      die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("loginProgweb");
    $sql = "insert into users (usuario,senha,email) values ('$usuario','$senha','$email')";
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    }
    else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  else{
    echo "Informacões necessárias para o cadastro não foram digitadas";
  }
}
?>
