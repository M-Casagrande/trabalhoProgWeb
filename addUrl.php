<?php
    //testa se usuario deixou o titulo em branco
    if($_POST["tituloUrl"]==""){
        $pag = new DOMDocument(); //cria um DOM para receber a pag HTML
        $pag->loadHTML(file_get_contents($_POST["url"]));//carrega o HTML da url no DOM
        $novoTitulo = $pag->getElementsByTagName('title');//pega o que estiver na tag <title> e cria um array com todas as ocorrencias
        //testa para ver se pegou alguma coisa
        if($novoTitulo->length > 0){
            //se pegou coloca a primeira ocorrencia no lugar do titulo
            $_POST["tituloUrl"] = $novoTitulo->item(0)->nodeValue;
        }
        else{
            //se nao encontrou nenhuma tag <title> tentamos a <h1>
            $novoTitulo = $pag->getElementsByTagName('h1');
            //testa para ver se esta vazia, ou seja, nao encontrou nenhuma ocorrencia
            if($novoTitulo->length == 0){
                //coloca esse texto default caso nao tenha encontrado nada
                $_POST["tituloUrl"] = "[..]";
            }
            else{
                //se econtrou alguma tag <h1> coloca a primeira ocorrencia no titulo
                $_POST["tituloUrl"] = $novoTitulo->item(0)->nodeValue;
            }
        }
    }
    //cria um json com os dados do formulário
    $formulario = json_encode($_POST);
    //substituir o test.ext para um acesso ao servidor e salvar no usuario
    //depois fazer algo para a mainpage exibir a nova url junto das outras
    file_put_contents('test.ext', $formulario, FILE_APPEND);
?>