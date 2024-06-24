<?php

if (isset($_SESSION["user"]) and $_SESSION["user"] == "admin") {

echo <<<HTML
  <div id='adminDiv'>
    <form action='' method='post' enctype='multipart/form-data'>
      <h2>Novo produto</h2>
      <input type='number' name='preco' placeholder='preço' step='0.01'> <br>
      <input type='text' name='descricao' placeholder='descrição'> <br>
      <textarea type='textarea' name='detalhes' placeholder='detalhes'></textarea> <br>
      <label for='imagem'>Imagem: </label><input type='file' name='imagem' placeholder='imagem'>
      
      <br>
      <input type='submit' name='submitNovoProduto'>
    </form>
  </div>
HTML;



if (isset($_POST['submitNovoProduto'])) {
  $pasta_imagem = '../produtos/';
  $arquivo_imagem = $pasta_imagem . basename($_FILES['imagem']['name']);
  $tipoArquivo = strtolower(pathinfo($arquivo_imagem, PATHINFO_EXTENSION));
  $check = getimagesize($_FILES['imagem']['tmp_name']);
  if ($check !== false) {
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $detalhes = $_POST['detalhes'];


    $sqlAdmin = "INSERT INTO produtos(preco, descricao, img_url, detalhes) VALUES 
                  ({$preco}, '{$descricao}', '{$arquivo_imagem}', '{$detalhes}')";



    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $arquivo_imagem)) {
      echo 'enviado';
      mysqli_query($conn, $sqlAdmin);
      unset($_POST['submitNovoProduto']);
    } else {
      echo 'falha em enviar' . $arquivo_imagem;
    }
  } else {
    echo "não é imagem";
  }
}
}

?>