<?php
    session_start();
    include_once("conexão.php");

    $sql = "SELECT * FROM livros ORDER BY Cod_livro";
    $result = $conn->query($sql)
    
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../Css/styleLivros.css" />
    <title>Início</title>
  </head>
  <body>
    <header id="caixa">
      <div id="logo">
        <img src="" alt="" />
        <a href="">SearchBook</a>
      </div>
      <div id="botoes">
        <ul>
          <li class="nav-itens">
            <a href="inicio.html">Início</a>
          </li>
          <li class="nav-itens">
            <a href="livros.php">Livros</a>
          </li>
          <li class="nav-itens">
            <a href="">Conta</a>
          </li>
        </ul>
      </div>
    </header>

    <div class="conteudo">
      <div id="card-total">
        <div id="livros">
           
          <div class="card">
            <img src="" alt="">
            <a>conteudo</a>
          </div>
          <div class="card">
            <img src="" alt="">
            <a>conteudo</a>
          </div>
          <div class="card">
            <img src="" alt="">
            <a>conteudo</a>
          </div>
          <div class="card">
            <img src="" alt="">
            <a>conteudo</a>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
