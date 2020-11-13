
<head>
  <title>BFSQS</title>
  <link rel="stylesheet" href="estilos.css">
    <style>
    .addUrlBox{
      top: 15%;
      left: 3%;
      position: absolute;
      width: 800;
      height: 225;
      text-align: center;
      border: 3px solid black;
      background-color:#f1f1f1;
      border-radius: 100px;
    }
    .addUrl{
       margin: 25px;
     }
     .main-body {
     font-size: 100%;
     color: black;
     }
}</style>

</head>

<body class="main-body">
  <h1>BFSQS - logado como :<?php
      session_start();
      echo $_SESSION["user"];
    ?>
  </h1>

  <form method="post" >
    <input type="submit" name = "botaoSaida" class = "botao" value = "Sair">
  </form>
  <?php if(isset($_POST['botaoSaida'])){
          session_unset();
          session_destroy();
          header("Location: index.html");
        }
  ?>
  <div class="addUrlBox"><br>Adicione uma Url:
      <form class="addUrl" action="addUrl.php" method="post">
      <label for="titulo">Título da url(opcional):</label>
      <br>
      <input type="text" id="tituloUrl" name="tituloUrl" style="border:2px solid black;border-radius:5px" size="90">
      <br>
      <label for="url">Link da url:</label>
      <br>
      <input type="text" id="url" name="url" style="border:2px solid black;border-radius:5px" size="90">
      <br>
      <label for="Tags">Tags da Url (separador por ;):</label>
      <br>
      <input type="text" id="tags" name="tags" style="border:2px solid black;border-radius:5px" size="90">
      <br>
      <input type="submit" name="Addr" style="margin:10px 0px" class="botao" ><br>
  </form>
  </div>
</body>
