<?php
  session_start();
  $usuario = $_SESSION["user"];
  if($usuario == ""){
    echo "<button type = "."button" . " name=" . "button" . " class=" . "botao" ." onclick="."location.href='login.html' " . ">Login</button> <br><br><br>" .
        "Não? Então <br><br>" . "<button type=" . "button" . " name=" ."button" . " class= " . "botao" . " onclick=" . "location.href='registro.html'" .
        ">Cadastre-se</button>";
  }
  else{
    echo "Logado como: " . $usuario ."<br><br>" . "<button type = "."button" . " name=" . "button" . " class=" . "botao" .
     " onclick="."location.href='mainpage.php' "  . ">entrar</button>";
  }
 ?>
