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
    <link rel="stylesheet" type="text/css" href="../Css/styleinicio.css" />
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
        <div id="tabela">
            <table>
                <thead>
                    <tr>
                        <h1>Livros Disponiveis</h1>
                        <th>id</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editora</th>
                        <th>Gênero</th>
                        <th>Ano</th>
                        <th>Estoque</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        echo "<form method='POST'>";
                        while($user_data = mysqli_fetch_assoc($result))
                        {   
                            $id = $user_data['Cod_livro'];
                            echo <<<HTML
                                    <tr>
                                        <td>{$id}</td>
                                        <td>{$user_data['Titulo']}</td>
                                        <td>{$user_data['Autor']}</td>
                                        <td>{$user_data['Editora']}</td>
                                        <td>{$user_data['Genero']}</td>
                                        <td>{$user_data['Ano']}</td>
                                        <td>{$user_data['estoque']}</td>
                                        <td><input type="checkbox" name="livro{$id}" id=""></td>
                                    </tr>
                                
                            HTML;

                        }
                        echo <<<HTML
                            <tr><td><input type='submit' value='Agendar'></td></tr>
                        HTML;
                        echo '</form>';
                        if ($_POST){
                            $sql = "UPDATE estoque FROM livros WHERE0 id = {$id} ";
                        }
                    ?>
            
                </tbody>
            </table>
            <div>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
