
<head>
  <title>BFSQS</title>
  <link rel="stylesheet" href="estilos.css">
    <style>
    .addUrlBox{
      top: 15%;
      left: 3%;
      position: absolute;
      width: 900;
      height: 250;
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
     .minhasurls{
       text-align: left;
       margin-top: 100px;
       margin-left: -30px;
     }
     table, th, td {
    border: 1px solid black;
  }
</style>

</head>

<body class="main-body">
  <h1 onclick="location.href='index.html'" style="cursor:pointer;width:500px">BFSQS - logado como : <?php
      session_start();
      if($_SESSION["user"]!=""){
        echo $_SESSION["user"];
      }
      else{
        header("Location: index.html");
      }

    ?>
    </h1>
    <form method="post" style="margin-top:-40px;margin-left:420px">
      <input type="submit" name = "botaoSaida" class = "botao" value = "Sair">
    </form>
    <?php if(isset($_POST['botaoSaida'])){
            session_unset();
            session_destroy();
            header("Location: index.html");
          }
    ?>

  <div class="addUrlBox"><br>Adicione uma Url:

    <div>
      <p style="margin-bottom:-30px"><span id="hint" style="color:red"></span></p>
      <br>
    </div>

      <form class="addUrl" onsubmit="confereUrl(tituloUrl,url,tags);return false" method="post">
      <label for="titulo">Título da url(opcional):</label>
      <br>
      <input type="text" id="tituloUrl" name="tituloUrl" style="border:2px solid black;border-radius:5px" size="90">
      <br>
      <label for="url">Link da url:</label>
      <br>
      <input type="text" id="url" name="url" onkeyup="teste();"style="border:2px solid black;border-radius:5px" size="90">
      <br>
      <label for="Tags">Tags da Url (separador por ;):</label>
      <br>
      <input type="text" id="tags" name="tags" style="border:2px solid black;border-radius:5px" size="90">
      <br>
      <input type="submit" name="Addr" style="margin:10px 0px" class="botao" ><br>
  </form>
  <div class="minhasurls">
    <h2>Minhas urls: </h2>
    <div style="margin:10px">
      <button onclick="updateDelete(1)" class="botao">Remover</button>
      <button onclick="updateDelete(2)" class="botao">alterar</button>
    </div>
    <div id = "urls">
    </div>
  </div>
  </div>

  <script>
    function confereUrl(titulo,url,tags){
      if(url.value == ""){
        document.getElementById("hint").innerHTML = "O campo de url não pode estar vazio!";
      }
      else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var str = xmlhttp.responseText
            if(str == "success"){
              alert("Url adicionada com sucesso!");
              window.location.href="mainpage.php";
            }else if(str == "fail"){
              alert("Algo deu errado ao adicionar a url!");
            }
          }
        };
        var params = "titulo="+titulo.value+"&url="+url.value+"&tags="+tags.value;
        xmlhttp.open("POST", "addUrl2.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.setRequestHeader("Content-length", params.length);
        xmlhttp.setRequestHeader("Connection", "close");
        xmlhttp.send(params);
      }
    }

    function minhasUrls(){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var str = xmlhttp.responseText
          document.getElementById("urls").innerHTML = str;
        }
      };
      var params = "" ;
      xmlhttp.open("POST", "pegaUrls.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.setRequestHeader("Content-length", params.length);
      xmlhttp.setRequestHeader("Connection", "close");
      xmlhttp.send(params);
    }

    function updateDelete(mode){
      if(mode == 1){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var str = xmlhttp.responseText
            
          }
        };
        var titulo = prompt("Digite o nome do titulo a ser deletado!");
        var params = "mode="+mode+"&titulo="+titulo+"&url="+""+"&tags="+"" ;
        xmlhttp.open("POST", "updateDelete.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.setRequestHeader("Content-length", params.length);
        xmlhttp.setRequestHeader("Connection", "close");
        xmlhttp.send(params);
      }
      else{

      }
    }
    setInterval(minhasUrls,1000);
    window.onload = minhasUrls;
  </script>
</body>
