<html>
<body>
  <div >
    <h1><b>Pagina para teste da configuração do servidor php</b></h1>
  </div>
  <?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $conn = new mysqli($server,$username,$password);
  if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
  }
  $conn -> select_db("loginProgweb");

  $nome = $_POST["user"];
  $senha = $_POST["senha"];
  $sql = "select * from users where usuario = " . "'" . $nome . "'" ." and senha = ". "'" . $senha . "'";
  $resultado = $conn->query($sql);
  if($resultado->num_rows > 0){
    echo "Usuario logado com sucesso";
  }
  else{
    echo "Usuario ou senha invalidos";
  }
  ?>
</body>
